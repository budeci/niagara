<?php
use App\Menu;

return [
    'title'  => 'Item Menu',
    'model'  => \App\MenuItem::class,

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
        'menu_item_id' => [
            'title' => 'Menu name',
            'output' => function ($row) {
                if($menu = $row->menu)
                    return $menu->name;

                return 'no menu';
            }
        ],
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
        'menu_id' => [
            'label' => 'Menu name',
            'type' => 'select',
            'options' => function() {
                $options = [];
                Menu::get()
                    ->each(function ($menu) use (&$options){
                        $options[$menu->id] = $menu->name;
                    });

                return ['' => '-- Any --'] + ($options);
            },
            'multiple' => false
        ]
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

        'menu_id' => [
            'label' => 'Menu name',
            'type'    => 'select',
            'options' => function() {
                $options = [];
                Menu::get()
                    ->each(function ($menu) use (&$options){
                        $options[$menu->id] = $menu->name;
                    });

                return $options;
            }
        ],
        'url'     => form_text() + translatable(),
        'new_tab' => form_boolean(),
    ]
];