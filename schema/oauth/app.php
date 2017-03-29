<?php //-->
return [
    'singular' => 'sample',
    'plural' => 'samples',
    'primary' => 'sampleID',
    'active' => 'active',
    'created' => 'sample_created',
    'updated' => 'sample_updated',
    'fields' => [
        'sampleName' => [
            'sql' => [
                'type' => 'varchar',
                'length' => 255,
                'required' => true,
                'index' => true
            ],
            'elastic' => [
                'type' => 'string'
            ],
            'form' => [
                'label' => 'Name',
                'type' => 'text',
                'attributes' => [
                    'placeholder' => 'Name',
                ]
            ],
            'validation' => [
                [
                    'method' => 'required',
                    'message' => 'Name is required'
                ]
            ],
            'list' => [
                'label' => 'Name'
            ],
            'detail' => [
                'label' => 'Name'
            ],
            'test' => [
                'pass' => 'Foobar Title',
                'fail' => ''
            ]
        ]
    ],
    'fixtures' => [
        [
            'sampleID' => 1,
            'sampleName' => 'Angelo',
            'app_created' => date('Y-m-d h:i:s'),
            'app_updated' => date('Y-m-d h:i:s')
        ]
    ]
];
