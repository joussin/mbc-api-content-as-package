<?php

namespace MbcApiContent\Models\Migrations;

use Illuminate\Support\Facades\DB;

class MigrationService
{




    public function __construct()
    {
    }


    public static function getDefaults($modelName): array
    {
        $modelName = ucfirst( $modelName );

        $mynamespace = __NAMESPACE__;

        dd(
            $modelName,
            $mynamespace
        );


//        return BaseModel::;
    }



    public function seedAll($create = true)
    {
        $this->seedRoute($create);
        $this->seedPage($create);

    }

    /**
     * @param $create
     * @return \Illuminate\Database\Eloquent\Collection|\Illuminate\Database\Eloquent\Model|mixed
     */
    public function seedRoute($create = true) : mixed
    {
        $data = [
            'name'            => 'route-nb-1',
            'uri'             => '/',
            'static_uri'      => '/',
            'static_doc_name' => 'index.html',
        ];


        if($create)
        {
            $route = \MbcApiContent\Models\Route::factory()->create($data);
        } else {
            $route = \MbcApiContent\Models\Route::factory()->make($data);
        }

        return $route;
    }


 /**
     * @param $create
     * @return \Illuminate\Database\Eloquent\Collection|\Illuminate\Database\Eloquent\Model|mixed
     */
    public function seedPage($create = true) : mixed
    {
        $data = [
            'name'            => 'page-nb-1',
            'route_id' => 1,
        ];


        if($create)
        {
            $page = \MbcApiContent\Models\Page::factory()->create($data);
        } else {
            $page = \MbcApiContent\Models\Page::factory()->make($data);
        }

        return $page;
    }


}
