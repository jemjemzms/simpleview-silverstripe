<?php

namespace Simpleview\Format;

/**
 * Int formatter
 *
 * @category Simpleview
 * @package  Format
 *
 * @author   Jed Diaz
 * @since    07 August 2018
 */
class IntFormatter implements FormatterInterface
{
    /**
     * Exposed method for formatting ints
     *
     * @param int $value - int that needs to be formatted
     * @param array $rules - array of rules to use in formatting
     *
     * @return mixed - the formatted value or null
     */
    public function format($value, $rules = [])
    {
        if (!empty($value)) {
            $formattedValue = (int) $value;
            foreach ($rules as $rule => $limit) {
                $formattedValue = $this->$rule($formattedValue, $limit);
            }
        } else {
            $formattedValue = null;
        }
        return $formattedValue;
    }
}