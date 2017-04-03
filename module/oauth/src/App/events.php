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

use Cradle\Module\Profile\Service as ProfileService;
use Cradle\Module\Profile\Validator as ProfileValidator;

use Cradle\Http\Request;
use Cradle\Http\Response;

use Cradle\Module\Utility\File;

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

$cradle->on('supplier', function ($request, $response) {
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
            $results = $appSql->getSupplier();
        }
    }

    //set response format
    $response->setResults($results);

});

$cradle->on('sampleretrieve', function ($request, $response) {
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
            $results = $appSql->getSampledata();
        }
    }

    //set response format
    $response->setResults($results);

});

$cradle->on('add-data', function ($request, $response) {
    //----------------------------//
    // 1. Get Data
    $data = [];
    if ($request->hasStage()) {
        $data = $request->getStage();
    }

    //----------------------------//
    // 2. Validate Data
    // $errors = AuthValidator::getCreateErrors($data);
    // $errors = ProfileValidator::getCreateErrors($data, $errors);

    // //if there are errors
    // if (!empty($errors)) {
    //     return $response
    //         ->setError(true, 'Invalid Parameters')
    //         ->set('json', 'validation', $errors);
    // }

    //----------------------------//
    // 3. Prepare Data
    //salt on password
    // $data['auth_password'] = md5($data['auth_password']);

    //deflate permissions
    // $data['auth_permissions'] = json_encode($data['auth_permissions']);

    //deactive account
    // $data['auth_active'] = 0;

    //----------------------------//
    // 4. Process Data
    //this/these will be used a lot
    $appSql = AppService::get('sql');
    // $authRedis = AuthService::get('redis');
    // $authElastic = AuthService::get('elastic');


    if (isset($data['imagepath'])) {
        //upload files
        //try cdn if enabled
        $config = $this->package('global')->service('s3-main');
        $data['imagepath'] = File::base64ToS3($data['imagepath'], $config);
        //try being old school
        $upload = $this->package('global')->path('upload');
        $data['imagepath'] = File::base64ToUpload($data['imagepath'], $upload);
    }

    //save item to database
    $results = $appSql->addData($data);

    //also create profile
    // $this->trigger('profile-create', $request, $response);

    $results = array_merge($results, $response->getResults());

    //link item to profile
    // $authSql->linkProfile($results['auth_id'], $results['profile_id']);

    //index item
    // $authElastic->create($results['auth_id']);

    //invalidate cache
    // $authRedis->removeSearch();

    //set response format
    $response->setError(false)->setResults($results);

    //send mail
    // $request->setSoftStage($response->getResults());

    //because there's no way the CLI queue would know the host
    $protocol = 'http';
    if ($request->getServer('SERVER_PORT') === 443) {
        $protocol = 'https';
    }

    $request->setStage('host', $protocol . '://' . $request->getServer('HTTP_HOST'));
    $data = $request->getStage();
});

$cradle->on('deletedata', function ($request, $response) {
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

    //save to database
    $results = $appSql->addData([
        'sampleID' => $data['id'],
        'active' => 0
    ]);

    //set response format
    $response->setResults($results);

});

$cradle->on('getdata', function ($request, $response) {
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

    //save to database
    $results = $appSql->getData($data['id']);

    //set response format
    $response->setResults($results);

});

