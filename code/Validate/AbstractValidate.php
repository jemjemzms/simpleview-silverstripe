<?php

namespace Simpleview\Validate;

/**
 * Abstract Validate
 *
 * @category Simpleview
 * @package  Validate
 *
 * @author   Jed Diaz
 * @since    08 August 2018
 */
abstract class AbstractValidate
{
    /**
     * Contains validator instances
     *
     * @var array
     */
    protected $validators = [];

    /**
     * Method for validating the properties
     * on a vo
     *
     * @param mixed $vo - vo to be validated
     *
     * @return bool
     */
    public function validate($vo)
    {
        $validationMap = $vo->getValidationMap();
        foreach ($validationMap as $voKey => $validationParams) {
            $value = $vo->$voKey;
            // init validator if required
            $validatorName = $validationParams['validator'];
            if (!isset($this->validators[$validatorName])) {
                $validator = new $validatorName;
                $this->validators[$validatorName] = $validator;
            }
            // check for criteria
            $criteria = [];
            if (isset($validationParams['criteria'])) {
                $criteria = $validationParams['criteria'];
            }
            // do validation
            if ($this->validators[$validatorName]->validate($value, $criteria)) {
                $vo->$voKey = $value;
            } else {
                throw new \Exception('Could not determine validity of ' . $voKey . '(value: '. $value . ')');
            }
        }
        return true;
    }
}