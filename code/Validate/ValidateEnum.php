<?php

namespace Simpleview\Validate;

/**
 * Validate Enum
 *
 * @category Simpleview
 * @package  Validate
 *
 * @author   Jed Diaz
 * @since    08 August 2018
 */
class ValidateEnum
{
    /**
     * Method for validating enums
     *
     * @param mixed $value - value to be validated
     * @param array $criteria - validation rules
     *
     * @return bool
     */
    public function validate($value, $criteria)
    {
        $valid = true;
        if (!isset($criteria['options'])) {
            $valid = false;
        }
        if ($valid) {
            if (!in_array($value, $criteria['options'])) {
                $valid = false;
            }
        }
        return $valid;
    }
}