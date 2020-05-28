<?php

namespace Simpleview\Vo;

use Simpleview\Format;
use Simpleview\Validate;

/**
 * Listing Vo
 *
 * @category Simpleview
 * @package  Vo
 *
 * @author   Jed Diaz
 * @since    06 August 2018
 */
class ListingVo
{
    /**
     * The company name
     *
     * @var string
     */
    public $sortCompany;

    /**
     * Indicates what formatter of listing this is
     *
     * @var string
     */
    public $formatterName;

    /**
     * @var string
     */
    public $state;

    /**
     * @var int
     */
    public $listingId;

    /**
     * logo file details (width, height, filename etc)
     * comma delimited string
     *
     * @var string
     */
    public $logoFile;

    /**
     * @var int
     */
    public $row;

    /**
     * @var string
     */
    public $webUrl;

    /**
     * @var string
     */
    public $contactTitle;

    /**
     * url location of image
     *
     * @var string
     */
    public $imgPath;

    /**
     * @var float
     */
    public $latitude;

    /**
     * @var string
     */
    public $addressLine2;

    /**
     * @var string
     */
    public $phoneNumber;

    /**
     * @var string
     */
    public $addressLine1;

    /**
     * @var SubCategoryVo
     */
    public $additionalSubCategories;

    /**
     * @var string
     */
    public $addressLine3;

    /**
     * @var string
     */
    public $zip;

    /**
     * @var string
     */
    public $email;

    /**
     * @var string
     */
    public $categoryName;

    /**
     * @var string
     */
    public $region;

    /**
     * @var string
     */
    public $fax;

    /**
     * @var string
     */
    public $rankName;

    /**
     * @var string
     */
    public $accountStatus;

    /**
     * @var string
     */
    public $company;

    /**
     * @var int
     */
    public $subCategoryId;

    /**
     * @var string
     */
    public $description;

    /**
     * @var SocialMediaVo
     */
    public $socialMedia;

    /**
     * @var bool
     */
    public $tollFree;

    /**
     * @var string
     */
    public $dateCreated;

    /**
     * @var int
     */
    public $rankId;

    /**
     * @var int
     */
    public $categoryId;

    /**
     * @var string
     */
    public $alternativePhoneNumber;

    /**
     * @var string
     */
    public $lastUpdated;

    /**
     * @var string
     */
    public $listingKeywords;

    /**
     * @var AdditionalInformationVo
     */
    public $additionalInformation;

    /**
     * @var string
     */
    public $subCategoryName;

    /**
     * @var string
     */
    public $accountKeywords;

    /**
     * @var string
     */
    public $contactName;

    /**
     * @var string
     */
    public $city;

    /**
     * @var float
     */
    public $longitude;

    /**
     * @var int
     */
    public $accountId;

    /**
     * photo file info (width, height, filename, etc)
     * comma delimited list
     *
     * @var string
     */
    public $photoFile;

    /**
     * @var int
     */
    public $regionId;

    /**
     * XML / vo key map
     *
     * @var array
     */
    public $voMap = [
        'sortCompany' => 'SORTCOMPANY',
        'typeName' => 'TYPENAME',
        'state' => 'STATE',
        'listingId' => 'LISTINGID',
        'logoFile' => 'LOGOFILE',
        'row' => 'ROW',
        'webUrl' => 'WEBURL',
        'contactTitle' => 'PRIMARYCONTACTTITLE',
        'imgPath' => 'IMGPATH',
        'latitude' => 'LATITUDE',
        'addressLine2' => 'ADDR2',
        'phoneNumber' => 'PHONE',
        'addressLine1' => 'ADDR1',
        'additionalSubCategories' => 'ADDITIONALSUBCATS::' . SubCategoryVo::class,
        'addressLine3' => 'ADDR3',
        'zip' => 'ZIP',
        'email' => 'EMAIL',
        'categoryName' => 'CATNAME',
        'region' => 'REGION',
        'fax' => 'FAX',
        'rankName' => 'RANKNAME',
        'accountStatus' => 'ACCTSTATUS',
        'typeId' => 'TYPEID',
        'company' => 'COMPANY',
        'subCategoryId' => 'SUBCATID',
        'description' => 'DESCRIPTION',
        'socialMedia' => 'SOCIALMEDIA::' . SocialMediaVo::class,
        'tollFree' => 'TOLLFREE',
        'dateCreated' => 'CREATED',
        'rankId' => 'RANKID',
        'categoryId' => 'CATID',
        'alternativePhoneNumber' => 'ALTPHONE',
        'lastUpdated' => 'LASTUPDATED',
        'listingKeywords' => 'LISTINGKEYWORDS',
        'additionalInformation' => 'ADDITIONALINFORMATION::' . AdditionalInformationVo::class,
        'subCategoryName' => 'SUBCATNAME',
        'accountKeywords' => 'ACCOUNTKEYWORDS',
        'contactName' => 'PRIMARYCONTACTFULLNAME',
        'city' => 'CITY',
        'longitude' => 'LONGITUDE',
        'accountId' => 'ACCTID',
        'photoFile' => 'PHOTOFILE',
        'regionId' => 'REGIONID',
    ];

