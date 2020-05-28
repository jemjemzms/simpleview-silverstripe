<?php

namespace Simpleview\Format\Formatter;

use Simpleview\Vo;

/**
 * Listing formatter
 *
 * Class containing functionality for formatting listing VO data
 * for the database
 *
 * @category Simpleview
 * @package  Format
 *
 * @author   Jed Diaz
 * @since    07 August 2018
 */
abstract class AbstractFormatter
{
    /**
     * Array containing instances of formatting classes, to prevent
     * them being instantiated multiple times
     *
     * @var array
     */
    protected $formatters = [];

    /**
     * Formats a listing vo and returns the formatted object
     *
     * @param Vo\ListingVo $vo - the listing vo to format
     *
     * @return Vo\ListingVo $vo - the formatted listing vo
     */
    public function format($vo)
    {
        $rules = $vo->getFormatMap();
        foreach ($rules as $voKey => $ruleParameters) {
            $field = $vo->$voKey;
            // instantiate the formatting class if it hasn't been already
            $formatterName = $ruleParameters['formatter'];
            if (!isset($this->formatters[$formatterName])) {
                $formatter = new $formatterName();
                $this->formatters[$formatterName] = $formatter;
            }
            $formatRules = $ruleParameters;
            if (isset($formatRules['formatter'])) {
                unset($formatRules['formatter']);
            }
            if (isset($formatRules['filter'])) {
                unset($formatRules['filter']);
            }
            $value = $field;
            if (isset($ruleParameters['filter'])) {
                $value = filter_var($field, $ruleParameters['filter']);
            }
            $formattedField = $this->formatters[$formatterName]->format($value, $formatRules);
            $vo->$voKey = $formattedField;
        }
        return $vo;
    }
}