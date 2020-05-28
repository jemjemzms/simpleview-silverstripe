<?php

use Simpleview\Service\Listing;

/**
 * Latest import task.
 * 
 * The latest import task runner used to import listings that were updated
 * recently on simpleview.
 * 
 * @category Simpleview
 * @package  Task
 * 
 * @author   Jed Diaz
 * @since    08 August 2018
 */
class LatestImport extends BuildTask
{
    
    /**
     * The service class to direct requests to.
     * 
     * @var Listing
     */
    protected $service;

    /**
     * Task constructor.
     *
     * @return void
     */
    public function __construct()
    {
        $this->service = new Listing();
        parent::__construct();
    }

    /**
     * Executes this build task.
     * 
     * @param SS_HTTPRequest $request - the http request data
     * 
     * @return void
     */
    public function run($request)
    {
        $success = true;
        try {
            // @TODO: we may need to pass in some variable to the service to show it should only handle latest changes
            $this->service->runAll();
        } catch (\Exception $e) {
            // @TODO: figure out what to do with major exceptions
            $success = false;
        }
        return $success;
    }
    
}