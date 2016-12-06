<?php

return [
    'title' => 'Site',

    'model' => 'Keyhunter\Administrator\Model\Settings',

    'rules' => [
        'admin::email'   => 'required|email',
        'support::email' => 'required|email'
    ],

    'edit_fields' => [

        'site::name'    => ['type' => 'text'],

        'admin::email' => ['type' => 'email'],

        'support::email' => ['type' => 'email'],

        'site::phone'    => ['type' => 'text'],

        'map::gps'    => ['type' => 'text'],

        'site::about' => ['type' => 'textarea'],

        'site::logo' => [
            'type' => 'image',
            'location' => '/upload/settings',
//            'sizes' => [
//                'big'     => '1024x1024',
//            ]
        ],

//        'site::roles' => [
//            'type'    => 'select',
//            'options' => ['guest', 'member', 'admin', 'content manager']
//        ],

        'site::down' => [
            'type' => 'select',
            'options' => [
                1 => 'enable',
                0 => 'disable'
            ]
        ]
    ]
];