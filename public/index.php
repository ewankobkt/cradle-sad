<?php //-->

include(__DIR__.'/../bootstrap.php');
use Cradle\Framework\Flow;

return cradle()
    ->register('/app/admin')
    ->register('/app/api')
    ->register('/app/www')
    ->render();

return cradle()
    //add routes here
    ->get('/sample/create', 'Captcha Page')
    ->post('/sample/create', 'Captcha Process')

    //add flows here
    //renders a table display
    ->flow('Captcha Page',
        Flow::captcha()->load,
        Flow::captcha()->render,
        'TODO: form page'
    )
    ->flow('Captcha Process',
        Flow::captcha()->check,
        array(
            Flow::captcha()->yes,
            'TODO: process'
        ),
        array(
            Flow::captcha()->no,
            'TODO: deny'
        )
    );
