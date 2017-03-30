<?php //-->

return [
    'sql-build' => [
        'host' => '127.0.0.1',
        'user' => 'root',
        'pass' => ''
    ],
    'sql-main' => [
        'host' => '127.0.0.1',
        'name' => 'sadfinal',
        'user' => 'root',
        'pass' => ''
    ],
    'elastic-main' => [
        '<ELASTIC HOST:PORT>'
    ],
    'redis-main' => [
        'scheme' => 'tcp',
        'host' => '127.0.0.1',
        'port' => 6379
    ],
    'rabbitmq-main' => [
        'host' => '127.0.0.1',
        'port' => 5672,
        'user' => '<RABBIT USER>',
        'pass' => '<RABBIT PASS>'
    ],
    's3-main' => [
        'region' => '<AWS REGION>',
        'token' => '<AWS TOKEN>',
        'secret' => '<AWS SECRET>',
        'bucket' => '<S3 BUCKET>',
        'host' => 'https://<AWS REGION>.amazonaws.com'
    ],
    'mail-main' => [
        'host' => 'smtp.gmail.com',
        'port' => '587',
        'type' => 'tls',
        'name' => 'Project Name',
        'user' => '<EMAIL ADDRESS>',
        'pass' => '<EMAIL PASSWORD>'
    ],
    'captcha-main' => [
        'token' => '6LeA5hoUAAAAABKgZHosq_ixsVlEsR40VDbiYqWf',
        'secret' => '6LeA5hoUAAAAAFMrD-fJKNmyLR4XmBs-9hpEqiRj'
    ]
];
