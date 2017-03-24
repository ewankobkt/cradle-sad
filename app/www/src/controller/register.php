<?php //-->

/**
 * Render the Home Page
 *
 * @param Request $request
 * @param Response $response
 */
$cradle->get('/register', function ($request, $response) {
    //Prepare body
    $provinces = cradle()->trigger('provinces', $request, $response);
    $data['provinces'] = $provinces->response->json["results"];
    $cities = cradle()->trigger('cities', $request, $response);
    $data['cities'] = $cities->response->json["results"];
    $accounttypes = cradle()->trigger('accounttypes', $request, $response);
    $data['accounttypes'] = $accounttypes->response->json["results"];
    // print_r($data);
// cradle()->inspect($data);
// exit;
    //Render body
    $class = 'page-auth-register';
    $title = cradle('global')->translate('Bidding');
    $body = cradle('/app/www')->template('register', $data);

    //Set Content
    $response
        ->setPage('title', $title)
        ->setPage('class', $class)
        ->setContent($body);

    //Render blank page
}, 'render-www-blank');
