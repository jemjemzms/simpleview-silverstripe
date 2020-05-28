<?php

namespace SimpleviewTest\Validate;

use \SapphireTest;
use \PHPUnit_Framework_Constraint_IsType as IsType;
use Simpleview\Validate;

/**
 * Validate float test
 *
 * @category SimpleviewTest
 * @package  Validate
 *
 * @author   Jed Diaz
 * @since    08 August 2018
 */
class ValidateFloatTest extends SapphireTest
{
    /**
     * Data provider for testValidate
     *
     * @return array
     */
    public function providerTestValidate()
    {
        return [
            ['fail', ['max' => 2, 'min' => 1], false],
            [1.101, ['max' => 1.1, 'min' => 1], false],
            [1.101, ['max' => 2, 'min' => 1.2], false],
        ];
    }

    /**
     * Tests thatthe validate method for float values
     * is working as intended
     *
     * param mixed $var - value for validation
     * @param array $criteria - validation criteria
     * @param bool $expectedResult - (optional) the expected result
     *
     * @covers Validate\ValidateFloat::validate
     * @dataProvider providerTestValidate
     *
     * @return void
     */
    public function testValidate($value, $criteria, $expectedResult = true)
    {
        $validator = new Validate\ValidateFloat();
        $result = $validator->validate($value, $criteria);
        $this->assertInternalType(IsType::TYPE_BOOL, $result);
        $this->assertEquals($expectedResult, $result);
    }
}