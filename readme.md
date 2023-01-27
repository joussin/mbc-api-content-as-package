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
Choose version by tag:
```bash
    "require": {
        "joussin/mbc-api-content-as-package": "0.0.2"
    }
```
Or branch:
```bash
    "require": {
        "joussin/mbc-api-content-as-package": "dev-master"
    }
```

```bash
    composer update
```

After the package is installed, publish:
    - the config file
    - public api doc dir
    - views

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

```php
use Illuminate\Support\ServiceProvider;
    use MbcApiContent\src\Bootstrap;
    
    class AppServiceProvider extends ServiceProvider
    {
        public function boot(Bootstrap $bootstrapMbcApiContent)
        {
       
            $bootstrapMbcApiContent->init();

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



## Event

You can create Laravel Event with Listener event.

But if you want to use ApiContent Event who are automaticaly handle, you must implements ApiContentEventInterface.
Interface obliges you to declare and implement callback method. 
This method is called when event are dispatched and then handled.
This method allow pass args or not.
This method allow return something or not.

By default, there is only one Event which is called when Models change, and get model properties like:

$event->getModelInstance() : eloquent model instance
$event->getAction() : action name list ModelChangedEvent::MODEL_ACTIONS
$event->getModelClass() : eloquent model class name
$event->getCallbackMethodName() : le nom de la method du model sera appelé en callback de l'event 

create Event:
```php
class CustomEvent extends BaseEvent
{
    public function callback(mixed $callbackArgs = null) : mixed
    {}
}
```
or
```php
class CustomEvent implements ApiContentEventInterface
{
    use Dispatchable, InteractsWithSockets, SerializesModels;
    
    public function callback(mixed $callbackArgs = null) : mixed
    {}
}
```

Listener:
```php
MbcApiContent\src\Events\ApiContentEventListenerResolver
```        
        
Event Dispatched callback:

```php
MbcApiContent\src\Events\ApiContentEventListener::eventClosure
```

Dispatch event:
```php
event(new CustomEvent());
```


Listener init:
```php
Bootstrap->apiContentEventListener->initListener(bool $modelsObservables)
```



Model are listen ? :
```php
Bootstrap->apiContentEventListener->isModelsObservables(): bool
```

set Model listened or not  :
```php
Bootstrap->apiContentEventListener->setModelsObservables(bool $observeModel): void
```


Add other event Closure: Listener Callback
```php
/**
 * @param \Closure $eventClosure : function(ApiContentEventInterface $event){};
 * @return void
 */ 
Bootstrap->apiContentEventListener->addEventClosureToList(\Closure $eventClosure): void
```

