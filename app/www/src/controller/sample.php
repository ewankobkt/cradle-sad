<?php //-->

/**
 * Render the Home Page
 *
 * @param Request $request
 * @param Response $response
 */

function hexrgb ($hexstr)
    {
      $int = hexdec($hexstr);

      return array("red" => 0xFF & ($int >> 0x10),
                   "green" => 0xFF & ($int >> 0x8),
                   "blue" => 0xFF & $int);
    }

$cradle->get('/sample', function ($request, $response) {
    //Prepare body
    $provinces = cradle()->trigger('sampleretrieve', $request, $response);
    $data['sample'] = $provinces->response->json["results"];;
// exit;
    //Render body
    $class = 'page-auth-register';
    $title = cradle('global')->translate('Sampol');
    $body = cradle('/app/www')->template('sample', $data);

    //Set Content
    $response
        ->setPage('title', $title)
        ->setPage('class', $class)
        ->setContent($body);

    //Render blank page
}, 'render-www-blank');

$cradle->get('/sample/create', function ($request, $response) {
    // die("asd");
    //csrf check
    $data = ['item' => $request->getPost()];// print_r($data);
    cradle()->trigger('csrf-validate', $request, $response);

    if ($response->isError()) {
        return cradle()->triggerRoute('get', '/sample/create', $request, $response);
    }

    if ($response->isError()) {
        return cradle()->triggerRoute('get', '/sample/create', $request, $response);
    }

    //trigger the job
    cradle()->trigger('addData', $request, $response);

    // if ($response->isError()) {
    //     return cradle()->triggerRoute('get', '/sample/create', $request, $response);
    // }

    //it was good
    //add a flash
    // cradle('global')->flash('Success!', 'success');

    $class = 'page-auth-register';
    $title = cradle('global')->translate('Sampol');
    $body = cradle('/app/www')->template('sampleCreate', $data);

    //Set Content
    $response
        ->setPage('title', $title)
        ->setPage('class', $class)
        ->setContent($body);
    // //redirect
    // $query = http_build_query($request->get('get'));
    // cradle('global')->redirect('/sample');
}, 'render-www-blank');

$cradle->post('/sample/create', function ($request, $response) {
    // die("asd");

    //trigger the job
    cradle()->trigger('add-data', $request, $response);

    // if ($response->isError()) {
    //     return cradle()->triggerRoute('get', '/sample/create', $request, $response);
    // }

    // it was good
    // add a flash
    // cradle('global')->flash('Success!', 'success');
    // redirect
    $query = http_build_query($request->get('get'));
    cradle('global')->redirect('/sample');
}, 'render-www-blank');

$cradle->post('/sample/update', function ($request, $response) {
    // die("asd");
    //csrf check
    $data = $request->getPost(); //print_r($data);
    cradle()->trigger('csrf-validate', $request, $response);

    if ($response->isError()) {
        return cradle()->triggerRoute('get', '/sample/update', $request, $response);
    }

    if ($response->isError()) {
        return cradle()->triggerRoute('get', '/sample/create', $request, $response);
    }

    //trigger the job
    // cradle()->trigger('addData', $request, $response);

    // if ($response->isError()) {
    //     return cradle()->triggerRoute('get', '/sample/create', $request, $response);
    // }

    //it was good
    //add a flash
    cradle('global')->flash('Success!', 'success');

    $class = 'page-auth-register';
    $title = cradle('global')->translate('Sampol');
    $body = cradle('/app/www')->template('sampleUpdate', $data);

    //Set Content
    $response
        ->setPage('title', $title)
        ->setPage('class', $class)
        ->setContent($body);
    // //redirect
    // $query = http_build_query($request->get('get'));
    // cradle('global')->redirect('/sample');
}, 'render-www-blank');

$cradle->post('/sample/delete', function ($request, $response) {
    // die("asd");
    //csrf check
    $data = ['item' => $request->getPost()];// print_r($data);

    //trigger the job
    cradle()->trigger('deletedata', $request, $response);

    // if ($response->isError()) {
    //     return cradle()->triggerRoute('get', '/sample/create', $request, $response);
    // }

    //it was good
    //add a flash
    // cradle('global')->flash('Success!', 'success');

    //redirect
    $query = http_build_query($request->get('get'));
    cradle('global')->redirect('/sample');
}, 'render-www-blank');
