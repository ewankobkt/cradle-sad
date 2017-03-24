<?php //-->

/**
 * Render the Home Page
 *
 * @param Request $request
 * @param Response $response
 */
$cradle->get('/', function ($request, $response) {
    //Prepare body
    $data = [];

    //Render body
    $class = 'page-home branding';
    $title = cradle('global')->translate('Bidding');
    $body = cradle('/app/www')->template('index', $data);

    //Set Content
    $response
        ->setPage('title', $title)
        ->setPage('class', $class)
        ->setContent($body);

    //Render blank page
}, 'render-www-page');

/**
 * Render the Home Page
 *
 * @param Request $request
 * @param Response $response
 */
$cradle->get('/provinces', function ($request, $response) {
   
    cradle()->trigger('provinces', $request, $response);
    $provinces = $response->getResults();

    $response
       ->setError(false)
       ->setResults($provinces);
    //Render blank page
});
