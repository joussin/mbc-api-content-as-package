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
    }
```

```bash
    composer update
```

After the package is installed, you can optionally publish the config file, and public api doc dir

```bash
php artisan vendor:publish --provider=MainNamespace\\\Providers\\MainServiceProvider
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

#### Configuration through code

All configuration options that affect the exports contents are also exposed in the `Exporter` class. You can inject this class to modify the export settings through code.

```php
use Illuminate\Support\ServiceProvider;
    use MainNamespace\App\Facades\RouterFacade;
    
    class AppServiceProvider extends ServiceProvider
    {
        public function boot()
        {
        
            $router = RouterFacade::initCollections();

        }
    }
```


## Database

Laravel create migration:
``` bash
php artisan make:migration add_page_route_relation --table --path=./laravel-package/Database/migrations/
```

Custom create table:

``` bash
php artisan  database:make  'table_name' --create
```


Custom update table:

``` bash
php artisan  database:make  'table_name' --table
```




Migrate Tables:

Laravel:
``` bash
php artisan migrate:refresh --path=./laravel-package/Database/migrations/
php artisan migrate:refresh --path=./laravel-package/Database/migrations/2023_01_16_113911_add_page_route_relation.php
```

custom migrate all:
``` bash
php artisan database:migrate
``` 

custom migrate by filename:
``` bash
php artisan database:migrate --name=2023_01_04_213214_create_template_table.php
php artisan database:migrate --name=2023_01_04_213241_create_page_table.php
php artisan database:migrate --name=2023_01_04_213242_create_route_table.php
```

Seed Tables:

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

Laravel rollback:
``` bash
php artisan migrate:rollback

php artisan migrate:rollback --step=1

php artisan migrate:reset
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

http://127.0.0.1:8000/backoffice/wysiwyg

http://127.0.0.1:8000/backoffice/wysiwyg/inline
```








