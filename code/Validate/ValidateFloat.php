<?php

namespace Simpleview\Validate;

/**
 * Validate float
 *
 * @category Simpleview
 * @package  Validate
 *
 * @author   Jed Diaz
 * @since    08 August 2018
 */
class ValidateFloat
{
    /**
     * Method for validating floats
     *
     * @param mixed $value - value to be validated
     * @param array $criteria - validation rules
     *
     * @return bool
     */
    public function validate($value, $criteria)
    {
        $valid = true;
        if ($valid) {
            if (isset($criteria['max']) && $value > $criteria['max']) {
                $valid = false;
            }
        }
        if ($valid) {
            if (isset($criteria['min']) && $value < $criteria['min']) {
                $valid = false;
            }
        }
        if ($valid) {
            if (isset($criteria['decimal'])) {
                $decimals = strlen(substr(strchr($value, "."), 1));
                if ($decimals > $criteria['decimal']) {
                    $valid = false;
                }
            }
        }
        return $valid;
    }
}