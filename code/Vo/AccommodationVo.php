<?php

namespace Simpleview\Vo;

/**
 * Accommodation Vo
 *
 * @category Simpleview
 * @package  Vo
 *
 * @author   Jed Diaz
 * @since    08 August 2018
 */
class AccommodationVo extends ListingVo
{
    /**
     * Map of fields specific to accommodations
     *
     * @var array
     */
    public $accommodationMap = [];

    /**
     * Map of formatting rules specific to accommodations
     *
     * @var array
     */
    public $accommodationRules = [];

    /**
     * Returns the map of accommodation fields, merged with the
     * general listing fields
     *
     * @return array
     */
    public function getVoMap()
    {
        $map = parent::getVoMap();
        return array_merge($map, $this->accommodationMap);
    }

    /**
     * Returns the map of accomodation rules, merged with the
     * general listing rules
     *
     * @return array
     */
    public function getFormatMap()
    {
        $rules = parent::getFormatMap();
        return array_merge($rules, $this->accommodationRules);
    }
}