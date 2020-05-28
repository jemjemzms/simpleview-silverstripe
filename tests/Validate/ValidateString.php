<?php

namespace SimpleviewTest\Validate;

use \SapphireTest;
use \PHPUnit_Framework_Constraint_IsType as IsType;
use Simpleview\Validate;

/**
 * Validate string test
 *
 * Test case class for int validator
 *
 * @category SimpleviewTest
 * @package  Validate
 *
 * @author   Jed Diaz
 * @since    08 August 2018
 */
class ValidateString extends SapphireTest
{
    /**
     * Test data for testValidate
     *
     * @return array
     */
    public function providerTestValidate()
    {
        return [
            ['string', ['length' => ['min' => 0, 'max' => 10]]],
            ['string', ['length' => ['min' => 0, 'max' => 2]], false],
            ['string', ['length' => ['min' => 9, 'max' => 10]], false],
        ];
    }

    /**
    * Tests that the validate method for string works as intended
    *
    * @param mixed $var - value for validation
    * @param array $criteria - validation criteria
    * @param bool $expectedResult - (optional) the expected result
    *
    * @covers Validate\ValidateString::validate
    * @dataProvider providerTestValidate
    *
    * @return void
    */
    public function testValidate($value, $criteria, $expectedResult = true)
    {
        $validator = new Validate\ValidateString();
        $result = $validator->validate($value, $criteria);
        $this->assertInternalType(IsType::TYPE_BOOL, $result);
        $this->assertEquals($expectedResult, $result);
    }
}