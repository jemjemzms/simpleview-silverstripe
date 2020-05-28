<?php

namespace SimpleviewTest\Format;

use \PHPUnit_Framework_Constraint_IsType as IsType;
use \SapphireTest;
use Simpleview\Format;

/**
 * Float Formatter Test.
 *
 * Test case class for the float formatter
 *
 * @category SimpleviewTest
 * @package  Format
 *
 * @author   Jed Diaz
 * @since    07 August 2018
 */
class FloatFormatterTest extends SapphireTest
{
    /**
     * Testing data for testFormat()
     *
     * @return array
     */
    public function providerTestFormat()
    {
        return [
            ['0.101231', 0.101231],
            [0.101231, 0.101231]
        ];
    }

    /**
     * Tests that flaots get properly formatted
     *
     * @param mixed $value - value to format
     * @param float $expectedResult - the result expected to be returned by the format method
     *
     * @covers Format\FloatFormatter::format
     * @dataProvider providerTestFormat
     *
     * @return void
     */
    public function testFormat($value, $expectedResult)
    {
        $formatter = new Format\FloatFormatter();
        $result = $formatter->format($value);
        $this->assertInternalType(IsType::TYPE_FLOAT, $result);
        $this->assertEquals($expectedResult, $result);
    }

    /**
     * Testing data for testFormatBlank()
     *
     * @return array
     */
    public function providerTestFormatBlank()
    {
        return [
            ['', 0],
            [null, 0.0],
        ];
    }

    /**
     * Tests that floats get properly formatted
     *
     * @param mixed $value - value to format
     * @param int $expectedResult - the result expected to be returned by the format method
     *
     * @covers Format\FloatFormatter::format
     * @dataProvider providerTestFormatBlank
     *
     * @return void
     */
    public function testFormatBlank($value, $expectedResult)
    {
        $formatter = new Format\FloatFormatter();
        $result = $formatter->format($value);
        $this->assertEmpty($result);
        $this->assertEquals($expectedResult, $result);
    }
}