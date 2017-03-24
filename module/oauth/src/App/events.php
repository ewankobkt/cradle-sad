<?php //-->
/**
 * This file is part of a Custom Project.
 * (c) 2017-2019 Acme Inc.
 *
 * Copyright and license information can be found at LICENSE.txt
 * distributed with this package.
 */

use Cradle\Module\Oauth\App\Service as AppService;
use Cradle\Module\Oauth\App\Validator as AppValidator;

$cradle->on('provinces', function ($request, $response) {
    //----------------------------//
    // 1. Get Data
    $data = [];
    if ($request->hasStage()) {
        $data = $request->getStage();
    }

    //----------------------------//
    // 2. Validate Data
    //no validation needed
    //----------------------------//
    // 3. Prepare Data
    //no preparation needed
    //----------------------------//
    // 4. Process Data
    //this/these will be used a lot
    $results = "";
    $appSql = AppService::get('sql');

    //if no results
    if (!$results) {

        //if no results
        if (!$results) {
            //get it from database
            $results = $appSql->getProvinces();
        }
    }

    //set response format
    $response->setResults($results);

});

$cradle->on('cities', function ($request, $response) {
    //----------------------------//
    // 1. Get Data
    $data = [];
    if ($request->hasStage()) {
        $data = $request->getStage();
    }

    //----------------------------//
    // 2. Validate Data
    //no validation needed
    //----------------------------//
    // 3. Prepare Data
    //no preparation needed
    //----------------------------//
    // 4. Process Data
    //this/these will be used a lot
    $results = "";
    $appSql = AppService::get('sql');

    //if no results
    if (!$results) {

        //if no results
        if (!$results) {
            //get it from database
            $results = $appSql->getCities();
        }
    }

    //set response format
    $response->setResults($results);

});

$cradle->on('accounttypes', function ($request, $response) {
    //----------------------------//
    // 1. Get Data
    $data = [];
    if ($request->hasStage()) {
        $data = $request->getStage();
    }

    //----------------------------//
    // 2. Validate Data
    //no validation needed
    //----------------------------//
    // 3. Prepare Data
    //no preparation needed
    //----------------------------//
    // 4. Process Data
    //this/these will be used a lot
    $results = "";
    $appSql = AppService::get('sql');

    //if no results
    if (!$results) {

        //if no results
        if (!$results) {
            //get it from database
            $results = $appSql->getAccountTypes();
        }
    }

    //set response format
    $response->setResults($results);

});