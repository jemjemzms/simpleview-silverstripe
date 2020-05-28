<?php

/**
 * Created by Jed Diaz (jed@tomahawk.co.nz)
 * User: jemjemzms
 * Date: 11/06/18
 * Time: 11:18 AM
 * Sub class for formating simpleview listing fields
*/

class SVListings_Format extends SVListings_Handler {

    public static function formatList( $list )
    {
      self::setAdditionalSingleData( $list['ADDITIONALINFORMATION'] );
      self::setSocialMediaSingleData( $list['SOCIALMEDIA'] );

      $simpleviewId          = $list['LISTINGID'];
      $className             = self::getCategory($list['CATNAME']);
      $productName           = self::getAdditionalValue('Product Name');
      $source                = self::getAdditionalValue('Source');
      $urlSlug               = self::generateUrl(self::getAdditionalValue('URL Segment'), $productName);
      $companyName           = $list['SORTCOMPANY'];
      $monthsOperation       = self::formatToCommaString(self::getAdditionalValueArray('Months Operation'));
      $email                 = $list['EMAIL'];
      $website               = $list['WEBURL'];
      $phone                 = $list['PHONE'];
      $freePhone             = $list['TOLLFREE'];
      $street                = $list['ADDR1'];
      $suburb                = $list['ADDR2'];
      $city                  = $list['CITY'];
      $state                 = $list['STATE'];
      $zip                   = $list['ZIP'];
      $summary               = self::getAdditionalValue('Summary');
      $description           = $list['DESCRIPTION'];
      $minPrice              = self::getAdditionalValue('Min Price');
      $maxPrice              = self::getAdditionalValue('Max Price');
      $priceInfo             = self::getAdditionalValue('Price Info');
      $minAge                = self::getAdditionalValue('Min Age');
      $bookingUrl            = self::getAdditionalValue('Booking URL');
      $facebookURL           = self::getSocialMediaValue('Facebook', 'URL');
      $twitterUrl            = self::getSocialMediaValue('Twitter', 'URL');
      $youtubeUrl            = self::getSocialMediaValue('YouTube', 'User');
      $youtubeChannelId      = self::getSocialMediaValue('YouTube', 'Channel'); 
      $instagramUrl          = self::getSocialMediaValue('Instagram', 'URL');
      $hashtag               = self::getAdditionalValue('Official Hashtag');
      $twentyfourseven       = (self::getAdditionalValue('24/7') ? 1 : 0);
      $isSuitableForGroups   = (self::getAdditionalValue('is Suitable For Groups') ? 1 : 0);
      $groupInfo             = self::getAdditionalValue('Group Info');
      $groupReservationEmail = self::getAdditionalValue('Group Reservation Email'); 
      $isTransportAvailable  = (self::getAdditionalValue('is Transport Available') ? 1 : 0);
      $transportInfo         = self::getAdditionalValue('Transport Info');
      $mondayFrom            = self::getAdditionalValue('Monday Open');
      $mondayTo              = self::getAdditionalValue('Monday Close');
      $tuesdayFrom           = self::getAdditionalValue('Tuesday Open');
      $tuesdayTo             = self::getAdditionalValue('Tuesday Close');
      $wednesdayFrom         = self::getAdditionalValue('Wednesday Open');
      $wednesdayTo           = self::getAdditionalValue('Wednesday Close');
      $thursdayFrom          = self::getAdditionalValue('Thursday Open');
      $thursdayTo            = self::getAdditionalValue('Thursday Close');
      $fridayFrom            = self::getAdditionalValue('Friday Open');
      $fridayTo              = self::getAdditionalValue('Friday Close');
      $saturdayFrom          = self::getAdditionalValue('Saturday Open');
      $saturdayTo            = self::getAdditionalValue('Saturday Close');
      $sundayFrom            = self::getAdditionalValue('Sunday Open');
      $sundayTo              = self::getAdditionalValue('Sunday Close');
      $logoImage             = $list['IMGPATH'].$list['LOGOFILE'];
      $mainImage             = $list['IMGPATH'].$list['PHOTOFILE'];
      $listingTypeId         = self::getListingTypeId();
      //$metaDescription       = self::getAdditionalValue('MetaDescription');

      $record = array(
                      //'ID'   => $listingId, 
                      'SimpleviewID'             => $simpleviewId,
                      'ClassName'                => $className,
                      'LastEdited'               => date("Y-m-d H:i:s"),
                      'Created'                  => date("Y-m-d H:i:s"),
                      'Name'                     => $productName,
                      'Source'                   => $source,
                      // 'ExternalID' => '', don't save
                      'URLSlug'                  => $urlSlug,
                      // 'Display' => '', dont save
                      // 'Archive' => '', dont save
                      // 'FeaturedItem' => '', dont save
                      'CompanyName'              => $companyName,
                      'MonthsOperation'          => $monthsOperation,
                      'Email'                    => $email,
                      'Website'                  => $website,
                      'Phone'                    => $phone,
                      'FreePhone'                => $freePhones,
                      // 'MobilePhone' => '' don't save,
                      'Street'                   => $street,
                      'Suburb'                   => $suburb,
                      'City'                     => $city,
                      'State'                    => $state,
                      'PostCode'                 => $zip,
                      // 'CountryName' => '' dont save,
                      //'Latitude' => '', dont save
                      //'Longitude' => '', dont save
                      // 'Zoom' => '', dont save
                      'Summary'                  => $summary,
                      'Description'              => $description,
                      // 'HoursOfOperation' => '', dont save
                      'MinPrice'                 => $minPrice,
                      'MaxPrice'                 => $maxPrice,
                      'PriceInfo'                => $priceInfo,
                      'MinAge'                   => $minAge,
                      'BookingURL'               => $bookingUrl,
                      'FacebookID'               => $facebookURL,
                      'TwitterID'                => $twitterUrl,
                      'YoutubeID'                => $youtubeUrl,
                      'YoutubeChannelID'         => $youtubeChannelId,
                      'InstagramID'              => $instagramUrl,
                      'OfficialHashtag'          => $hashtag,
                      // 'YoutubeVideoID' => '', dont save 
                      // 'IsClosedEveryday' => '', dont save
                      // 'RandomSortOrder' => '', dont save
                      'TwentyFourSeven'          => $twentyfourseven,
                      'isSuitableForGroups'      => $isSuitableForGroups,
                      'GroupInfo'                => $groupInfo,
                      'GroupReservationEmail'    => $groupReservationEmail,
                      'isTransportAvailable'     => $isTransportAvailable,
                      'TransportInfo'            => $transportInfo,
                      'MondayOpeningFrom'        => $mondayFrom,
                      'MondayOpeningTo'          => $mondayTo,
                      'TuesdayOpeningFrom'       => $tuesdayFrom,
                      'TuesdayOpeningTo'         => $tuesdayTo,
                      'WednesdayOpeningFrom'     => $wednesdayTo,
                      'WednesdayOpeningTo'       => $wednesdayFrom,
                      'ThursdayOpeningFrom'      => $thursdayTo,
                      'ThursdayOpeningTo'        => $thursdayFrom,
                      'FridayOpeningFrom'        => $fridayFrom,
                      'FridayOpeningTo'          => $fridayTo,
                      'SaturdayOpeningFrom'      => $saturdayFrom,
                      'SaturdayOpeningTo'        => $saturdayTo,
                      'SundayOpeningFrom'        => $sundayFrom,
                      'SundayOpeningTo'          => $sundayTo,
                      'ListingTypeID'            => $listingTypeId,
                      'ImageLogoURL'             => $logoImage,
                      'ImageMainURL'             => $mainImage
                    );

      return $record; 
    }

