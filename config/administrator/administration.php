<?php
use App\Team;
return [
    'title'  => 'Add administration',
    'model'  => Team::class,

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
        'job',
/*        'belongs' => [
            'title' => 'Belongs to',
            'output' => function($row) {
                return sprintf('<a href="/admin/categoriesEvent?id=%s">%s</a>', $row->categoryEvent->id, $row->categoryEvent->name);
            }
        ],*/
        'image' => column_element('', true, '<img src="(:image)" width="100" />'),

/*        'user_id' => [
            'title' => 'Participant',
            'output' => function ($row) {
                if($user = $row->user)
                    return $user->name;

                return 'no user';
            }
        ]*/
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
        return $query->where('type','administration');
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
        'job'  => form_text() + translatable(),
        'type' =>[
            'type' => 'hidden',
            'value' => 'administration'
        ],
        'image' => [
            'type' => 'image',
            'location' => '/',
//            'sizes' => [
//                'big'     => '1024x1024',
//            ]
        ],
        'body'   => form_ckeditor() + translatable(),
        //'director' => form_boolean(),
        'active' => form_boolean(),
    ]
];