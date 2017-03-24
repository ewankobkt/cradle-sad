<?php //-->

/**
 * Render the Home Page
 *
 * @param Request $request
 * @param Response $response
 */
$cradle->get('/register', function ($request, $response) {
    //Prepare body
    $data = ['provinces' => [
        'ProvinceID' => 2,
        'ProvinceName' => 'sdfsdf'
    ],
    [
        'ProvinceID' => 3,
        'ProvinceName' => 'foo'
    ],];
cradle()->inspect($data);
    //Render body
    $class = 'page-home branding';
    $title = cradle('global')->translate('Bidding');
    $body = cradle('/app/www')->template('register', $data);

    //Set Content
    $response
        ->setPage('title', $title)
        ->setPage('class', $class)
        ->setContent($body);

    //Render blank page
}, 'render-www-page');
