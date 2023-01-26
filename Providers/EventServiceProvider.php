<?php

namespace MbcApiContent\Providers;

use Illuminate\Foundation\Support\Providers\EventServiceProvider as ServiceProvider;
use Illuminate\Support\Facades\Event;
use MbcApiContent\App\Events\ApiContentEvent;
use MbcApiContent\App\Events\ApiContentEventInterface;
use MbcApiContent\App\Events\ApiContentEventListenerResolver;
use MbcApiContent\App\Events\ModelObserver;
use MbcApiContent\App\Models\Page;
use MbcApiContent\App\Models\Route;
use MbcApiContent\App\Models\Template;

class EventServiceProvider extends ServiceProvider
{


    public function register()
    {

        $this->app->singleton(ApiContentEventListenerResolver::class);

    }
    /**
     * Register any events for your application.
     *
     * @return void
     */
    public function boot(ApiContentEventListenerResolver $apiContentEventListenerResolver)
    {

//        Event::listen(function (ApiContentEvent $event) use($apiContentEventListenerResolver) {
//            //
//            $apiContentEventListenerResolver->getClosureEvent($event);
//        });

        Event::listen(function (ApiContentEventInterface $event)  use($apiContentEventListenerResolver) {
            //
            $apiContentEventListenerResolver->getClosureEvent()($event);
        });

        Page::observe(ModelObserver::class);
        Route::observe(ModelObserver::class);
        Template::observe(ModelObserver::class);

    }

    /**
     * Determine if events and listeners should be automatically discovered.
     *
     * @return bool
     */
    public function shouldDiscoverEvents()
    {
        return true;
    }

    protected function discoverEventsWithin()
    {
        return [
            $this->app->path('Listeners'),
        ];
    }

}
