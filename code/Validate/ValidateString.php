<?php

namespace Simpleview\Validate;

/**
 * Validate string
 *
 * @category Simpleview
 * @package  Validate
 *
 * @author   Jed Diaz
 * @since    08 August 2018
 */
class ValidateString
{
    /**
     * Method for validating strings
     *
     * @param mixed $value - value to be validated
     * @param array $criteria - validation rules
     *
     * @return bool
     */
    public function validate($value, $criteria)
    {
        $valid = true;
        if (is_array($value) || is_object($value)) {
            $valid = false;
        }
        if ($valid) {
            $valid = $this->checkLength($value, $criteria);
        }
        return $valid;
    }

    /**
     * Checks the length of the provided string
     * against a list of criteria
     *
     * @param string $value - string to check
     * @param array $criteria - array of validation criteria
     *
     * @return bool
     */
    public function checkLength($value, $criteria)
    {
        $valid = true;
        $length = mb_strlen($value);
        if ($valid) {
            if (isset($criteria['length']['min']) && $length < $criteria['length']['min']) {
                $valid = false;
            }
        }
        if ($valid) {
            if (isset($criteria['length']['max']) && $length > $criteria['length']['max']) {
                $valid = false;
            }
        }
        return $valid;
    }
}