    /**
     * Model mapping for listing fields
     *
     * @var array
     */
    public $ormMap = [
        'sortCompany' => [
            'model' => \TOListing::class,
            'property' => 'Name',
            'complex' => false
        ],
        // 'typeName' => [],
        'state' =>  [
            'model' => \TOListing::class,
            'property' => 'State',
            'complex' => false
        ],
        'listingId' =>  [
            'model' => \TOListing::class,
            'property' => 'SimpleviewID',
            'complex' => false
        ],
        // 'logoFile' => [],
        // 'row' => [],
        'webUrl' =>  [
            'model' => \TOListing::class,
            'property' => 'Website',
            'complex' => false
        ],
        // 'contactTitle' => [],
        // 'imgPath' => [],
        'latitude' => [
            'model' => \TOListing::class,
            'property' => 'Latitude',
            'complex' => false
        ],
        'addressLine2' => [
            'model' => \TOListing::class,
            'property' => 'Suburb',
            'complex' => false
        ],
        'phoneNumber' =>  [
            'model' => \TOListing::class,
            'property' => 'Phone',
            'complex' => false
        ],
        'addressLine1' => [
            'model' => \TOListing::class,
            'property' => 'Street',
            'complex' => false
        ],
        // 'additionalSubCategories' => [],
        // 'addressLine3' => [],
        'zip' => [
            'model' => \TOListing::class,
            'property' => 'PostCode',
            'complex' => false
        ],
        'email' => [
            'model' => \TOListing::class,
            'property' => 'Email',
            'complex' => false
        ],
        // 'categoryName' => [],
        // 'region' => [],
        // 'fax' => [],
        // 'rankName' => [],
        // 'accountStatus' => [],
        // 'typeId' => [],
        'company' => [
            'model' => \TOListing::class,
            'property' => 'CompanyName',
            'complex' => false
        ],
        // 'subCategoryId' => [],
        'description' => [
            'model' => \TOListing::class,
            'property' => 'Description',
            'complex' => false
        ],
//        'socialMedia' => [
//            'model' => SocialMediaVo::class,
//            'complex' => true
//        ],
        'tollFree' => [
            'model' => \TOListing::class,
            'property' => 'FreePhone',
            'complex' => false
        ],
        // 'dateCreated' => [],
        // 'rankId' => [],
        // 'categoryId' => [],
        // 'alternativePhoneNumber' => [],
        // 'lastUpdated' => [],
        // 'listingKeywords' => [],
        // 'additionalInformation' => [],
        // 'subCategoryName' => [],
        // 'accountKeywords' => [],
        // 'contactName' => [],
        'city' => [
            'model' => \TOListing::class,
            'property' => 'City',
            'complex' => false
        ],
        'longitude' => [
            'model' => \TOListing::class,
            'property' => 'Longitude',
            'complex' => false
        ],
        // 'accountId' => [],
        // 'photoFile' => [],
        // 'regionId' => [],
    ];

