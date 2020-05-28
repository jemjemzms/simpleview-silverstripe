<?php

namespace Simpleview\Service;

use Simpleview\Format\Formatter\Activity as Formatter;
use Simpleview\Format\Mapper\ActivityXml as XmlMapper;
use Simpleview\Model\ActivityOrm as OrmMapper;
use Simpleview\Validate\Activity as Validator;

/**
 * Activity servuce
 *
 * @category Simpleview
 * @package  Service
 *
 * @author   Jed Diaz
 * @since    15 August 2018
 */
class Activity extends AbstractService implements ServiceInterface
{
    /**
     * Activity constructor.
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