<?php

namespace Simpleview\Vo;

/**
 * Social Media vo
 *
 * @category Simpleview
 * @package  Vo
 *
 * @author   Jed Diaz
 * @since    06 August 2018
 */
class SocialMediaVo
{
    /**
     * @var int
     */
    public $level;

    /**
     * @var string
     */
    public $fieldName;

    /**
     * @var mixed
     */
    public $value;

    /**
     * @var string
     */
    public $service;

    /**
     * XML / vo key map
     *
     * @var array
     */
    public $voMap = [
        'level' => 'LEVEL',
        'fieldName' => 'FIELDNAME',
        'value' => 'VALUE',
        'service' => 'SERVICE',
    ];

    /**
     * Returns the key map
     *
     * @return array
     */
    public function getVoMap()
    {
        return $this->voMap;
    }
}