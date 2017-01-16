<?php
use App\Schedule;
use App\Team;
use App\Day;
use App\Program;
return [
    'title'  => 'Orar Adult',
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
        return $query->where('type','adult')->orderBy('day_id')->orderBy('hour', 'asc');
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
            'value' => 'adult'
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
        /*'program' => [
            'label' => 'Choose Program',
            'type' => 'select',
            'multiple' => true,
            'options' => function () {
                return Program::select('*')
                    ->get()
                    ->pluck('name', 'id');
            }
        ],*/

        'program' => form_select('Choose Program', function (){
            $items = [];
            $program = Program::select('*')->active()->get();
            foreach ($program as $item) {
                $items[$item->id] = $item->name;
            }
            return $items;
        },['multiple' => true]),

        'hour' => form_time(),
        'body'   => form_ckeditor('Description') + translatable(),
        'active' => form_boolean(),
    ]
];