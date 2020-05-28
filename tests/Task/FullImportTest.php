<?php

namespace SimpleviewTest\Task;

use \FullImport;
use \SapphireTest;
use \SS_HTTPRequest;
use Simpleview\Service;

/**
 * Full import test.
 * 
 * Testing class for ensuring that the full import task works as expected.
 * 
 * @category Simpleview
 * @package  Task
 * 
 * @author   Jed Diaz
 * @since    08 August 2018
 */
class FullImportTest extends SapphireTest
{
    
    /**
     * Tests that the task runner creates an instance of the base listing service.
     * The run method should be called with the expected parameters.
     * The task should return a boolean true result.
     * 
     * @covers FullImport::run
     * @runInSeparateProcess
     * @preserveGlobalState disabled
     * 
     * @return void
     */
    public function testRun()
    {
        // setup
        $request = new SS_HTTPRequest('GET', 'www.example.com');
        // mocking
        $format = \Mockery::mock('overload:' . Service\Listing::class);
        $format->shouldReceive('runAll')
            ->once();
        $service = new FullImport();
        // system under test
        $result = $service->run($request);
        $this->assertTrue($result);
    }
    
}