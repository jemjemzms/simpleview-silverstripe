<?php

namespace Simpleview\Validate;

use \DateTime;

/**
 * Validate Date
 *
 * @category Simpleview
 * @package  Validate
 *
 * @author   Jed Diaz
 * @since    08 August 2018
 */
class ValidateDate
{
    /**
     * Method for validating dates
     *
     * @param mixed $value - value to be validated
     * @param array $criteria - validation rules
     *
     * @return bool
     */
    public function validate($value, $criteria)
    {
        $valid = true;
        if (!isset($criteria['format'])) {
            $valid = false;
        }
        if ($valid) {
            $formattedDate = DateTime::createFromFormat($criteria['format'], $value);
            if (!$formattedDate || !$formattedDate->format($criteria['format']) === $value) {
                $valid = false;
            };
        }
        return $valid;
    }
}