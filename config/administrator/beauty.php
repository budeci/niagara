<?php
use App\Beauty;
use App\BeautyCategory;

return [
    'title'  => 'Beauty Post',
    'model'  => Beauty::class,

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
        'category_id' => [
            'type'=> 'select',
            'options' => function () {
                return BeautyCategory::select('*')
                    ->get()
                    ->pluck('name', 'id');
            }
        ],
        'image' => [
            'type' => 'image',
            'location' => '/upload/beauty/',
        ],
        'annotation'   => form_text() + translatable(),
        'body'          => form_ckeditor() + translatable(),
        'active'        => form_boolean(),
    ]
];