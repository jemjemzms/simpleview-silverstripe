<?php

namespace Simpleview\Service;

use Simpleview\Format\Formatter\Accommodation as Formatter;
use Simpleview\Format\Mapper\AccommodationXml as XmlMapper;
use Simpleview\Model\AccommodationOrm as OrmMapper;
use Simpleview\Validate\Accommodation as Validator;

/**
 * Accommodation service
 *
 * @category Simpleview
 * @package  Service
 *
 * @author   Jed Diaz
 * @since    08 August 2018
 */
class Accommodation extends AbstractService implements ServiceInterface
{
    /**
     * Accommodation constructor.
     *
     * @return void
     */
    public function __construct()
    {
        $mapper = new XmlMapper();
        $validator = new Validator();
        $formatter = new Formatter();
        $ormMapper = new OrmMapper();
        parent::__construct($mapper, $validator, $formatter, $ormMapper);
    }
}