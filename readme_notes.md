 

// https://laravel.com/docs/9.x/packages

         //https://laravel.com/docs/9.x/eloquent-resources




GENERATE STATIC : 

https://github.com/spatie/laravel-export

https://github.com/topics/laravel-admin-panel

"spatie/laravel-export": "^0.3.10",
"spatie/regex": "^3.1"


installer le projet:

    readme_install.md


liste des routes:

php artisan route:list  
php artisan route:list --except-vendor





------------------------------------------------------------------------


composer.json:

"scripts": {
"test": "vendor/bin/phpunit",
"test-coverage": "vendor/bin/phpunit --coverage-html coverage"
}







    public const UNIQUES = [
        // unique
        // unique
        'unique'   => [
            ['version', 'id'],
            ['version', 'name'],
        ],
    ];

    public const FOREIGNS = [

        'foreign' => [
            [
                'name' => 'page_route_id_foreign',
                'column' => 'route_id',
                'relation_table' => 'route',
                'relation_column' => 'id',
                'type' => 'manyToOne' // many page to one route
            ]
        ]
    ];





    public const UNIQUES = [
        // unique
        'unique'            => [
            ['id', 'name'],
            ['id', 'method', 'uri'],
            ['id', 'method', 'static_uri'],
            ['id', 'method', 'static_doc_name']
        ]
    ];

    public const FOREIGNS = [

        'foreign' => []

    ];