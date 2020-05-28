<?php

namespace Simpleview\Model;

use SimpleView\Vo;

/**
 * Orm mapper
 *
 * Class for mapping VOs to ORM objects, and writing them to the database
 *
 * @category Simpleview
 * @package  Model
 *
 * @author   Jed Diaz
 * @since    08 August 2018
 */
class OrmMapper
{
    /**
     * DataObject models used to write to database
     *
     * @var array
     */
    public $models;

    /**
     * Maps Vo to ORM objects and writes them to the database
     *
     * @param mixed $vo - vo to write to database
     *
     * @return int - inserted record
     */
    public function remap($vo)
    {
        $map = $vo->getOrmMap();
        foreach ($map as $voKey => $mappingDetails) {
            $modelName = $mappingDetails['model'];
            if (!isset($this->models[$modelName])) {
                $this->models[$modelName] = new $modelName();
            }
            if (isset($mappingDetails['complex']) && $mappingDetails['complex']) {
                // @TODO Jed you need to call  this  method again, recursively

                // @TODO check whether the complex type is another vo
                    // @TODO if yes
                        // @TODO call mapList and call map again
                    // @TODO if no
                        // @TODO handle this single array
            } else {
                // This sets the value on the ORM model
                $property = $mappingDetails['property'];
                $this->models[$modelName]->$property = $vo->$voKey;
            }
        }
        // Write to table, return id
        // @TODO currently this only handles writing to a single model, needs to be adjusted once we start doing complex writes
        // @TODO the complex writing will take place in the category specific class e.g. AccommodationOrm::write()
        return $this->models;
    }
}