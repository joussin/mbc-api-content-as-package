<?php

namespace MbcApiContent\Models\Migrations;

use MbcApiContent\Models\Page;
use MbcApiContent\Models\Route;

class MigrationService
{


    public function seedAll($create = false)
    {

//        $nb = fake()->numberBetween(1, 9);
//
//        $data = [
//            'name'            => 'route-name-' . $nb,
//            'uri'             => '/route-' . $nb,
//            'static_uri'      => '/route-'.$nb.'/index.html',
//            'static_doc_name' => 'index.html',
//        ];

        $route = $this->seed(Route::class, [], $create);


//
//        $data = [
//            'name'            => 'page-nb-1',
//            'route_id' => 1,
//        ];


        $page = $this->seed(Page::class, [], $create);


        return [$route, $page];
    }


    public  function seed($model, $data, $create = false)
    {
        $action = $create ? 'create' : 'make';

        return $model::factory()->create();
        return $model::factory()->$action();
    }



}
