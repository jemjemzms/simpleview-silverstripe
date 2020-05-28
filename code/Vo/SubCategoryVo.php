<?php

namespace Simpleview\Vo;

/**
 * Sub category Vo
 *
 * @category Simpleview
 * @package  Vo
 *
 * @author   Jed Diaz
 * @since    06 August 2018
 */
class SubCategoryVo
{
    public $subCategoryName;

    public $categoryName;

    public $subCategoryId;

    public $categoryId;

    public $listingId;

    /**
     * XML / vo key map
     *
     * @var array
     */
    public $voMap = [
        'subCategoryName' => 'SUBCATNAME',
        'categoryName' => 'CATNAME',
        'subCategoryId' => 'SUBCATID',
        'categoryId' => 'CATID',
        'listingId' => 'LISTINGID',
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