    public static function formatAccommodationList( $listingId, $list )
    {
      self::setAdditionalSingleData( $list['ADDITIONALINFORMATION'] );

      $id                = $listingId;
      $numOfRooms        = self::getAdditionalValue('Number Of Rooms');
      $numFunctionRooms  = self::getAdditionalValue('Num Of Function Rooms');
      $theatreCapacity   = self::getAdditionalValue('Theatre Capacity');
      $banquetCapacity   = self::getAdditionalValue('Banquet Capacity');
      $cocktailCapacity  = self::getAdditionalValue('Cocktail Capacity');
      $boardRoomCapacity = self::getAdditionalValue('Board Room Capacity');


      $record = array(
                      'ID'                 => $id, 
                      'NumOfRooms'         => $numOfRooms,
                      'NumOfFunctionRooms' => $numFunctionRooms,
                      'TheatreCapacity'    => $theatreCapacity,
                      'BanquetCapacity'    => $banquetCapacity,
                      'CocktailCapacity'   => $cocktailCapacity,
                      'BoardRoomCapacity'  => $boardRoomCapacity
                    );

      return $record; 
    }

    public static function formatProductList( $listingId, $list )
    {
      self::setAdditionalSingleData( $list['ADDITIONALINFORMATION'] );

      $id                 = $listingId;
      $tripadvisorId      = self::getAdditionalValue('TripAdvisorID');
      $qualmarkAccountId  = self::getAdditionalValue('QualmarkAccountID');
      $Qualmarked         = (self::getAdditionalValue('Qualmarked') ? 1 : 0);

      $record = array(
                      'ID'                   => $id, 
                      'TripAdvisorID'        => $tripadvisorId,
                      //'BookitID'             => $test dont save
                      //'TNZID'                => $test  dont save
                      'QualmarkAccountID'    => $qualmarkAccountId, 
                      //' QualmarkSegment'     => $test  dont save
                      //'TestSegment'          => $test  dont save
                      ' Qualmarked'          => $Qualmarked 
                      //'TripAdvisorRating'      => $numFunctionRooms, dont save
                      //'TripAdvisorLastUpdated' => $theatreCapacity, dont save
                      
                    );

      return $record; 
    }

