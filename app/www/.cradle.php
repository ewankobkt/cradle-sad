<?php //-->
/**
 * This file is part of a Custom Project.
 * (c) 2017-2019 Acme Inc.
 *
 * Copyright and license information can be found at LICENSE.txt
 * distributed with this package.
 */

//include the other routes
include_once __DIR__ . '/src/controller/auth.php';

//sample
include_once __DIR__ . '/src/controller/sample.php';
// include_once __DIR__ . '/src/controller/sampleCreate.php';
// include_once __DIR__ . '/src/controller/addData.php';

//for bidding system
include_once __DIR__ . '/src/controller/static.php';
//include_once __DIR__ . '/src/controller/index.php';
include_once __DIR__ . '/src/controller/register.php';
include_once __DIR__ . '/src/controller/supplier.php';

//include globals, events, methods
include_once __DIR__ . '/src/package/methods.php';
include_once __DIR__ . '/src/package/events.php';
include_once __DIR__ . '/src/package/globals.php';

