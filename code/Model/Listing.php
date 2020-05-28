<?php

namespace Simpleview\Model;

use Simpleview\Vo;
use \SQLInsert;

/**
 * Model class for listings.
 * 
 * @category Simpleview
 * @package  Model
 * 
 * @author   Jed Diaz
 * @since    02 August 2018
 */
class Listing {
    
    /**
     * Saves an array listing into the database.
     *
     * @param object $data - single array
     *
     * @return int
     */
    public function save ($data)
    {
        $list = TOListing::create();

        $list->SimpleviewID = $data->SimpleviewID;
        $list->ClassName = $data->ClassName;
        $list->LastEdited = $data->LastEdited;
        $list->Created = $data->Created;
        $list->Name = $data->Name;
        $list->Source = $data->Source;
        $list->URLSlug = $data->URLSlug;
        $list->CompanyName = $data->CompanyName;
        $list->MonthsOperation = $data->MonthsOperation;
        $list->Email = $data->Email;
        $list->Website = $data->Website;
        $list->Phone = $data->Phone;
        $list->FreePhone = $data->FreePhone;
        $list->Street = $data->Street;
        $list->Suburb = $data->Suburb;
        $list->City = $data->City;
        $list->State = $data->State;
        $list->City = $data->City;
        $list->PostCode = $data->PostCode;
        $list->Summary = $data->Summary;
        $list->Description = $data->Description;
        $list->MinPrice = $data->MinPrice;
        $list->MaxPrice = $data->MaxPrice;
        $list->PriceInfo = $data->PriceInfo;
        $list->MinAge = $data->MinAge;
        $list->BookingURL = $data->BookingURL;
        $list->FacebookID = $data->FacebookID;
        $list->TwitterID = $data->TwitterID;
        $list->YoutubeID = $data->YoutubeID;
        $list->YoutubeChannelID = $data->YoutubeChannelID;
        $list->InstagramID = $data->InstagramID;
        $list->OfficialHashtag = $data->OfficialHashtag;
        $list->TwentyFourSeven = $data->TwentyFourSeven;
        $list->isSuitableForGroups = $data->isSuitableForGroups;
        $list->GroupInfo = $data->GroupInfo;
        $list->GroupReservationEmail = $data->GroupReservationEmail;
        $list->isTransportAvailable = $data->isTransportAvailable;
        $list->TransportInfo = $data->TransportInfo;

        $list->write();
    }

    /**
     * Saves multidimensional array listing into the database.
     * 
     * @param array $data - multidimensional array
     * 
     * @return object
     */
    public function saveAll ($data)
    {
        $insert = SQLInsert::create('"TOListing"');
        $insert->addRows($data);
        $insert->execute();
    }
}