    /*
     * Rules for validating the data
     *
     * @var array
     */
    public $validationMap = [
        'sortCompany' => [
            'validator' => Validate\ValidateString::class,
            'criteria' => [
                'length' => [
                    'max' => 250
                ],
            ],
        ],
        'typeName' => [
            'validator' => Validate\ValidateString::class,
        ],
        'state' => [
            'validator' => Validate\ValidateString::class,
            'criteria' => [
                'length' => [
                    'max' => 100
                ],
            ],
        ],
        'listingId' => [
            'validator' => Validate\ValidateInt::class,
            'criteria' => [
                'filter' => FILTER_VALIDATE_INT,
                'min' => 1,
                'default' => null,
            ],
        ],
        'logoFile' => [
            'validator' => Validate\ValidateString::class,
        ],
        'row' => [
            'validator' => Validate\ValidateInt::class,
            'criteria' => [
                'filter' => FILTER_VALIDATE_INT,
                'min' => 0,
                'default' => 0,
            ],
        ],
        'webUrl' => [
            'validator' => Validate\ValidateString::class,
            'criteria' => [
                'length' => [
                    'max' => 250
                ],
            ],
        ],
        'contactTitle' => [
            'validator' => Validate\ValidateString::class,
        ],
        'imgPath' => [
            'validator' => Validate\ValidateString::class,
        ],
        'latitude' => [
            'validator' => Validate\ValidateFloat::class,
            'criteria' => [
                'filter' => FILTER_VALIDATE_FLOAT,
                'max' => 90,
                'min' => -90
            ],
        ],
        'addressLine2' => [
            'validator' => Validate\ValidateString::class,
            'criteria' => [
                'length' => [
                    'max' => 250
                ],
            ],
        ],
        'phoneNumber' => [
            'validator' => Validate\ValidateString::class,
        ],
        'addressLine1' => [
            'validator' => Validate\ValidateString::class,
            'criteria' => [
                'length' => [
                    'max' => 250
                ],
            ],
        ],
        // @TODO Unfortunately we dont have time to get to this just yet
//        'additionalSubCategories' => [
//            'validator' => 'voArray',
//            'class' => SubCategoryVo::class
//        ],
        'addressLine3' => [
            'validator' => Validate\ValidateString::class,
            'criteria' => [
                'length' => [
                    'max' => 250
                ],
            ],
        ],
        'zip' => [
            'validator' => Validate\ValidateString::class,
            'criteria' => [
                'length' => [
                    'max' => 10
                ],
            ],
        ],
        'email' => [
            'validator' => Validate\ValidateString::class,
            'criteria' => [
                'length' => [
                    'max' => 250
                ],
            ],
        ],
//        'categoryName' => [
//            'validator' => Validate\ValidateEnum::class,
//            'criteria' => [
//                'options' => [
//                    'TOListing', 'TOEvent', 'TOProduct', 'TOAccommodation',
//                    'TOActivity', 'TOFood', 'TOService', 'TOVenue', 'TOTrack'
//                ],
//                'default' => 'TOListing',
//            ],
//        ],
        'region' => [
            'validator' => Validate\ValidateString::class,
            'criteria' => [

            ],
        ],
        'fax' => [
            'validator' => Validate\ValidateString::class,
        ],
        'rankName' => [
            'validator' => Validate\ValidateString::class,
        ],
        //        'accountStatus', @TODO might be an ENUM?
        // 'company', // @TODO I can't find what this needs to be mapped to
        'subCategoryId' => [
            'validator' => Validate\ValidateInt::class,
            'filter' => FILTER_VALIDATE_INT,
            'min' => 1,
            'default' => null,
        ],
        'description' => [
            'validator' => Validate\ValidateString::class,
            // @TODO needs special rule for HTML text
        ],
        // @TODO Skipping this because we're not sure exactly what should happen with these yet
//        'socialMedia' => [
//            'formatter' => 'voArray',
//            'class' => SocialMediaVo::class
//        ],
        'tollFree' => [
            'validator' => Validate\ValidateString::class,
        ],
        'dateCreated' => [
            'validator' => Validate\ValidateDate::class,
            'criteria' => [
                'format' => 'Y-m-d H:i:s.u'
            ],
        ],
        'rankId' => [
            'validator' => Validate\ValidateInt::class,
            'criteria' => [
                'filter' => FILTER_VALIDATE_INT,
                'min' => 1,
                'default' => null,
            ],
        ],
        'categoryId' => [
            'validator' => Validate\ValidateInt::class,
            'criteria' => [
                'filter' => FILTER_VALIDATE_INT,
                'min' => 1,
                'default' => null,
            ],
        ],
        'alternativePhoneNumber' => [
            'validator' => Validate\ValidateString::class,
        ],
        'lastUpdated' => [
            'validator' => Validate\ValidateDate::class,
            'criteria' => [
                'format' => 'Y-m-d H:i:s.u'
            ],
        ],
//        'listingKeywords', @TODO I can't find what this needs to be mapped to
        // @TODO Skipping this because the additional info array has a ton of info that we don't know what to do with,
        // @TODO so instead of going ahead and just inserting it anywhere, we're going to find out first before implementing this
//        'additionalInformation' => [
//            'formatter' => 'voArray',
//            'class' => AdditionalInformationVo::class
//        ],
        'subCategoryName' => [
            'validator' => Validate\ValidateString::class,
        ],
        'accountKeywords' => [
            // @TODO I can't find what this needs to be mapped to
            'validator' => Validate\ValidateString::class,
        ],
        'contactName' => [
            'validator' => Validate\ValidateString::class,
        ],
        'city' => [
            'validator' => Validate\ValidateString::class,
            'criteria' => [
                'length' => [
                    'max' => 50
                ],
            ],
        ],
        'longitude' => [
            'validator' => Validate\ValidateFloat::class,
            'criteria' => [
                'filter' => FILTER_VALIDATE_FLOAT,
                'max' => 180,
                'min' => -180
            ],
        ],
        'accountId' => [
            'validator' => Validate\ValidateInt::class,
            'criteria' => [
                'filter' => FILTER_VALIDATE_INT,
                'min' => 1,
                'default' => null,
            ],
        ],
        'photoFile' => [
            'validator' => Validate\ValidateString::class,
        ],
        'regionId' => [
            'validator' => Validate\ValidateInt::class,
            'criteria' => [
                'filter' => FILTER_VALIDATE_INT,
                'min' => 1,
                'default' => null,
            ],
        ],
    ];

