<?php

namespace MbcApiContent\Models\Migrations;

use MbcApiContent\Models\Page;
use MbcApiContent\Models\Route;

class MigrationService
{


    public function seedAll()
    {

        $routes = [];

        $routes[] = $this->seed(Route::class, 3, true, []);

        $routes[] = $this->seed(Route::class, null, true, [
            'name' => 'route-dyn-departement-nbdept',
            'uri' => '/doc/departement/{id}',
            'static_uri' => '/doc-departement-78/index.html'
        ]);



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
