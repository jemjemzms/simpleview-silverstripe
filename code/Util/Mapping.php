<?php

namespace Simpleview\Util;

use Simpleview\Format;

/**
 * Mapping Util
 *
 * Class containing utilities for mapping
 *
 * @category Simpleview
 * @package  Util
 *
 * @author   Jed Diaz
 * @since    06 August 2018
 */
class Mapping
{
    /**
     * Hydrates a VO with an array of XML data
     *
     * @param array $data - data to remap into the vo
     * @param mixed $vo - specific vo to populate
     *
     * @return mixed - returns the specified vo
     */
    public static function remapXml($data, $vo)
    {
        $map = $vo->getVoMap();
        foreach ($map as $voKey => $xmlKey) {
            if (strpos($xmlKey, '::') !== false) {
                $parts = explode('::', $xmlKey);
                $key = $parts[0]; // reassign the xml key
                $subVo = new $parts[1]();
                if (array_key_exists($key, $data)) {
                    $subVoData = $data[$key];
                    /*
                     * check for 'ITEM' array key - if it exists then we're dealing with an array of objects,
                     * otherwise it's an array of values
                     */
                    if (isset($subVoData[Format\FormatConstants::XML_KEY_ITEM])) {
                        $resetSubVoData = reset($subVoData);
                        $subVoArray = [];
                        /*
                         * Because the 'ITEM' array key was found we assume that the array contains
                         * a list of other vos (specified in the vo map)
                         */
                        foreach ($resetSubVoData as $item) {
                            $subVoArray[] = Mapping::remapXml($item, $subVo);
                        }
                        $vo->$voKey = $subVoArray;
                    } else {
                        $subVoData = reset($subVoData);
                        $vo->$voKey = Mapping::remapXml($subVoData, $subVo);
                    }
                }
            } else {
                /*
                 * $data[$xmlKey] is a simple value, not an object
                 */
                if (is_array($data) && isset($data[$xmlKey])) {
                    $value = $data[$xmlKey];
                    // handling empty xml items (happens if XML is <ITEM/>
                    if (is_array($value) && empty(($value))) {
                        $value = '';
                    }
                    // also check in case of empty array (happens if XML is <ITEM></ITEM>
                    if (is_array($value) && count($value) == 1 && empty(trim($value[0]))) {
                        $value = '';
                    }
                    $vo->$voKey = $value;
                }
            }
        }
        return $vo;
    }
}