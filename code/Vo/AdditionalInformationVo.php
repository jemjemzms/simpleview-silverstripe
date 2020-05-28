<?php

namespace Simpleview\Vo;

/**
 * Additional information VO
 *
 * @category Simpleview
 * @package  Vo
 *
 * @author   Jed Diaz
 * @since    06 August 2018
 */
class AdditionalInformationVo
{
    /**
     * Indicates whether this item holds a single value, or multiple
     *
     * @var bool
     */
    public $multipleValues;

    /**
     * @var string
     */
    public $name;

    /**
     * Array of values
     *
     * @var array
     */
    public $valueArray;

    /**
     * @var mixed
     */
    public $value;

    /**
     * @var int
     */
    public $fieldId;

    /**
     * XML / vo key map
     *
     * @var array
     */
    public $voMap = [
        'MULTIPLEVALUES' => 'multipleValues',
        'NAME' => 'name',
        'VALUEARRAY' => 'valueArray',
        'VALUE' => 'value',
        'FIELDID' => 'fieldId'
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