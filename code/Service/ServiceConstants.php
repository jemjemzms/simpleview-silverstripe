<?php

namespace Simpleview\Service;

/**
 * Constants class.
 * 
 * Constants class used to store information required by services.
 * 
 * @category Simpleview
 * @package  Format
 * 
 * @author   Jed Diaz
 * @since    07 August 2018
 */
class ServiceConstants
{
    /**
     * Constant that determines the amount of results to
     * expect per page
     * @TODO this should move to a constant class
     *
     * @var int
     */
    const REQUEST_PAGESIZE = 50;

    /**
     * Data model for the accommodation service.
     * 
     * @var string
     */
    const SERVICE_ACCOMMODATION = 'TOAccommodation';
    
    /**
     * Data model for the activity service.
     * 
     * @var string
     */
    const SERVICE_ACTIVITY = 'TOActivity';
    
    /**
     * Data model for the event service.
     * 
     * @var string
     */
    const SERVICE_EVENT = 'TOEvent';
    
    /**
     * Data model for the food service.
     * 
     * @var string
     */
    const SERVICE_FOOD = 'TOFood';
    
    /**
     * Data model for the product service.
     * 
     * @var string
     */
    const SERVICE_PRODUCT = 'TOProduct';
    
    /**
     * Data model for the service service.
     * 
     * @var string
     */
    const SERVICE_SERVICE = 'TOService';
    
    /**
     * Data model for the track service.
     * 
     * @var string
     */
    const SERVICE_TRACK = 'TOTrack';
    
    /**
     * Data model for the venue service.
     * 
     * @var string
     */
    const SERVICE_VENUE = 'TOVenue';

    /**
     * Identifier for the category id in the listing
     * XML object
     *
     * @var string
     */
    const XML_LISTING_CATID = 'CATID';
}