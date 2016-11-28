<?php
use App\Calc;
use App\CategoryCalc;

return [
    'title'  => 'Add food',
    'model'  => Calc::class,

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
        'weight',
        'calories',

        'category_calc_id' => [
            'title' => 'Category',
            'output' => function ($row) {
                if($category = $row->categoryCalc)
                    return $category->name;

                return 'no category';
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
        'id' => filter_hidden(),
        'category_calc_id' => filter_select('Belongs to', function () {
            return CategoryCalc::select('*')
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
        'id'       => ['type' => 'key'],
        'name'     => form_text() + translatable(),
        'category_calc_id' => [
            'label' => 'Choose category',
            'type' => 'select',
            'options' => function () {
                return CategoryCalc::select('*')
                    ->get()
                    ->pluck('name', 'id');
            }
        ],
        'weight'   => form_text(),        
        'calories' => form_text(),
        /*'image' => [
            'type' => 'image',
            'location' => '/upload/calc',
        ],*/
        'active'        => form_boolean(),
    ]
];