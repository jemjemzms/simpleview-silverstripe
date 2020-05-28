<?php

namespace Simpleview\Service;

use Simpleview\Api;
use SS_Log;

/**
 * Formatter class for listings.
 * 
 * @category Simpleview
 * @package  Format
 * 
 * @author   Jed Diaz
 * @since    01 August 2018
 */
class Listing
{
    /**
     * Api class
     *
     * @var Api\ListingApi
     */
    protected $api;

    /**
     * Service factory class
     *
     * @var Factory
     */
    protected $factory;

    /**
     * Listing constructor.
     *
     * @return void
     */
    public function __construct()
    {
        $this->api = new Api\ListingApi();
        $this->factory = new Factory();
    }

    /**
     * Initiates the processing of a single listing
     *
     * @param array $listing - array of listing data
     *
     * @return void
     */
    public function run($listing)
    {
        // get category (simpleview) id
        $simpleViewId = $listing[ServiceConstants::XML_LISTING_CATID];
        // get listing class
        $class = $this->factory->getClass($simpleViewId);
        $success = false;
        if (!is_null($class)) {
            $class->run($listing);
            $success = true;
        }
        return $success;
    }

    /**
     * Retrieves a list of listings and gets them inserted into the database
     * @TODO this method is incomplete - it only lets certain listings through at the moment
     *
     * @return void
     */
    public function runAll()
    {
        $pageSize = ServiceConstants::REQUEST_PAGESIZE;
        $pageNumber = 1;
        $hasErrors = 0;
        $hasResults = 1;
        $startTime = microtime(true);
        while ($hasErrors == 0 && $hasResults == 1) {
            $xml = $this->api->getList($pageSize, $pageNumber);
            $doc = new \DOMDocument('1.0');
            $doc->loadXml($xml->asXML());
            $cannedXml = $doc->C14N();
            $simpleXml = new \SimpleXMLElement($cannedXml);
            $json = json_encode($simpleXml);
            $data = json_decode($json, true);
            $requestResult = $data['REQUESTSTATUS'];
            // check result count
            if ($requestResult['RESULTS'] == 0) {
                $hasResults = 0;
            }
            // check for errors
            if ($requestResult['HASERRORS'] != 0) {
                $hasErrors = 1;
            }
            if ($hasErrors == 0 && $hasResults == 1) {
                ++$pageNumber;
                $data = reset($data['LISTINGS']);
                foreach ($data as $listing) {
                    $success = $this->run($listing);
                }
            }
        }
        $endTime = microtime(true);
        SS_Log::log('Total processing time : ' . ($endTime - $startTime), SS_Log::DEBUG);
    }
}