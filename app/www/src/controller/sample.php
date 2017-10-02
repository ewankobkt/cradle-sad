<?php //-->

/**
 * Render the Home Page
 *
 * @param Request $request
 * @param Response $response
 */

use Cradle\Module\Profile\Service as ProfileService;
use Cradle\Module\Profile\Validator as ProfileValidator;

use Cradle\Http\Request;
use Cradle\Http\Response;

use Cradle\Module\Utility\File;


$cradle->get('/sample', function ($request, $response) {
    //Prepare body
    $client = Elasticsearch\ClientBuilder::create()->build();

    $query = $client->search([
        'body' => [
            'query' => [
                'match_all' =>[]
            ]
        ]
    ]);

    $results = $query['hits']['hits'];
    $data['sample'] = [];
    foreach ($results as $key => $result) {
        $data['sample'][$key] = array(
            'id' => $result['_id'],
            'sampleName' => $result['_source']['sampleName']
        );
    }

    //Render body
    $class = 'page-auth-register';
    $title = cradle('global')->translate('Sampol');

    if ($data) {
        $body = cradle('/app/www')->template('sample', $data);
    } else {
        $body = cradle('/app/www')->template('sample');
    }

    //Set Content
    $response
        ->setPage('title', $title)
        ->setPage('class', $class)
        ->setContent($body);

    //Render blank page
}, 'render-www-blank');

$cradle->get('/sample/create', function ($request, $response) {
    //Prepare body
    $data = ['item' => $request->getPost()];

    //add CDN
    $config = $this->package('global')->service('s3-main');
    $data['cdn_config'] = File::getS3Client($config);

    //add CSRF
    cradle()->trigger('csrf-load', $request, $response);
    $data['csrf'] = $response->getResults('csrf');

    //add captcha
    cradle()->trigger('captcha-load', $request, $response);
    $data['captcha'] = $response->getResults('captcha');

    if ($response->isError()) {

        $response->setFlash($response->getMessage(), 'danger');
        $data['errors'] = $response->getValidation();
    }

    $class = 'page-auth-register';
    $title = cradle('global')->translate('Sampol');
    $body = cradle('/app/www')->template('sampleCreate', $data);

    //Set Content
    $response
        ->setPage('title', $title)
        ->setPage('class', $class)
        ->setContent($body);
}, 'render-www-blank');

$cradle->post('/sample/create', function ($request, $response) {

    $data = ['item' => $request->getPost()];
    $client = Elasticsearch\ClientBuilder::create()->build();

    if ($data['item']['sampleName']) {
        if (isset($data['item']['sampleID'])) {
            $index = $client->index([
                'index' => 'samples',
                'type' => 'sample',
                'id' => $data['item']['sampleID'],
                'body' => [
                    'sampleName' => $data['item']['sampleName']
                ]
            ]);
        } else {
            $index = $client->index([
                'index' => 'samples',
                'type' => 'sample',
                'body' => [
                    'sampleName' => $data['item']['sampleName']
                ]
            ]);
        }
    }


    // redirect
    $query = http_build_query($request->get('get'));
    cradle('global')->redirect('/sample');
}, 'render-www-blank');

$cradle->post('/sample/update', function ($request, $response) {
    
    //csrf check
    $data = $request->getPost();
    cradle()->trigger('csrf-validate', $request, $response);

    //add CDN
    $config = $this->package('global')->service('s3-main');
    $data['cdn_config'] = File::getS3Client($config);

    //add CSRF
    cradle()->trigger('csrf-load', $request, $response);
    $data['csrf'] = $response->getResults('csrf');

    $data['item']['sampleName'] = $data['name'];
    $data['item']['id'] = $data['id'];

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
}, 'render-www-blank');

$cradle->post('/sample/delete', function ($request, $response) {

    $client = Elasticsearch\ClientBuilder::create()->build();
    
    //csrf check
    $data = ['item' => $request->getPost()];

    $index = $client->delete([
        'index' => 'samples',
        'type' => 'sample',
        'id' => $data['item']['id']
    ]);

    //add a flash
    cradle('global')->flash('Delete complete!', 'success');

    //redirect
    $query = http_build_query($request->get('get'));
    cradle('global')->redirect('/sample');
}, 'render-www-blank');
