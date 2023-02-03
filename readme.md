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
    use MbcApiContent\Bootstrap;
    
    class AppServiceProvider extends ServiceProvider
    {
        public function boot(Bootstrap $bootstrap)
        {
       
            $bootstrap->init();
            
            $paths = RouterFacade::getRoutesDatasForExporter();
        
            $exporter->paths($paths);

        }
    }
```

## Facades

RouterFacade
```php
use MbcApiContent\Facades\RouterFacade;


$request = request();

$routesModelsCollection = RouterFacade::getRoutesModelCollection();
$routesLaravelCollection = RouterFacade::getRoutesLaravelCollection();
$routesFrameworkCollection = RouterFacade::getRoutesFrameworkCollection();


$laravelRoute = RouterFacade::getLaravelRoute();
$routeModel = RouterFacade::getRouteModel();
$pageModel = RouterFacade::getPageModel();

$pageContents = RouterFacade::getPageContentModels();
$pageContent = RouterFacade::getPageContentModelByName('content_no_1');
$exporterDatas = RouterFacade::getRoutesDatasForExporter();

```

## Database

migrate all:
``` bash
php artisan migrate:refresh --path=/vendor/joussin/mbc-api-content-as-package/Database/migrations/
```
migrate by filename:
``` bash
php artisan migrate:refresh --path=/vendor/joussin/mbc-api-content-as-package/Database/migrations/2023_01_04_213240_create_route_table.php
```

rollback:
``` bash
php artisan migrate:rollback
php artisan migrate:rollback --step=1
php artisan migrate:reset
```


## Liste des routes:
``` bash
php artisan route:list  
php artisan route:list --except-vendor
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
MbcApiContent\Events\ApiContentEventListenerResolver
```        
        
Event Dispatched callback:

```php
MbcApiContent\Events\ApiContentEventListener::eventClosure
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



## DOCUMENTATION



Le projet est divisé en 3 sous projets:

    - Api
    - Router
    - Backoffice





Api:

    1/ Api REST permettant la gestion de resources modélisant un site web: de son accès à son contenu:

        - Route:
            Model correspondant à une route laravel modelisé

        - Page:
            Model correspondant à un page html censé etre rendu si une Route est appelé

        - PageContent:
            Model correspondant aux différents contenus de cette page sous forme de texte brut.


    2/ L'api permet de faire un crud sur chaque resource:

            - search : GET /{resource}/search?column=name&column_value=route-name : ResourceObject|ResourceObjectCollection        
            - list : GET /{resource} : ResourceObjectCollection
            - show : GET /{resource}/{resource_id} : ResourceObject
            - create : POST /{resource} : ResourceObject
            - edit : PUT /{resource}/{resource_id} : ResourceObject
            - delete : DELETE /{resource}/{resource_id} : bool

    3/ Une fois la DB remplies:
            
            - une Collection de Route: 
                    - RouteCollection : correspondant à la liste des routes/urls du site. 
                    - Une ResourceObject Route possedant une URL et une ResourceObject Page 

            - Une Collection de Page où chaque Page est associée à une Route
                    - chaque Page repésentant la page web d'une url
                    - chaque Page posséde un template_name (modele de la page) et une Collection PageContent correspondant à l'ensemble des textes de la page

            - Une Collection PageContent associée à une Page
                    - L'idée est de générer la Page grace au template_name (forme) et à  Collection PageContent (contenu)



    4/ L'api ne représente que la modélisation et les données d'un site.
       L'idée est que un site web statique soit susceptible d'être créé via ces données.
       Un générateur de site doit être créé, il doit être capable de résoudre ces problématiques:

        - Exposer la liste RouteCollection représentant les RouteModel de la BDD
        - Recevoir des requetes et matcher via une url à quelle RouteModel cela correspond
        - Récupérer la PageModel correspondant à la RouteModel
        - Générer la page html via PageModel->template_name (présentation) et PageContent Collection (contenu)
        - Retourner une response http sous forme de html


Router:

    Le sous projet router doit répondre à la problématique précédente.

    1/ Récupérer RouteCollection et l'exposer sur le web avec laravel
        - créer des routes Laravel avec RouteModel et les ajouter au Router laravel
        - le Router laravel va se charger de matcher ces routes, à nous de relier route laravel & route model
    

    2/ relier route laravel & route model
        pour cela on ajoute un id à chaque route laravel et chaque model route lors de l'ajout au Router 

    3/ intercepter la requete associé à la route et retourner une reponse personalisé
        pour cela on a ajouté ces routes dans le router de laravel  avec un RouterMiddleware.
        RouterMiddleware : handle server request et peut retourner une response html.

    4/ générer la réponse html souhaité
        Obtenir la PageModel par relation : url -> route laravel -> RouteModel -> PageModel
        PageModel :  template_name & PageContentCollection
        générer la reponse html avec le blade template name et les PageContent:  Template ( blade template_name html ) + PageContent Collection
        retourner la response html




Backoffice:

    1/ interface graphique permettant de gérer les données des resources en BDD
    2/ plusieurs types de personnes peuvent modifier ces données
            plusieurs roles

