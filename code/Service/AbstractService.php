<?php

namespace Simpleview\Service;

use SS_Log;
/**
 * Abstract Service
 *
 * Service for processing Simpleview data
 *
 * @category Simpleview
 * @package  Service
 *
 * @author   Jed Diaz
 * @since    08 August 2018
 */
abstract class AbstractService
{
    /**
     * Instance of a mapper class
     *
     * @var mixed
     */
    protected $mapper;

    /**
     * Instance validator class
     *
     * @var mixed
     */
    protected $validator;

    /**
     * Instance of a formatter class
     *
     * @var mixed
     */
    protected $formatter;

    /**
     * Instance of an ORM mapper class
     *
     * @var mixed
     */
    protected $ormMapper;

    /**
     * AbstractService constructor.
     *
     * @param mixed $mapper - instance of a mapper class
     * @param mixed $validator - instance of a validator class
     * @param mixed $formatter - instance of a formatter class
     * @param mixed $ormMapper - instance of an orm mapper class
     *
     * @return void
     */
    public function __construct($mapper, $validator, $formatter, $ormMapper)
    {
        $this->mapper = $mapper;
        $this->validator = $validator;
        $this->formatter = $formatter;
        $this->ormMapper = $ormMapper;
    }

    /**
     * Processes a single Simpleview listing
     *
     * @param array $listing - array of listing data
     */
    public function run($listing)
    {
        // map xml to vo
        $time['start'] = microtime(true);
        $vo = $this->mapper->remapDefault($listing);
        // validate
        if ($this->validator->validate($vo)) {
            // format
            $formattedVo = $this->formatter->format($vo);
            // map vo to orm
            $remapped = $this->ormMapper->remapOrm($formattedVo);
            if ($remapped) {
                $this->ormMapper->write();
                $time['end'] = microtime(true);
            }
        }
        $time = $time['end'] - $time['start'];
        $logString = 'Listing ' . $vo->listingId . PHP_EOL . ' processing time: ' . $time;
        SS_Log::log($logString, SS_Log::DEBUG);
    }
}