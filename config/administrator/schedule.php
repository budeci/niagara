<?php
use App\Schedule;
use App\Team;
return [
    'title'  => 'Add Orar',
    'model'  => Schedule::class,

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
        'hour',
/*        'belongs' => [
            'title' => 'Belongs to',
            'output' => function($row) {
                return sprintf('<a href="/admin/categoriesEvent?id=%s">%s</a>', $row->categoryEvent->id, $row->categoryEvent->name);
            }
        ],*/
        //'image' => column_element('', true, '<img src="(:image)" width="100" />'),

        /*'day' => [
            'title' => 'Day',
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
        'hall' => form_text() + translatable(),
        'type' =>[
            'type' => 'hidden',
            'value' => 'adult'
        ],
        /*'image' => [
            'type' => 'image',
            'location' => '/upload/orar'
        ],*/
        'day' => [
            'label' => 'Day',
            'type' => 'select',
            'options' => [1=>'Luni',2=>'Marți',3=>'Mercuri',4=>'Joi',5=>'Vineri',6=>'Sâmbătă',7=>'Duminică']
        ],
        'trainer_id' => [
            'label' => 'Choose Trainer',
            'type' => 'select',
            'options' => function () {
                return Team::select('*')
                    ->get()
                    ->pluck('name', 'id');
            }
        ],
        'hour' => form_time(),
        //'body'   => form_ckeditor() + translatable(),
        'active' => form_boolean(),
    ]
];