<?php

namespace Simpleview\Service;

/**
 * Service Interface.
 * 
 * The service interface used by other services to determine what methods
 * should be exposed.
 * 
 * @category Simpleview
 * @package  Format
 * 
 * @author   Jed Diaz
 * @since    07 August 2018
 */
interface ServiceInterface
{
    /**
     * Initiates the processing of a single listing
     *
     * @param array $listing
     *
     * @return void
     */
    public function run($listing);
}