<?php

namespace SimpleviewTest\Validate;

use \SapphireTest;
use \PHPUnit_Framework_Constraint_IsType as IsType;
use Simpleview\Validate;

/**
 * Validate date test
 *
 * @category SimpleviewTest
 * @package  Validate
 *
 * @author   Jed Diaz
 * @since    08 August 2018
 */
class ValidateDateTest extends SapphireTest
{
    /**
     * Data provider for testValidate
     *
     * @return array
     */
    public function providerTestValidate()
    {
        return [
            ['2019-01-01', ['format' => 'Y-m-d H:i:s.u'], false],
            ['2019-01-01 13:13:13', ['format' => 'Y-m-d H:i:s.u'], false],
            ['2019-01-01 13:13:13.8', ['notaformat' => 'xxxxx'], false],
            ['2019-01-01 13:13:13.8', ['format' => 'Y-m-d H:i:s.u'], true],
        ];
    }

    /**
     * Tests that the validate method for date values
     * is working as intended
     *
     * param mixed $var - value for validation
     * @param array $criteria - validation criteria
     * @param bool $expectedResult - (optional) the expected result
     *
     * @covers Validate\ValidateDate::validate
     * @dataProvider providerTestValidate
     *
     * @return void
     */
    public function testValidate($value, $criteria, $expectedResult = true)
    {
        $validator = new Validate\ValidateDate();
        $result = $validator->validate($value, $criteria);
        $this->assertInternalType(IsType::TYPE_BOOL, $result);
        $this->assertEquals($expectedResult, $result);
    }
}