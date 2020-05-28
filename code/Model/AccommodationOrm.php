<?php

namespace Simpleview\Model;

/**
 * Accommodation Orm
 *
 * Class for mapping Accommodation listings' vos to ORM data objects, and then
 * writing them to the database
 *
 * @category Simpleview
 * @package  Model
 *
 * @author   Jed Diaz
 * @since    08 August 2018
 */
class AccommodationOrm extends AbstractOrmMapper implements MapperInterface
{

    /**
     * Writes all the dataobjects in the write stack to the database
     *
     * @return bool
     */
    public function write()
    {
        try {
            \DB::getConn()->transactionStart();
            // @TODO this will write to the database, and will be fully aware of what kind of stack it will deal with
            // @TODO this is just temporary, the full write is lower down and will be implemented later
            $this->writeStack['TOListing']->ClassName = 'TOAccommodation';
            $listingId = $this->writeStack['TOListing']->write();

            // @TODO no need to initialize these models here once the work is done, since they remap method
            // @TODO will take care of that part.
            $this->writeStack['TOProduct'] = new \TOProduct();
            $this->writeStack['TOProduct']->ID = $listingId;
            $this->writeStack['TOProduct']->write();

            $this->writeStack['TOAccommodation'] = new \TOAccommodation();
            $this->writeStack['TOAccommodation']->ID = $listingId;
            $this->writeStack['TOAccommodation']->write();

            \DB::getConn()->transactionEnd();
            return true;
        } catch (\Exception $e) {
            \DB::getConn()->transactionRollback();
            return false;
        }
    }
}