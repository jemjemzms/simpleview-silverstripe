<?php

namespace Simpleview\Api;

class ListingApi extends AbstractRequest
{
    public function getList($pagesize = 25, $pagenum = 1)
    {
        $action = ApiConstants::SIMPLEVIEW_ENDPOINT_GETLISTINGS;
        $options = [
            ApiConstants::API_CONSTANT_PAGESIZE => $pagesize,
            ApiConstants::API_CONSTANT_PAGENUM => $pagenum
        ];
        return $this->makeRequest($action, $options);
    }
}