    public static function formatVenueList( $listingId, $list )
    {
      self::setAdditionalSingleData( $list['ADDITIONALINFORMATION'] );

      $id                = $listingId;
      $numFunctionRooms  = self::getAdditionalValue('Num Of Function Rooms');
      $theatreCapacity   = self::getAdditionalValue('Theatre Capacity');
      $banquetCapacity   = self::getAdditionalValue('Banquet Capacity');
      $cocktailCapacity  = self::getAdditionalValue('Cocktail Capacity');
      $boardRoomCapacity = self::getAdditionalValue('Board Room Capacity');


      $record = array(
                      'ID'                 => $id, 
                      'NumOfFunctionRooms' => $numFunctionRooms,
                      'TheatreCapacity'    => $theatreCapacity,
                      'BanquetCapacity'    => $banquetCapacity,
                      'CocktailCapacity'   => $cocktailCapacity,
                      'BoardRoomCapacity'  => $boardRoomCapacity
                    );

      return $record; 
    }

    public static function formatActivityList( $listingId, $list )
    {
      self::setAdditionalSingleData( $list['ADDITIONALINFORMATION'] );

      $id                = $listingId;
      $durationHours  = self::getAdditionalValue('Duration Hours');
      $groupCapacity  = self::getAdditionalValueByFieldID(183);

      $record = array(
                      'ID'            => $id, 
                      'DurationHours' => $durationHours,
                      'GroupCapacity' => $groupCapacity
                    );

      return $record; 
    }

    public static function formatFoodList( $listingId, $list )
    {
      self::setAdditionalSingleData( $list['ADDITIONALINFORMATION'] );

      $id            = $listingId;
      $groupCapacity = self::getAdditionalValueByFieldID(184);

      $record = array(
                      'ID'            => $id, 
                      'GroupCapacity' => $groupCapacity
                    );

      return $record; 
    }
}