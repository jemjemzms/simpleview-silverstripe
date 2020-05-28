<?php 

namespace Simpleview\Validate;

/**
 * Validate Int
 *
 * @category Simpleview
 * @package  Validate
 *
 * @author   Talwinder Singh
 * @since    07 August 2018
 */
class ValidateInt
{
    /**
     * Method for validating ints
     *
     * @param mixed $value - value to be validated
     * @param array $criteria - validation rules
     *
     * @return bool
     */
    public function validate($value, $criteria)
    {
        $valid = true;
        if (!empty($value)) {
            if (isset($criteria['min'])) {
                if ($value < $criteria['min']) {
                    $valid = false;
                }
            }
            if ($valid && isset($criteria['max'])) {
                if ($value > $criteria['max']) {
                    $valid = false;
                }
            }
        }
        return $valid;
    }
}