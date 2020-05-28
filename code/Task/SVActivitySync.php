<?php

/**
 * Created by Jed Diaz (jed@tomahawk.co.nz)
 * User: jemjemzms
 * Date: 27/06/18
 * Time: 2:09 PM
*/
class SVActivitySync extends BuildTask {

    public function run($request) {

        $utils = new SVActivityUtils;

        $response = $utils->getListings();

        if( $utils->isSuccess($response) ){

        $listingTypeId = Config::inst()->get('Simpleview', 'activity_id');
        
    	$listing = new SVListings_Operations( $listingTypeId, $response );
    	$listing->performOperation();

        $products = new SVListings_Products( $response );
        $products->performOperation();

        $activity = new SVListings_Activity( $response );
        $activity->performOperation();

    	} else{

    	echo $response;
    		
    	}

    	echo 'END EXECUTING TASK'; 
        exit;
    }
}