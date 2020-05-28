<?php

/**
 * Created by Jed Diaz (jed@tomahawk.co.nz)
 * User: jemjemzms
 * Date: 27/06/18
 * Time: 2:09 PM
*/
class SVServicesSync extends BuildTask {

    public function run($request) {

        $utils = new SVServicesUtils;

        $response = $utils->getListings();

        if( $utils->isSuccess($response) ){

        $listingTypeId = Config::inst()->get('Simpleview', 'product_services_id');
        
    	$listing = new SVListings_Operations( $listingTypeId, $response );
    	$listing->performOperation();

        $products = new SVListings_Products( $response );
        $products->performOperation();

    	} else{

    	echo $response;
    		
    	}

    	echo 'END EXECUTING TASK'; 
        exit;
    }
}