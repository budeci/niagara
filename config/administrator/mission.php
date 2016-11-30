<?php
use App\Mission;
return [
    'title'  => 'Mission Page',
    'model'  => Mission::class,

    /*
    |-------------------------------------------------------
    | Columns/Groups
    |-------------------------------------------------------
    |
    | Describe here full list of columns that should be presented
    | on main listing page
    |
    */
    'columns' => [
        'id',
        'name',

        'image' => column_element('', true, '<img src="(:image)" width="100" />'),

    ],

    /*
    |-------------------------------------------------------
    | Actions available to do, including global
    |-------------------------------------------------------
    |
    | Global actions
    |
    */
    'actions' => [
    ],

    /*
    |-------------------------------------------------------
    | Eloquent With Section
    |-------------------------------------------------------
    |
    | Eloquent lazy data loading, just list relations that should be preloaded
    |
    */
    'with' => [],

    /*
    |-------------------------------------------------------
    | QueryBuilder
    |-------------------------------------------------------
    |
    | Extend the main scaffold index query
    |
    */

    'query' => function($query)
    {
        return $query;
    },

    /*
    |-------------------------------------------------------
    | Global filter
    |-------------------------------------------------------
    |
    | Filters should be defined here
    |
    */
    'filters' => [
        'id' => filter_hidden(),
    ],

    /*
    |-------------------------------------------------------
    | Editable area
    |-------------------------------------------------------
    |
    | Describe here all fields that should be editable
    |
    */
    'edit_fields' => [
        'id'          => ['type' => 'key'],
        'name'        => form_text() + translatable(),
        'slug'        => form_text() + translatable(),
        'body'        => form_ckeditor() + translatable(),
        'left_block'  => form_ckeditor() + translatable(),
        'right_block' => form_ckeditor() + translatable(),
        'image' => [
            'type' => 'image',
            'location' => '/upload/mission'
        ],
        'image_title' => form_text() + translatable(),
        'image_list'  => form_ckeditor() + translatable(),
        'active'        => form_boolean(),
    ]
];