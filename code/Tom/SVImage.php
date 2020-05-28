<?php

/**
 * Simpleview images
 *
 * Simpleview Images storage
 *
 * @category Simpleview
 * @package  Tom
 *
 * @author   Jed
 * @since    16 August 2018
 */
class SVImage extends DataObject 
{
    /**
     * Image properties
     *
     * @var array
     */
    private static $db = array(
		'ShowInSearch' => 'Int',
		'Url' => 'Varchar(255)'
	);

}