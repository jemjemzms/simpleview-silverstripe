<?php

/**
 * Created by Jed Diaz (jed@tomahawk.co.nz)
 * User: jemjemzms
 * Date: 27/06/18
 * Time: 2:09 PM
*/
class SVAccommodationSync extends BuildTask {

    public function run($request) {

        $utils = new SVAccommodationUtils;

        $response = $utils->getListings();

        if( $utils->isSuccess($response) ){

        $listingTypeId = Config::inst()->get('Simpleview', 'accommodation_id');

    	$listing = new SVListings_Operations( $listingTypeId, $response );
    	$listing->performOperation();

        $products = new SVListings_Products( $response );
        $products->performOperation();
        
        $accomm = new SVListings_Accommodation( $response );
        $accomm->performOperation();

    	} else{

    	echo $response;
    		
    	}

    	echo 'END EXECUTING TASK'; 
        exit;
    }
}