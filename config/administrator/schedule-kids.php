<?php
use App\Schedule;
use App\Team;
use App\Day;
return [
    'title'  => 'Orar Kids',
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
        'day_id' => [
            'title' => 'Days',
            'output' => function ($row) {
                if($days = $row->days)
                    return $days->name;
                return 'no select day';
            }
        ],
        'name',
        'hour'
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
        return $query->where('type','kids')->orderBy('day_id')->orderBy('hour', 'asc');
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
        'day_id' => filter_select('Days', function () {
            return Day::select('*')
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
        'id'   => ['type' => 'key'],
        'name' => form_text() + translatable(),
        'hall' => form_text() + translatable(),
        'type' =>[
            'type' => 'hidden',
            'value' => 'kids'
        ],
        /*'image' => [
            'type' => 'image',
            'location' => '/upload/orar'
        ],*/
        'day_id' => [
            'label' => 'Day',
            'type' => 'select',
            'options' => function () {
                return Day::select('*')
                    ->get()
                    ->pluck('name', 'id');
            }
        ],
/*        'trainer_id' => [
            'label' => 'Choose Trainer',
            'type' => 'select',
            'options' => function () {
                return Team::select('*')
                    ->get()
                    ->pluck('name', 'id');
            }
        ],*/
        'hour' => form_time(),
        'body' => form_ckeditor('Description') + translatable(),
        //'body'   => form_ckeditor() + translatable(),
        'active' => form_boolean(),
    ]
];