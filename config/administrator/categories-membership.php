<?php
use App\CategoryMembership;
return [
    'title'  => 'Categories Carduri',
    'model'  => CategoryMembership::class,

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
        'ico' => column_element('', true, '<img src="(:ico)" />'),
    ],

    /*
    |-------------------------------------------------------
    | Actions available to do, including global
    |-------------------------------------------------------
    |
    | Global actions
    | @todo
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
    /*'query' => function(Builder $query)
    {
        $query->where('role_id', '!=', Role::whereName('admin')->first()->id);
    },*/
    'query' => function($query)
    {
        return $query->orderBy('id', 'desc');
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
        'id'        => ['type' => 'key'],
        'name'      => form_text() + translatable(),
        'available' => form_text() + translatable(),
        'image' => [
            'type' => 'image',
            'location' => '/upload/membership',
//            'sizes' => [
//                'big'     => '1024x1024',
//            ]
        ],
        'ico' => [
            'type' => 'image',
            'location' => '/upload/ico',
//            'sizes' => [
//                'big'     => '1024x1024',
//            ]
        ],
        'description' => form_ckeditor() + translatable(),
        'active'        => form_boolean(),
    ]
];