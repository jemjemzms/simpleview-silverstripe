<?php

namespace Simpleview\Api;

use RestfulService;

/**
 * Abstract request
 *
 * Class containing methods that enable us to make calls to the simpleview api
 *
 * @category Simpleview
 * @package  Api
 *
 * @author   Jed Diaz
 * @since    02 August 2018
 */
class AbstractRequest
{
    /**
     * Generic method for making requests to the simpleview api
     *
     * @param string $action - string specifying which simpleview endpoint to call
     * @param array $extras - (optional) contains array of extra params for api call
     *
     * @return \SimpleXMLElement
     */
    public function makeRequest($action, $extras = null) {
        $url = \Config::inst()->get(ApiConstants::CONFIG_SECTION_SIMPLEVIEW, ApiConstants::CONFIG_KEY_URL);
        $username = \Config::inst()->get(ApiConstants::CONFIG_SECTION_SIMPLEVIEW, ApiConstants::CONFIG_KEY_USERNAME);
        $password = \Config::inst()->get(ApiConstants::CONFIG_SECTION_SIMPLEVIEW, ApiConstants::CONFIG_KEY_PASSWORD);
        $subUrl = '';
        $options = [
            ApiConstants::API_CONSTANT_USERNAME => $username,
            ApiConstants::API_CONST_PASSWORD => $password,
            ApiConstants::API_CONSTANT_ACTION => $action,
        ];
        if (!empty($extras)) {
            $options = array_merge($options, $extras);
        }
        $request = new RestfulService($url);
        $response = $request->request($subUrl, ApiConstants::HTTP_METHOD_POST, $options);
        $xml = new \SimpleXMLElement($response->getBody());
        return $xml;
    }
}