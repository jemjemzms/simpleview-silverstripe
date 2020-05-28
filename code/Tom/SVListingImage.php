<?php

/**
 * Simpleview Listing images
 *
 * Gallery images listings
 *
 * @category Simpleview
 * @package  Tom
 *
 * @author   Jed
 * @since    16 August 2018
 */
class SVListingImage extends SVImage
{
    /**
     * Image properties
     *
     * @var array
     */
    private static $db = array(
		'ImageWidth' => 'Int',
		'ImageHeight' => 'Int'
	);

    /**
     * Generate ListingID
     *
     * @var array
     */
    private static $has_one = array(
		'Listing' => 'TOListing'
	);
}
