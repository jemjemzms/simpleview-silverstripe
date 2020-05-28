<?php

namespace SimpleviewTest\Api;

use \Mockery;
use \SapphireTest;
use Simpleview\Api;
use Simpleview\Api\ApiConstants;
use \SimpleXMLElement;

/**
 * ListingApiTest
 *
 * Test case class for the listing api
 *
 * @category SimpleviewTest
 * @package  Api
 *
 * @author   Jed Diaz
 * @since    06 August 2018
 */
class ListingApiTest extends SapphireTest
{
    /**
     * Tests that the method calls the correct methods
     * and returns the correct data
     *
     * @covers Api\ListingApi::getList()
     * @runInSeparateProcess
     * @preserveGlobalState disabled
     *
     * @return void
     */
    public function testGetList()
    {
        // setup
        $action = ApiConstants::SIMPLEVIEW_ENDPOINT_GETLISTINGS;
        $pagesize = 5;
        $pagenum = 2;
        $options = [
            Api\ApiConstants::API_CONSTANT_PAGESIZE => $pagesize,
            Api\ApiConstants::API_CONSTANT_PAGENUM => $pagenum,
        ];
        $data = '<TEST>DATA</TEST>';
        $return = new SimpleXMLElement($data);
        // mocking
        $abstractRequest = Mockery::mock('overload:' . Api\AbstractRequest::class);
        $abstractRequest->shouldReceive('makeRequest')
            ->with($action, $options)
            ->andReturn($return);
        // run test
        $api = new Api\ListingApi();
        $result = $api->getList($pagesize, $pagenum);
        // assert
        $this->assertInstanceOf(SimpleXMLElement::class, $result);
    }
}