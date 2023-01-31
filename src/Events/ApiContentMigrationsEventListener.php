<?php

namespace MbcApiContent\Events;

use Illuminate\Database\Events\MigrationsEnded;
use Illuminate\Support\Facades\Event;
use MbcApiContent\Models\Services\MigrationService;

class ApiContentMigrationsEventListener
{

    protected $migrationService;

    public function __construct(MigrationService $migrationService)
    {
        $this->migrationService = $migrationService;
    }


    public function initListener(): void
    {
        Event::listen(MigrationsEnded::class, function (MigrationsEnded $event) {

            try{
                $this->migrationService->seed();
            }
            catch (\Exception $e)
            {
                throw new \Exception('Error seeding ' . $e->getMessage());
            }

        });
    }
}