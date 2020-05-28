<?php

namespace Simpleview\Format\Mapper;

use Simpleview\Util;

/**
 * Abstract mapper
 *
 * Abstract class for mapping Xml objects to Vos
 *
 * @category   Simpleview
 * @package    Format
 * @subpackage Mapper
 *
 * @author     Jed Diaz
 * @since      08 August 2018
 */
abstract class AbstractXmlMapper
{
    /**
     * Hydrates a VO with an array of XML data
     *
     * @param array $data - data to remap into the vo
     * @param mixed $vo - specific vo to populate
     *
     * @return mixed - returns the specified vo
     */
    public function remapXml($data, $vo)
    {
        return Util\Mapping::remapXml($data, $vo);
    }
}