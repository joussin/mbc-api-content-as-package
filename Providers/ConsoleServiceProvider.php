<?php

namespace MainNamespace\Providers;

use MainNamespace\Console\Commands\CommandSeeder;

use Illuminate\Support\ServiceProvider;


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
        $this->commands([
            CommandSeeder::class
        ]);

    }


}
