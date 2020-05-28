<?php

/**
 * Created by Jed Diaz (jed@tomahawk.co.nz)
 * User: jemjemzms
 * Date: 11/06/18
 * Time: 11:18 AM
 * Sub class for storing the simpleview listing calls
*/

class SVListings_Operations extends SVListings_Handler {

    public function __construct( $listingTypeId, $arrData )
    {
        self::$listing_type_id = $listingTypeId;
        $this->raw_listings = $arrData;
        parent::__construct();
    }

    public function performOperation()
    {
       // Get Raw Response Listings
       $responseArrData = $this->getResponseListings();

       // Build Response Listings into a Database Format Records
       $this->buildData($responseArrData);

       if(count(self::getBuildData()) > 0){
            $this->insertData();
       }
    }

    public function buildData($arrData)
    {
        $records = $arrData['DATA'];    
        $itemList = array();
        foreach($records as $item){

            $listingId = $item['LISTINGID'];
      
            if($this->listingItemNotExist($listingId)){

                $itemList[] = SVListings_Format::formatList( $item );
                
            }
       }

       self::setBuildData($itemList);
    }

    public function insertData()
    {
       $arrData = self::getBuildData();
       $insert = SQLInsert::create('"'.Config::inst()->get('Simpleview', 'class').'Listing"');
       $insert->addRows($arrData);
       $insert->execute();
    }

    public function listingItemNotExist($listingId)
    {
        return ($this->getDatabaseListingsTotalCount() > 0 && 
                array_key_exists($listingId, $this->getDatabaseListings())) ? false : true;
    }

}