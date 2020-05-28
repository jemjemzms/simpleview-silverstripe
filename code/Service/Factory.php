<?php

namespace Simpleview\Service;

use \Mapping;
use \TOListingType;
use SS_Log;

/**
 * Factory class.
 * 
 * Factory handler for categories.
 * 
 * @category Simpleview
 * @package  Format
 * 
 * @author   Jed Diaz
 * @since    07 August 2018
 */
class Factory
{
    
    /**
     * Gets the class required for the current simple view category.
     * If we are unable to retrieve any links then the method will simply
     * return null.
     * 
     * @param int $simpleViewId - the simple view Id for a category
     * 
     * @return ServiceInterface
     */
    public function getClass($simpleViewId)
    {
        if (empty($simpleViewId)) {
            return null;
        }
        $typeId = $this->getListingTypeIdFromSimpleViewId($simpleViewId);
        if (empty($typeId)) {
            return null;
        }
        $class = $this->getListingTypeClassFromId($typeId);
        if (empty($class)) {
            return null;
        }
        $service = null;
        switch ($class) {
            case ServiceConstants::SERVICE_ACCOMMODATION:
                $service = new Accommodation();
                break;
            case ServiceConstants::SERVICE_ACTIVITY:
                $service = new Activity();
                break;
            case ServiceConstants::SERVICE_EVENT:
                $service = null;
                break;
            case ServiceConstants::SERVICE_FOOD:
                $service = null;
                break;
            case ServiceConstants::SERVICE_PRODUCT:
                $service = null;
                break;
            case ServiceConstants::SERVICE_SERVICE:
                $service = null;
                break;
            case ServiceConstants::SERVICE_TRACK:
                $service = null;
                break;
            case ServiceConstants::SERVICE_VENUE:
                $service = null;
                break;
        }
        return $service;
    }
    
    /**
     * Gets the data model class name from a listing type.
     * 
     * @param int $typeId - the listing type Id
     * 
     * @return string - the data model class name
     */
    public function getListingTypeClassFromId($typeId)
    {
        $listing = TOListingType::get()->byID($typeId);
        // ensure we got something
        if ($listing->exists()) {
            return $listing->Class;
        }
        return null;
    }
    
    /**
     * Turns the simple view category Id into a Tom listing type Id.
     * Makes use of the mapping structure.
     * 
     * @param int $simpleViewId - the simple view category Id
     * 
     * @return int - the Tom listing type Id
     */
    public function getListingTypeIdFromSimpleViewId($simpleViewId)
    {
        $filter = [
            'Fk_key' => 'CategoryID', // @TODO make constant
            'SV_id' => $simpleViewId,
        ];
        $mapping = Mapping::get()->filter($filter);
        $typeId = null;
        if ($mapping->exists()) {
            $map = $mapping->first();
            $typeId = $map->Fk_value;
        }
        return $typeId;
    }
}