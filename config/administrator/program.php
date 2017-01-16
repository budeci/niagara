<?php
use App\Program;

return [
    'title'  => 'Add Program',
    'model'  => Program::class,

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
        'color' => [
            'title' => 'Color',
            'output' => function($row){
                return sprintf("<i style='background-color:%s;display: inline-block;cursor: pointer;height: 16px;vertical-align: middle;width: 16px;'></i>", $row->color);
            }
        ]
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
        'id'    => ['type' => 'key'],
        'name'  => form_text() + translatable(),
        'slug'  => form_text() + translatable(),
        'color' => form_color(),
        'body'  => form_ckeditor() + translatable(),
        /*'image'  => [
        'type'     => 'image',
        'location' => '/upload/calc',
        ],*/
        'active'   => form_boolean(),
    ]
];