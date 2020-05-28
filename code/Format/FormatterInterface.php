<?php

namespace Simpleview\Format;

/**
 * Formatter interface
 *
 * Interface used to swap between different formatting methods
 *
 * @category Simpleview
 * @package  Format
 *
 * @author   Jed Diaz
 * @since    07 August 2018
 */
interface FormatterInterface
{
    /**
     * Method for formatting values according to
     * a specified set of rules
     *
     * @param mixed $value - the value to be formatted
     * @param array $rules - the array of rules to use in formatting
     *
     * @return mixed - the formatted value
     */
    public function format($value, $rules);
}