# Mbc api content

[//]: # ([![Latest Version on Packagist]&#40;https://img.shields.io/packagist/v/spatie/laravel-export.svg?style=flat-square&#41;]&#40;https://packagist.org/packages/spatie/laravel-export&#41;)

[//]: # ([![Total Downloads]&#40;https://img.shields.io/packagist/dt/spatie/laravel-export.svg?style=flat-square&#41;]&#40;https://packagist.org/packages/spatie/laravel-export&#41;)



Build Api content with backoffice


## Installation

You can install the package via composer:

```bash
"repositories": [
    
        {
        "type": "vcs",
        "url": "https://github.com/joussin/mbc-api-content-as-package.git"
        }
    
    ]
```
```bash
    "require": {
        "joussin/mbc-api-content-as-package": "0.0.2"
        "joussin/mbc-api-content-as-package": "dev-master"
        "joussin/mbc-api-content-as-package": "dev-develop"
    }
```

```bash
    composer update
```

After the package is installed, you can optionally publish the config file, and public api doc dir

```bash
php artisan vendor:publish --provider=MbcApiContent\\\Providers\\MainServiceProvider
```

## Configuration

Secrets DB conf.

```php
// .env

DB_CONNECTION=mysql
DB_DATABASE=cms_headless
DB_HOST=192.168.0.21
DB_PORT=3094
DB_USERNAME=root
DB_PASSWORD=
```

#### Boot app

Boot app : migrate db before

[//]: # (```php)

[//]: # (use Illuminate\Support\ServiceProvider;)

[//]: # (    use MbcApiContent\App\Facades\RouterFacade;)

[//]: # (    )
[//]: # (    class AppServiceProvider extends ServiceProvider)

[//]: # (    {)

[//]: # (        public function boot&#40;&#41;)

[//]: # (        {)

[//]: # (        )
[//]: # (            $router = RouterFacade::initCollections&#40;&#41;;)

[//]: # ()
[//]: # (        })

[//]: # (    })

[//]: # (```)


```php
use Illuminate\Support\ServiceProvider;
    use MbcApiContent\App\Bootstrap;
    
    class AppServiceProvider extends ServiceProvider
    {
        public function boot(Bootstrap $bootstrapMbcApiContent)
        {
        
            $bootstrapMbcApiContent->initRouter();

        }
    }
```

## Database

migrate all:
``` bash
php artisan migrate:refresh --path=/vendor/joussin/mbc-api-content-as-package/Database/migrations/
```
migrate by filename:
``` bash
php artisan migrate:refresh --path=/vendor/joussin/mbc-api-content-as-package/Database/migrations/2023_01_04_213214_create_template_table.php
php artisan migrate:refresh --path=/vendor/joussin/mbc-api-content-as-package/Database/migrations/2023_01_04_213240_create_route_table.php
php artisan migrate:refresh --path=/vendor/joussin/mbc-api-content-as-package/Database/migrations/2023_01_04_213241_create_page_table.php
```

Custom seed all tables:
``` bash 
php artisan database:seeder
```
Custom seed tables by filename:
``` bash
php artisan database:seeder --seeder=PageSeeder
php artisan database:seeder --seeder=TemplateSeeder
php artisan database:seeder --seeder=RouteSeeder
```


## Test

Launch server
``` bash
php artisan serve --port=8000
```

SWAGGER
``` bash
http://127.0.0.1:8000/docs/api/index.html
```

BACKOFFICE
``` bash
http://127.0.0.1:8000/backoffice
```


