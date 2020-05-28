<?php

namespace Simpleview\Api;

/**
 * Api constants
 *
 * Class containing constants for the api package
 *
 * @category Simpleview
 * @package  Api
 *
 * @author   Jed Diaz
 * @since    02 August 2018
 */
class ApiConstants
{
    /**
     * Constant for config section
     *
     * @var string
     */
    const CONFIG_SECTION_SIMPLEVIEW = 'Simpleview';

    /**
     * Constant for config variable
     *
     * @var string
     */
    const CONFIG_KEY_URL = 'api_url';

    /**
     * Constant for config variable
     *
     * @var string
     */
    const CONFIG_KEY_USERNAME = 'api_user_name';

    /**
     * Constant for config variable
     *
     * @var string
     */
    const CONFIG_KEY_PASSWORD = 'api_user_password';

    /**
     * Constant for POST http method
     *
     * @var string
     */
    const HTTP_METHOD_POST = 'POST';

    /**
     * Simpleview api endpoint name for getting a list of listings
     *
     * @var string
     */
    const SIMPLEVIEW_ENDPOINT_GETLISTINGS = 'GETLISTINGS';

    /**
     * Constant for http request param
     *
     * @var string
     */
    const API_CONSTANT_USERNAME = 'USERNAME';

    /**
     * Constant for http request param
     *
     * @var string
     */
    const API_CONST_PASSWORD = 'PASSWORD';

    /**
     * Constant for http request param
     *
     * @var string
     */
    const API_CONSTANT_ACTION = 'ACTION';

    /**
     * Constant for http request param
     *
     * @var string
     */
    const API_CONSTANT_PAGESIZE = 'PAGESIZE';

    /**
     * Constant for http request param
     *
     * @var string
     */
    const API_CONSTANT_PAGENUM = 'PAGENUM';
}