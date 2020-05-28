<?php

/**
 * Created by Jed Diaz (jed@tomahawk.co.nz)
 * User: jemjemzms
 * Date: 11/06/18
 * Time: 11:18 AM
 * Sub class for storing the simpleview listing calls
*/

class SVListings_Food extends SVListings_Handler {

    public function __construct( $arrData )
    {
        $this->raw_listings = $arrData;
        parent::__construct();
    }

    public function performOperation()
    {
       // Get Raw Response Listings
       $responseArrData = $this->getResponseListings();

       // Build Response Listings into a Database Format Records
       $buildData = self::buildData($responseArrData);

       if(count($buildData) > 0){
            self::insertData($buildData);
       }
    }

    public static function buildData( $responseData )
    {
      $records = $responseData['DATA'];    
        $itemList = array();
        foreach($records as $item){
            $itemRecord = TOListing::get()->filter('SimpleviewID', $item['LISTINGID'])->first();

            if($itemRecord->exists()) {
                $itemList[] = SVListings_Format::formatFoodList( $itemRecord->ID, $item );
            }
       }

       return $itemList;
    }

    public static function insertData( $buildData )
    {
       $insert = SQLInsert::create('"'.Config::inst()->get('Simpleview', 'class').'Food"');
       $insert->addRows($buildData);
       $insert->execute();
    }
}