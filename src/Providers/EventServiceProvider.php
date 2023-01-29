<?php

namespace MbcApiContent\Providers;

use Illuminate\Foundation\Support\Providers\EventServiceProvider as ServiceProvider;


use Illuminate\Database\Events\MigrationsEnded;
use Illuminate\Support\Facades\Event;
use MbcApiContent\Models\Migrations\MigrationService;

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

            try{
                MigrationService::seedAll();
            }
            catch (\Exception $e)
            {
                throw new \Exception('Error seeding ' . $e->getMessage());
            }

        });

    }

}
