<?php

namespace MbcApiContent\Models\Migrations;

use Illuminate\Support\Facades\DB;
use MbcApiContent\Models\BaseModel;
use MbcApiContent\Models\Page;
use MbcApiContent\Models\Route;

class MigrationService
{


    public function __construct()
    {
    }

    public static function get_factories_class_name(string $model, $without_namespace = true ) {
        $namespace = '\MbcApiContent\Models\Factories\\';
        $model = ucfirst( $model );
        return (!$without_namespace) ? $model . 'Factory' : $namespace . $model . 'Factory';
    }

    public static function get_model_class_name( string $class, $without_namespace = true ) {
//        $class = get_called_class();
        if ( $without_namespace ) {
            $class = explode( '\\', $class );
            end( $class );
            $last  = key( $class );
            $class = $class[ $last ];
        }
        return $class;
    }


    public static function getDefaults(string $modelName): ?array
    {
        $factoryClass = self::get_factories_class_name($modelName);

        return $factoryClass::DEFAULTS;
    }



    public function seedAll($create = true)
    {

        $data = [
            'name'            => 'route-nb-1',
            'uri'             => '/',
            'static_uri'      => '/',
            'static_doc_name' => 'index.html',
        ];


        $route = $this->create(Route::class, $data);



        $data = [
            'name'            => 'page-nb-1',
            'route_id' => 1,
        ];

        $page = $this->create(Page::class, $data);

    }


    public function create(string $modelClassName, array $data = []) : mixed
    {
        $modelInstance = $modelClassName::factory()->create($data);

        return $modelInstance;
    }

    public function make(string $modelClassName, array $data = []) : mixed
    {
        $modelInstance = $modelClassName::factory()->make($data);

        return $modelInstance;
    }

}
