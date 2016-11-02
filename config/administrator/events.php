<?php
use App\Event;
use App\CategoryEvent;
return [
    'title'  => 'Create Event',
    'model'  => Event::class,

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
        'category_event_id' => filter_select('Belongs to', function () {
            return CategoryEvent::select('*')
                ->get()
                ->pluck('name', 'id')
                ->prepend('-- Any --', '');
        }),
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
        'category_event_id' => [
            'label' => 'Choose category',
            'type' => 'select',
            'options' => function () {
                return CategoryEvent::select('*')
                    ->get()
                    ->pluck('name', 'id');
            }
        ],
        'image' => [
            'type' => 'image',
            'location' => '/',
//            'sizes' => [
//                'big'     => '1024x1024',
//            ]
        ],
        'body'   => form_ckeditor() + translatable(),
        'public_date'   => form_date(),
        'expire_date'   => form_date(),
        'active' => form_boolean(),
    ]
];