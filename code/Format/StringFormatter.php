<?php

namespace Simpleview\Format;

/**
 * String formatter
 *
 * @category Simpleview
 * @package  Format
 *
 * @author   Jed Diaz
 * @since    07 August 2018
 */
class StringFormatter implements FormatterInterface
{
    /**
     * Exposed method for formatting strings
     *
     * @param string $value - string that needs to be formatter
     * @param array $rules - array of rules to use in formatting
     *
     * @return string - the formatted string
     */
    public function format($value, $rules = [])
    {
        if (!empty($value) && !is_array($value)) {
            $formattedValue = (string) $value;
            $formattedValue = trim($formattedValue);
            foreach ($rules as $rule => $limit) {
                $formattedValue = $this->$rule($formattedValue, $limit);
            }
        } else {
            $formattedValue = '';
        }
        return $formattedValue;
    }
}