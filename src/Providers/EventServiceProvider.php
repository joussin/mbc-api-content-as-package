<?php

namespace MbcApiContent\Providers;

use Illuminate\Foundation\Support\Providers\EventServiceProvider as ServiceProvider;


use Illuminate\Database\Events\MigrationsEnded;
use Illuminate\Support\Facades\Event;

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
        Event::listen(MigrationsEnded::class, function (MigrationsEnded $event) {

            dump('You can set your logic here');


        });

    }

}
