<?php

namespace MbcApiContent\Models\Migrations;

use MbcApiContent\Models\Page;
use MbcApiContent\Models\Route;

class MigrationService
{


    public function seedAll()
    {
        $routes = $this->seed(Route::class, 10, true, []);
//        $page = $this->seed(Page::class, 1, true, []);

        return [
            $routes,
//            $page
        ];
    }


    public function seed(string $model, ?int $count = null, bool $create = false, array $data = [])
    {
        $action = $create ? 'create' : 'make';
        $count = ($count==1) ? null : $count;

        return $model::factory($count)->$action($data);
    }


}
