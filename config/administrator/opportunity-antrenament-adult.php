<?php
use App\OpportunityAntrenament;

return [
    'title'  => 'Create Opportunity Adult',
    'model'  => OpportunityAntrenament::class,

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
        'image' => column_element('', true, '<img src="(:image1)" width="100" />'),

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
        return $query->whereCategoryType('adult');
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
        'id'   => ['type' => 'key'],
        'name' => form_text() + translatable(),
        'slug' => form_text() + translatable(),
        'category_type' =>[
            'type' => 'hidden',
            'value' => 'adult'
        ],
        'image1' => [
            'type' => 'image',
            'location' => '/upload/adult',
        ],
        'annotation1'   => form_text() + translatable(),

        'image2' => [
            'type' => 'image',
            'location' => '/upload/adult',
        ],
        'annotation2'   => form_text() + translatable(),

        'image3' => [
            'type' => 'image',
            'location' => '/upload/adult',
        ],
        'annotation3'   => form_text() + translatable(),

        'body'          => form_ckeditor() + translatable(),
        'opportunities' => form_boolean(),
        'active'        => form_boolean(),
    ]
];