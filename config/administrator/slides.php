<?php
use Illuminate\Database\Eloquent\Builder;
return [
    'title'  => 'Add home slide',
    'model'  => \App\Slides::class,

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
        'image' => column_element('', true, '<img src="(:image)" width="100"/>'),
        'type',
    ],

    /*
    |-------------------------------------------------------
    | Actions available to do, including global
    |-------------------------------------------------------
    |
    | Global actions
    |
    */
    'actions' => [],

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
    'query' => function(Builder $query)
    {
         return $query->orderBy('id', 'desc');
    },

    /*
    |-------------------------------------------------------
    | Global filter
    |-------------------------------------------------------
    */
    'filters' => [
        'id' => filter_hidden(),
        'type' => [
            'label' => 'Page slider',
            'type' => 'select',
            'options' => ['home'=>'Home','membership'=>'Membership','membership'=>'Membership','beautyspa'=>'Beauty Spa']
        ],
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
        'id'       => ['type' => 'key'],
        'name' => form_text() + translatable(),
        'type' => [
            'label' => 'Page slider',
            'type' => 'select',
            'options' => ['home'=>'Home','membership'=>'Membership','membership'=>'Membership','beautyspa'=>'Beauty Spa','video'=>'Home Video']
        ],
        'link' => form_text(),
        'image' => [
            'type' => 'image',
            'location' => '/upload/slides',
//            'sizes' => [
//                'big'     => '1024x1024',
//            ]
        ],
        'label_photo' => form_textarea() + translatable(),
        'active' => form_boolean(),
    ]
];