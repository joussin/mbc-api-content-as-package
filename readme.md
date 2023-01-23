
GENERATE STATIC : 

https://github.com/spatie/laravel-export

https://github.com/topics/laravel-admin-panel

"spatie/laravel-export": "^0.3.10",
"spatie/regex": "^3.1"


installer le projet:

    readme_install.md


liste des routes:

php artisan route:list --except-vendor




------------------------------------------------------------------------

server:


    php artisan serve


    SWAGGER
    
        http://127.0.0.1:8000/docs/api/index.html
    
    
    BACKOFFICE

        http://127.0.0.1:8000/backoffice
        
        http://127.0.0.1:8000/backoffice/wysiwyg
        
        http://127.0.0.1:8000/backoffice/wysiwyg/inline


------------------------------------------------------------------------

package composer:

dans le composer.json du projet:

    "repositories": [
        {
            "type": "vcs",
            "url": "https://github.com/joussin/laravel-package.git"
        }
    ],
    
        "require": {
            ...
            "joussin/laravel-package": "*"
        },
   
        "require": {
            ...
            "joussin/laravel-package": "dev-main"
        },

    

dans le composer.json du package:


    {
        "name": "joussin/mbc-api-content",
        "type": "package",
        "require": {
            "php": "^8.0.2"
        },
        "autoload": {
            "psr-4": {
                "MainNamespace\\": "./"
            }
        },
    
        "description": "base laravel project",
        "license": "proprietary",
        "authors": [
            {
                "name": "Joussin Stéphane",
                "email": "joussin@live.com"
            }
        ],
        "minimum-stability": "dev"
    }





 
