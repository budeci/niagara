<?php
use App\Press;

return [
    'title'  => 'Create News',
    'model'  => Press::class,

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
        'body'=> [
            'output'=> function($row){
                return sprintf('%s ...', substr($row->body, 0, 275));
            }
        ],
        'active',
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
          'category_id' => [
               'required',
               'label' => 'Choose category',
               'type' => 'select',
                  'options' =>[
                      ''=>'Choose category',
                      '1'=>'Press Releases',
                      '2'=>'Press about us',
                  ],
          ],
        'name'        => form_text() + translatable(),
        'slug'        => form_text() + translatable(),
        'body'   => form_ckeditor() + translatable(),
        'active' => form_boolean(),
    ]
];