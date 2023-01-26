<?php

namespace MbcApiContent\Providers;

use Illuminate\Foundation\Support\Providers\EventServiceProvider as ServiceProvider;
use Illuminate\Support\Facades\Event;
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



    }
    /**
     * Register any events for your application.
     *
     * @return void
     */
    public function boot()
    {
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
