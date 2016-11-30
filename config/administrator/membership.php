<?php
use App\Membership;
use App\CategoryMembership;

return [
    'title'  => 'Add Card',
    'model'  => Membership::class,

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
        'ico' => column_element('', true, '<img src="(:ico)" />'),
        'category_membership_id' => [
            'title' => 'Category',
            'output' => function ($row) {
                if($category = $row->categoryMembership)
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
        'category_membership_id' => filter_select('Belongs to', function () {
            return CategoryMembership::select('*')
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
        'category_membership_id' => [
            'label' => 'Choose category',
            'type' => 'select',
            'options' => function () {
                return CategoryMembership::select('*')
                    ->get()
                    ->pluck('name', 'id');
            }
        ],
        'body' => form_ckeditor() + translatable(),
        'ico' => [
            'type' => 'image',
            'location' => '/upload/ico',
//            'sizes' => [
//                'big'     => '1024x1024',
//            ]
        ],

        'active'        => form_boolean(),
    ]
];