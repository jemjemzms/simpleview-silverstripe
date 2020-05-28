<?php

namespace Simpleview\Format;

/**
 * Float formatter
 *
 * Class for formatting float values
 *
 * @category Simpleview
 * @package  Format
 *
 * @author   Jed Diaz
 * @since    07 August 2018
 */
class FloatFormatter implements FormatterInterface
{
    /**
     * Formats float values according to the specified rules
     *
     * @param mixed $value - float value to format
     * @param array $rules - rules to use when formatting the float
     *
     * @return float|int|mixed
     */
    public function format($value, $rules = [])
    {
        if (!empty($value)) {
            $formattedValue = floatval($value);
            foreach ($rules as $rule => $limit) {
                $formattedValue = $this->$rule($formattedValue, $limit);
            }
        } else {
            $formattedValue = 0.0;
        }
        return $formattedValue;
    }
}