    /*
     * Rules for formatting the data
     *
     * @var array
     */
    public $formatMap = [
        'sortCompany' => [
            'formatter' => Format\StringFormatter::class,
            'filter' => FILTER_SANITIZE_STRING
        ],
        'typeName' => [
            'formatter' => Format\StringFormatter::class,
            'filter' => FILTER_SANITIZE_STRING
        ],
        'state' => [
            'formatter' => Format\StringFormatter::class,
            'filter' => FILTER_SANITIZE_STRING
        ],
        'listingId' => [
            'formatter' => Format\IntFormatter::class,
            'filter' => FILTER_SANITIZE_NUMBER_INT
        ],
        'logoFile' => [
            'formatter' => Format\StringFormatter::class,
            'filter' => FILTER_SANITIZE_STRING
        ],
        'row' => [
            'formatter' => Format\IntFormatter::class,
            'filter' => FILTER_SANITIZE_NUMBER_INT
        ],
        'webUrl' => [
            'formatter' => Format\StringFormatter::class,
            'filter' => FILTER_SANITIZE_STRING
        ],
        'contactTitle' => [
            'formatter' => Format\StringFormatter::class,
            'filter' => FILTER_SANITIZE_STRING
        ],
        'imgPath' => [
            'formatter' => Format\StringFormatter::class,
            'filter' => FILTER_SANITIZE_STRING
        ],
        'latitude' => [
            'formatter' => Format\FloatFormatter::class,
            'filter' => FILTER_SANITIZE_NUMBER_FLOAT
        ],
        'addressLine2' => [
            'formatter' => Format\StringFormatter::class,
            'filter' => FILTER_SANITIZE_STRING
        ],
        'phoneNumber' => [
            'formatter' => Format\StringFormatter::class,
            'filter' => FILTER_SANITIZE_STRING
        ],
        'addressLine1' => [
            'formatter' => Format\StringFormatter::class,
            'filter' => FILTER_SANITIZE_STRING
        ],
        // @TODO Unfortunately we dont have time to get to this just yet
        //        'additionalSubCategories' => [
        //            'formatter' => 'voArray',
        //            'class' => SubCategoryVo::class
        //        ],
        'addressLine3' => [
            'formatter' => Format\StringFormatter::class,
            'filter' => FILTER_SANITIZE_STRING
        ],
        'zip' => [
            'formatter' => Format\StringFormatter::class,
            'filter' => FILTER_SANITIZE_STRING
        ],
        'email' => [
            'formatter' => Format\StringFormatter::class,
            'filter' => FILTER_SANITIZE_EMAIL
        ],
        'categoryName' => [
            'formatter' => Format\StringFormatter::class,
            'filter' => FILTER_SANITIZE_STRING
        ],
        'region' => [
            'formatter' => Format\StringFormatter::class,
            'filter' => FILTER_SANITIZE_STRING
        ],
        'fax' => [
            'formatter' => Format\StringFormatter::class,
            'filter' => FILTER_SANITIZE_STRING
        ],
        'rankName' => [
            'formatter' => Format\StringFormatter::class,
            'filter' => FILTER_SANITIZE_STRING
        ],
        //        'accountStatus', @TODO might be an ENUM?
        // 'company', // @TODO I can't find what this needs to be mapped to
        'subCategoryId' => [
            'formatter' => Format\IntFormatter::class,
            'filter' => FILTER_SANITIZE_NUMBER_INT
        ],
        'description' => [
            'formatter' => Format\StringFormatter::class,
            'filter' => FILTER_SANITIZE_STRING
            // @TODO needs special rule for HTML text
        ],
        // @TODO Skipping this because we're not sure exactly what should happen with these yet
        //        'socialMedia' => [
        //            'formatter' => 'voArray',
        //            'class' => SocialMediaVo::class
        //        ],
        'tollFree' => [
            'formatter' => Format\StringFormatter::class,
            'filter' => FILTER_SANITIZE_STRING
        ],
        'dateCreated' => [
            'formatter' => Format\StringFormatter::class,
            'filter' => FILTER_SANITIZE_STRING
        ],
        'rankId' => [
            'formatter' => Format\IntFormatter::class,
            'filter' => FILTER_SANITIZE_NUMBER_INT
        ],
        'categoryId' => [
            'formatter' => Format\IntFormatter::class,
            'filter' => FILTER_SANITIZE_NUMBER_INT
        ],
        'alternativePhoneNumber' => [
            'formatter' => Format\StringFormatter::class,
            'filter' => FILTER_SANITIZE_STRING
        ],
        'lastUpdated' => [
            'formatter' => Format\StringFormatter::class,
            'filter' => FILTER_SANITIZE_STRING
        ],
        //        'listingKeywords', @TODO I can't find what this needs to be mapped to
        // @TODO Skipping this because the additional info array has a ton of info that we don't know what to do with,
        // @TODO so instead of going ahead and just inserting it anywhere, we're going to find out first before implementing this
        //        'additionalInformation' => [
        //            'formatter' => 'voArray',
        //            'class' => AdditionalInformationVo::class
        //        ],
        'subCategoryName' => [
            'formatter' => Format\StringFormatter::class,
            'filter' => FILTER_SANITIZE_STRING
        ],
        'accountKeywords' => [
            // @TODO I can't find what this needs to be mapped to
            'formatter' => Format\StringFormatter::class,
            'filter' => FILTER_SANITIZE_STRING
        ],
        'contactName' => [
            'formatter' => Format\StringFormatter::class,
            'filter' => FILTER_SANITIZE_STRING
        ],
        'city' => [
            'formatter' => Format\StringFormatter::class,
            'filter' => FILTER_SANITIZE_STRING
        ],
        'longitude' => [
            'formatter' => Format\FloatFormatter::class,
            'filter' => FILTER_SANITIZE_NUMBER_FLOAT
        ],
        'accountId' => [
            'formatter' => Format\IntFormatter::class,
            'filter' => FILTER_SANITIZE_NUMBER_INT
        ],
        'photoFile' => [
            'formatter' => Format\StringFormatter::class,
            'filter' => FILTER_SANITIZE_STRING
        ],
        'regionId' => [
            'formatter' => Format\IntFormatter::class,
            'filter' => FILTER_SANITIZE_NUMBER_INT
        ],
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

    /**
     * Returns the orm map
     *
     * @return array
     */
    public function getOrmMap()
    {
        return $this->ormMap;
    }

    /**
     * Returns the formatting rules map
     *
     * @return array
     */
    public function getFormatMap()
    {
        return $this->formatMap;
    }

    /**
     * Returns the validation rules map
     *
     * @return array
     */
    public function getValidationMap()
    {
        return $this->validationMap;
    }
}