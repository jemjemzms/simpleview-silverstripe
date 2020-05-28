<?php

namespace SimpleviewTest\Format;

use \PHPUnit_Framework_Constraint_IsType as IsType;
use \SapphireTest;
use Simpleview\Format;

/**
 * String Formatter Test.
 *
 * Test case class for the string formatter
 *
 * @category SimpleviewTest
 * @package  Format
 *
 * @author   Jed Diaz
 * @since    07 August 2018
 */
class StringFormatterTest extends SapphireTest
{
    /**
     * Testing data for testFormat()
     *
     * @return array
     */
    public function providerTestFormat()
    {
        return [
            ['', ''],
            ['test', 'test'],
            ['test 3   ', 'test 3'],
            ['  another test  ', 'another test'],
            [123, '123']
        ];
    }

    /**
     * Tests that strings get properly formatted
     *
     * @param mixed $value - value to format
     * @param string $expectedResult - the result expected to be returned by the format method
     *
     * @covers Format\StringFormatter::format
     * @dataProvider providerTestFormat
     *
     * @return void
     */
    public function testFormat($value, $expectedResult)
    {
        $formatter = new Format\StringFormatter();
        $result = $formatter->format($value);
        $this->assertInternalType(IsType::TYPE_STRING, $result);
        $this->assertEquals($expectedResult, $result);
    }
}