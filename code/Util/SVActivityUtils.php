<?php

/**
 * Created by Jed Diaz (jed@tomahawk.co.nz).
 * User: jemjemzms
 * Date: 18/06/18
 * Time: 11:52 AM
 * Manage simpleview api listings response
*/
class SVActivityUtils extends Object
{
	private static $filter_type     = 'Equal To';
	private static $filter_category = 'ListingTest';
	private static $filter_value    = 9;
	private static $filter_name     = 'catID';

	private static $total_results   = 1;

	public function getListings()
	{
		$api_url  = Config::inst()->get('Simpleview', 'api_url');
		$username = Config::inst()->get('Simpleview', 'api_user_name');
		$password = Config::inst()->get('Simpleview', 'api_user_password');

		try {
			$client = new SoapClient($api_url);

			$response = $client->__call(
			  'getListings', 
			  array(
			    $username,
			    $password,
			    0,
			    self::$total_results,
			    array(
			      'FILTERS' => array(
			        array(
			          'FILTERTYPE' => self::$filter_type,
			          'FIELDCATEGORY' => self::$filter_category,
			          'FILTERVALUE' => self::$filter_value,
			          'FIELDNAME' => self::$filter_name
			        )
			      )
			    ),
			    0
			  )
			);

		} catch (Exception $e) {

			$response = $e->getMessage();
	        self::storeLog( $response );

	    } 

		return $response;
	}

	private function storeLog( $log ){
		$logData = array('Log' => $log);
		$logs = SVLogs::create()->update( $logData );
		$logs->write();
	}

	public function isSuccess( $data ){
		return is_array($data) ? true : false;
	}

}