<?php
use Illuminate\Database\Eloquent\Builder;
return [
    'title'  => 'Add Video',
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
        'link' => [
            'title' => 'Video',
            'output' => function ($row){
                return sprintf('<iframe width="300" height="200" src="%s" frameborder="0" allowfullscreen></iframe>', $row->link);
            }
        ]
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
         return $query->whereType('video')->orderBy('id', 'desc');
    },

    /*
    |-------------------------------------------------------
    | Global filter
    |-------------------------------------------------------
    */
    'filters' => [
        'id' => filter_hidden()
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
        'type' =>[
            'type' => 'hidden',
            'value' => 'video'
        ],
        'image' => [
            'type' => 'image',
            'location' => '/upload/slides',
//            'sizes' => [
//                'big'     => '1024x1024',
//            ]
        ],
        'link' => form_text('Video link'),
        'active' => form_boolean(),
    ]
];