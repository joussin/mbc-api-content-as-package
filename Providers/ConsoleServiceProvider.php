<?php

namespace MainNamespace\Providers;

use MainNamespace\Console\Commands\CommandComposer;
use MainNamespace\Console\Commands\CommandMakeMigration;
use MainNamespace\Console\Commands\CommandMigrate;
use MainNamespace\Console\Commands\CommandSeeder;

use Illuminate\Support\ServiceProvider;
use MainNamespace\Console\Commands\MbcRouteListCommand;
use MainNamespace\Console\Commands\RouteListCommand;

class ConsoleServiceProvider extends ServiceProvider
{

    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
       // $this->loadMigrationsFrom(__DIR__.'/../../Database/migrations');

        $this->commands([
            CommandSeeder::class,
            CommandMigrate::class,
            CommandMakeMigration::class,
            CommandComposer::class,
            MbcRouteListCommand::class
        ]);

    }


}
