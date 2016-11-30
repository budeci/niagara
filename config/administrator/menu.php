<?php

/**
 * The menu structure of the site. For models, you should either supply the name of a model config file or an array of names of model config
 * files. The same applies to settings config files, except you must prepend 'settings.' to the settings config file name. You can also add
 * custom pages by prepending a view path with 'page.'. By providing an array of names, you can group certain models or settings pages
 * together. Each name needs to either have a config file in your model config path, settings config path with the same name, or a path to a
 * fully-qualified Laravel view. So 'users' would require a 'users.php' file in your model config path, 'settings.site' would require a
 * 'site.php' file in your settings config path, and 'page.foo.test' would require a 'test.php' or 'test.blade.php' file in a 'foo' directory
 * inside your view directory.
 *
 * @type array
 *
 * 	array(
 *		'E-Commerce' => array('collections', 'products', 'product_images', 'orders'),
 *		'homepage_sliders',
 *		'users',
 *		'roles',
 *		'colors',
 *		'Settings' => array('settings.site', 'settings.ecommerce', 'settings.social'),
 * 		'Analytics' => array('E-Commerce' => 'page.ecommerce.analytics'),
 *	)
 */
return [
//     'App' => [
//          'page_header' => 'Some Title' // work only for parent category
//          'dashboard' => [
//          'icon'  => 'fa-dashboard',
//          'route' => 'admin_dashboard',
//          ]
//     ]
  /* 'Roles' => [
        'page_header' => 'not working',
       'icon' => 'fa fa-circle-o',
        'pages' => [
            'admins' => [
                'icon' => 'fa fa-user'
            ],
            'members' => [
                'icon' => 'fa fa-users'
            ]
        ]
    ],*/
/*    'Content' => [
        'page_header' => 'main content site',
//        'icon' => 'fa fa-circle-o',
        'pages' => [
            'pages' => [
                'icon' => 'fa fa-file-text-o'
            ]
        ]
    ]*/

    'Pages' => [
        'icon' => 'fa fa-file-text-o',
        'pages'=> [
            'mission' => [
                'icon' => 'fa fa-circle-o'
            ],
            'faq' => [
                'icon' => 'fa fa-circle-o'
            ],
            'pages' => [
                'icon' => 'fa fa-file-text-o'
            ],

            'advertisement' => [
                'icon' => 'fa fa-file-text-o'
            ],

            'vacancy' => [
                'icon' => 'fa fa-file-text-o'
            ],

            'offert' => [
                'icon' => 'fa fa-file-text-o'
            ],

            'lifestyle' => [
                'icon' => 'fa fa-file-text-o'
            ],
            'opportunities' => [
                'icon' => 'fa fa-file-text-o'
            ],
            'team' => [
                'icon' => 'fa fa-file-text-o'
            ],
            'partner' => [
                'icon' => 'fa fa-file-text-o'
            ],
            'slides' => [
                'icon' => 'fa fa-file-text-o'
            ],
        ],

    ],


    'Presa' => [
      'icon' => 'fa fa-file-text-o',
        'pages' => [
            'press' => [
              'icon' => 'fa fa-circle-o'
            ]
        ]
    ],

    'Event' => [
        'icon' => 'fa fa-calendar-o',
        'pages' => [
            'categories-event' => [
                'icon' => 'fa fa-circle-o'
            ],
            'events' => [
                'icon' => 'fa fa-circle-o'
            ]
        ]
    ],
    'Antrenament' => [
        'icon' => 'fa-futbol-o',
        'pages' => [
            'categories-antrenament' => [
                'icon' => 'fa fa-circle-o'
            ],
            'antrenament-adult' => [
                'icon' => 'fa fa-circle-o'
            ],
            'opportunity-antrenament-adult' => [
                'icon' => 'fa fa-circle-o'
            ],
            'antrenament-kids' => [
                'icon' => 'fa fa-circle-o'
            ],
            'opportunity-antrenament-kids' => [
                'icon' => 'fa fa-circle-o'
            ]
        ]
    ],
    
    'News' => [
        'icon' => 'fa fa-newspaper-o',
        'pages' => [
            'categories-news' => [
                'icon' => 'fa fa-circle-o'
            ],
            'post' => [
                'icon' => 'fa fa-circle-o'
            ]
        ]
    ],
    'Beauty & Spa' => [
        'icon' => 'fa fa-diamond',
        'pages' => [
            'beautycategory' => [
                'icon' => 'fa fa-circle-o'
            ],
            'beauty' => [
                'icon' => 'fa fa-circle-o'
            ],
            'beautyslide' => [
                'icon' => 'fa fa-circle-o'
            ],
        ]
    ],
    'Calc' => [
        'icon' => 'fa fa-calculator',
        'pages' => [
            'categories-food' => [
                'icon' => 'fa fa-circle-o'
            ],
            'food' => [
                'icon' => 'fa fa-circle-o'
            ],
            'result-calories' => [
                'icon' => 'fa fa-circle-o'
            ]
        ]
    ],

  /*  'Menu' => [
        'icon' => 'fa fa-bars',
        'pages' => [
            'create-menu' => [
                'icon' => 'fa fa-circle-o'
            ],
            'menu-item' => [
                'icon' => 'fa fa-circle-o'
            ]
        ]
    ],*/
    'General settings' => [
        'icon' => 'fa fa-gears',
        'pages' => [
            'metas' => [
                'icon' => 'fa fa-globe'
            ]
        ]
    ],
];
