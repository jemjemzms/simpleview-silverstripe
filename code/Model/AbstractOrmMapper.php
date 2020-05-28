<?php

namespace Simpleview\Model;

/**
 * Abstract mapper
 *
 * Abstract class for mapping Vos to Orm data objects
 * and writing them to database tables
 *
 * @category Simpleview
 * @package  Model
 *
 * @author   Jed Diaz
 * @since    08 August 2018
 */
abstract class AbstractOrmMapper
{
    /**
     * Instance of Orm mapper class
     *
     * @var OrmMapper
     */
    protected $ormMapper;

    /**
     * The tables and their data to write to them.
     *
     * @var array
     */
    protected $writeStack;

    /**
     * AbstractOrmMapper constructor.
     *
     * @return void
     */
    public function __construct()
    {
        $this->ormMapper = new OrmMapper();
    }

    /**
     * Maps Vo to Orm data objects and writes them to
     * database tables
     *
     * @param mixed $vo - vo to map to orm data objects
     *
     * @return bool - if the remapping was a success
     */
    public function remapOrm($vo)
    {
        $this->writeStack = $this->ormMapper->remap($vo);
        return true;
    }

    /**
     * Write data to database
     *
     * @return mixed
     */
    public abstract function write();
}