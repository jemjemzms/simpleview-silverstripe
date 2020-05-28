<?php

namespace Simpleview\Model;

use \SQLInsert;

/**
 * Model class for activities
 *
 * @category Simpleview
 * @package  Model
 *
 * @author   Jed Diaz
 * @since    17 Auguest 2018
 */
class Activity
{
    /**
     * Saves an object containing activity data into the database
     *
     * @param object $data - object with activity data
     *
     * @return int
     */
    public function save($data)
    {
        $activity = TOActivity::create();
        $activity->ID = $data->ID; //
        $activity->DurationHours = $data->DurationHours;
        $activity->GroupCapacity = $data->GroupCapacity;
        $activity->write();
    }

    /**
     * Saves multiple records to the activities table
     *
     * @param array $data - records to insert
     *
     * @return
     */
    public function saveAll($data)
    {
        $insert = SQLInsert::create('"TOActivity"');
        $insert->addRows($data);
        $insert->execute();
    }
}