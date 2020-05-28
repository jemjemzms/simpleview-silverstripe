<?php

namespace SimpleviewTest\Validate;

use \SapphireTest;
use \PHPUnit_Framework_Constraint_IsType as IsType;
use Simpleview\Validate;

/**
 * Validate enum test
 *
 * @category SimpleviewTest
 * @package  Validate
 *
 * @author   Jed Diaz
 * @since    08 August 2018
 */
class ValidateEnumTest extends SapphireTest
{
    /**
     * Test data for testValidate
     *
     * @return array
     */
    public function providerTestValidate()
    {
        return [
            ['OptionOne', ['options' => ['OptionOne', 'OptionThree']]],
            ['OptionTwo', ['options' => ['OptionOne', 'OptionThree']], false],
            ['OptionTwo', ['notOptions' => []], false],
        ];
    }

    /**
     * Tests that the validate method for enums works as intended
     *
     * @param mixed $var - value for validation
     * @param array $criteria - validation criteria
     * @param bool $expectedResult - (optional) the expected result
     *
     * @covers Validate\ValidateEnum::validate
     * @dataProvider providerTestValidate
     *
     * @return void
     */
    public function testValidate($value, $criteria, $expectedResult = true)
    {
        $validator = new Validate\ValidateEnum();
        $result = $validator->validate($value, $criteria);
        $this->assertInternalType(IsType::TYPE_BOOL, $result);
        $this->assertEquals($expectedResult, $result);
    }
}