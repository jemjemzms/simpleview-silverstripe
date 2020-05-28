<?php

/**
 * Created by Jed Diaz (jed@tomahawk.co.nz)
 * User: jemjemzms
 * Date: 11/06/18
 * Time: 11:18 AM
 * Base class for Listings
*/

class SVListings_Handler {

    protected $raw_listings      = array();
    protected $db_listings       = array();
    protected $db_listings_count = 0;
    protected static $listing_type_id   = 0;

    private static $additional_information_data = array();
    private static $social_media_data = array();
    private static $build_data = array();

    public function __construct() 
    { 
      $this->setDatabaseListings();
      $this->setDatabaseListingsCount();
    } 

    public function setDatabaseListings()
    {
        $this->db_listings = SimpleviewListing::get()->map()->toArray();
    }

    public function setDatabaseListingsCount()
    {
        $this->db_listings_count = SimpleviewListing::get()->count();
    }

    public function getResponseListings()
    { 
        return $this->raw_listings; 
    }

    public static function getListingTypeId()
    { 
        return self::$listing_type_id; 
    }

    public function getDatabaseListings()
    {
        return $this->db_listings;
    }

    public function getDatabaseListingsTotalCount()
    {
        return $this->db_listings_count;
    }

    public static function setBuildData( $arrData ){
        self::$build_data = $arrData;
    }

    public static function getBuildData(){
        return self::$build_data;
    }

    public static function setAdditionalSingleData( $arrData )
    {
        self::$additional_information_data = $arrData;
    }

    public static function setSocialMediaSingleData( $arrData )
    {
        self::$social_media_data = $arrData;
    }

 /**
   * Get value by filtering the additional array data 
   * @params 
   *   - Field
   * @return string
   */
    public static function getAdditionalValue( $field )
    {
      $arrData = self::$additional_information_data;

      $arrKey = array_search($field, array_column($arrData, 'NAME'));
      $value = $arrData[$arrKey]['VALUE'];  

      return (!empty($value) ? $value : '');
    }

    public static function getAdditionalValueByFieldID( $fieldId ){
      $arrData = self::$additional_information_data;

      $arrKey = array_search($field, array_column($arrData, 'FIELDID'));
      $value = $arrData[$arrKey]['VALUE'];  

      return (!empty($value) ? $value : '');
    }

  /**
   * Get values by filtering the additional array data 
   * @params 
   *   - Field
   * @return array
   */ 
    public static function getAdditionalValueArray( $field )
    {
      $arrData = self::$additional_information_data;

      $arrKey = array_search($field, array_column($arrData, 'NAME'));
      $values = $arrData[$arrKey]['VALUEARRAY']; 

      return (!empty($values) ? $values : '');
    }

  /**
   * Generate the URL via the $name if the $url parameter is empty
   * @params 
   *   - URL
   *   - Product Name 
   * @return string
   */
    public static function generateUrl( $url, $name )
    {
      if ($url == '') {
        $filter = URLSegmentFilter::create();

        return $filter->filter($name);
      } 
        
      return $url; 
    }

  /**
   * Format array to a comma seperated string
   * @params 
   *   - Array
   * @return comma separated string
   */
    public static function formatToCommaString( $arrData )
    {
      return (!empty($arrData) ? implode(',', $arrData) : '');
    }

  /**
   * Get value by filtering the social media array data 
   * @params 
   *   - Service (Youtube, Facebook, Instagram, TripAdvisor)
   *   - Field   (User, URL, ID)
   * @return string
   */
    public static function getSocialMediaValue( $service, $field )
    {
      $arrData = self::$social_media_data;

      if(!empty($arrData)){
        foreach($arrData as $item){
          if($item['SERVICE'] == $service && $item['FIELDNAME'] == $field){
            $value = $item['VALUE'];
            return (!empty($value) ? $value : '');
          } 
        }
      } 

      return '';
    }

    public static function getCategory( $category ){

      $categoriesData = array(
                        'Accommodation' => 'TOAccommodation',
                        'Venues' => 'TOVenue',
                        'Activities' => 'TOActivity',
                        'Eat & Drink' => 'TOFood',
                        'Services' => 'TOService',
                        'Shopping' => 'TOProduct',
                        'Study' => 'TOProduct',
                        'default' => 'TOVenue'
                      );

      return $categoriesData[$category];
    }
}