<?php 

namespace SimpleviewTest\Validate;

use \SapphireTest;
use \PHPUnit_Framework_Constraint_IsType as IsType;
use Simpleview\Validate;

/**
 * Validate int test
 *
 * Test case class for int validator
 *
 * @category SimpleviewTest
 * @package  Validate
 *
 * @author   Jed Diaz
 * @since    08 August 2018
 */
class ValidateIntTest extends SapphireTest
{
    /**
     * Test data for testValidate
     * 
     * @return array
     */
    public function providerTestValidate()
    {
        return [
            [500, ['min' => 0, 'max' => 1000]],
            [500, ['min' => 600, 'max' => 1000], false],
            [500, ['min' => 0, 'max' => 400], false],
            [0, ['min' => 0, 'max' => 1000]],
            [1000, ['min' => 0, 'max' => 1000]],
            [500, ['min' => 0]],
            [500, ['min' => 700], false],
            [500, ['max' => 1000]],
            [500, ['max' => 250], false],
        ];
    }

    /**
    * Tests that the validate method for its works as intended
    *
    * @param mixed $var - value for validation
    * @param array $criteria - validation criteria
    * @param bool $expectedResult - (optional) the expected result
    *
    * @covers Validate\ValidateInt::validate
    * @dataProvider providerTestValidate
    *
    * @return void
    */
    public function testValidate($value, $criteria, $expectedResult = true)
    {
        $validator = new Validate\ValidateInt();
        $result = $validator->validate($value, $criteria);
        $this->assertInternalType(IsType::TYPE_BOOL, $result);
        $this->assertEquals($expectedResult, $result);
    }
}