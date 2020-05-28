<?php

namespace SimpleviewTest\Service;

use Simpleview\Service;
use \SapphireTest;

/**
 * Category factory test.
 * 
 * Testing class for the setup of category classes.
 * 
 * @category Simpleview
 * @package  Format
 * 
 * @author   Jed Diaz
 * @since    07 August 2018
 */
class FactoryTest extends SapphireTest
{

    public function testRun()
    {
        $service = new Service\Listing();
        $service->runAll();
    }

    /**
     * Tests that the temp method makes a call to the formatter.
     * The result is returned from the formatter.
     * 
     * @covers CategoryFactory::getClass
     * 
     * @return void
     */
    public function testGetClass()
    {
        // setup
        $simpleViewId = 8;
        $expected = Service\Accommodation::class;
        $factory = new Service\Factory();
        // system under test
        $result = $factory->getClass($simpleViewId);
        $this->assertInstanceOf($expected, $result);
    }
}