<?php //-->

/**
 * Render the Home Page
 *
 * @param Request $request
 * @param Response $response
 */
$cradle->get('/supplier', function ($request, $response) {
    //Prepare body
    $supplier = cradle()->trigger('supplier', $request, $response);
    $data['supplier'] = $supplier->response->json["results"];
    $provinces = cradle()->trigger('provinces', $request, $response);
    $data['provinces'] = $provinces->response->json["results"];
    $cities = cradle()->trigger('cities', $request, $response);
    $data['cities'] = $cities->response->json["results"];
    // print_r($data);
// cradle()->inspect($data);
// exit;
    //Render body
    $class = 'page-auth-supplier';
    $title = cradle('global')->translate('BiddingManagementSystem');
    $body = cradle('/app/www')->template('Maintenance/supplier', $data);

    //Set Content
    $response
        ->setPage('title', $title)
        ->setPage('class', $class)
        ->setContent($body);

    //Render blank page
}, 'render-www-mainteParent');
