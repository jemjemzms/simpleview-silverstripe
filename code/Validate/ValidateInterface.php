<?php 

namespace Simpleview\Validate;

/**
 * Validate Interface
 *
 * Interface implemented in multiple Validators
 *
 * @category Simpleview
 * @package  Validate
 *
 * @author   Talwinder Singh
 * @since    07 August 2018
 */
interface ValidateInterface
{
    /**
     * Method for validating the properties
     * on a vo
     *
     * @param mixed $vo - vo to be validated
     *
     * @return bool
     */
    public function validate($vo);
}