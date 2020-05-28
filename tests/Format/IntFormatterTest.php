<?php

namespace SimpleviewTest\Format;

use \PHPUnit_Framework_Constraint_IsType as IsType;
use \SapphireTest;
use Simpleview\Format;

/**
 * Int Formatter Test.
 *
 * Test case class for the int formatter
 *
 * @category SimpleviewTest
 * @package  Format
 *
 * @author   Jed Diaz
 * @since    07 August 2018
 */
class IntFormatterTest extends SapphireTest
{
    /**
     * Testing data for testFormat()
     *
     * @return array
     */
    public function providerTestFormat()
    {
        return [
            ['123', 123],
            [101, 101]
        ];
    }

    /**
     * Tests that ints get properly formatted
     *
     * @param mixed $value - value to format
     * @param int $expectedResult - the result expected to be returned by the format method
     *
     * @covers Format\StringFormatter::format
     * @dataProvider providerTestFormat
     *
     * @return void
     */
    public function testFormat($value, $expectedResult)
    {
        $formatter = new Format\IntFormatter();
        $result = $formatter->format($value);
        $this->assertInternalType(IsType::TYPE_INT, $result);
        $this->assertEquals($expectedResult, $result);
    }

    /**
     * Tests that empty values return as null
     *
     * @covers Format\StringFormatter::format
     * @dataProvider providerTestFormat
     *
     * @return void
     */
    public function testFormatNull()
    {
        $formatter = new Format\IntFormatter();
        $result = $formatter->format('');
        $this->assertEmpty($result);
    }
}