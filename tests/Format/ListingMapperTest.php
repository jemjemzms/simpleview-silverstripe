<?php

namespace SimpleviewTest\Format;

use \Hamcrest\Matchers;
use \Mockery;
use \SapphireTest;
use Simpleview\Format;
use Simpleview\Util;
use Simpleview\Vo;

/**
 * ListingMapperTest
 *
 * Test case class for the listing mapper
 *
 * @category SimpleviewTest
 * @package  Format
 *
 * @author   Jed Diaz
 * @since    06 August 2018
 */
class ListingMapperTest extends SapphireTest
{
    public function testRemapXmlValidation()
    {
        $this->markTestIncomplete('Validation has not been implemented yet');
    }

    /**
     * Tests that the method returns an array with the
     * correct amount of records in it
     *
     * @covers Format\ListingMapper::remapListingXmlService()
     * @runInSeparateProcess
     * @preserveGlobalState disabled
     *
     * @return void
     */
    public function testRemapXml()
    {
        $this->markTestIncomplete("The method is not complete yet, and will be changing often. Once it is finalized the testcase will be reworked");
        // setup
        $inputVo = new Vo\ListingVo();
        $inputData = [
            ['SORTCOMPANY' => 'company one'],
            ['SORTCOMPANY' => 'company two'],
            ['SORTCOMPANY' => 'company three'],
        ];
        $mockedInput = [
            [$inputData[0], $inputVo],
            [$inputData[1], $inputVo],
            [$inputData[2], $inputVo],
        ];
        $returnOne = new Vo\ListingVo();
        $returnOne->sortCompany = 'company one';
        $returnTwo = new Vo\ListingVo();
        $returnTwo->sortCompany = 'company two';
        $returnThree = new Vo\ListingVo();
        $returnThree->sortCompany = 'company three';
        $mockedReturns = [$returnOne, $returnTwo, $returnThree];
        // mocking
        $listingMapper = Mockery::mock('alias:' . Util\Mapping::class);
        $listingMapper->shouldReceive('remapXmlData')
            ->with($inputData[0], Matchers::equalTo($inputVo)) // @TODO this isn't working for consecutive calls
            ->andReturn($mockedReturns[0]);
        $listingMapper->shouldReceive('remapXmlData')
            ->with($inputData[1], Matchers::equalTo($inputVo)) // @TODO this isn't working for consecutive calls
            ->andReturn($mockedReturns[1]);
        $listingMapper->shouldReceive('remapXmlData')
            ->with($inputData[2], Matchers::equalTo($inputVo)) // @TODO this isn't working for consecutive calls
            ->andReturn($mockedReturns[2]);
        // test
        $format = new Format\ListingMapper();
        $result = $format->remapListingXmlService($inputData);
        // assertions
        $this->assertNotEmpty($result, 'Expected array with data, received empty array');
        $this->assertInternalType('array', $result, 'Expected array, received ' . gettype($result));
        $this->assertCount(3, $result, 'Expected array with 3 records, received array with ' . count($result) . 'records');
    }
}