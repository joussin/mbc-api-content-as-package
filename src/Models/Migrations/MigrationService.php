<?php

namespace MbcApiContent\Models\Migrations;

use Illuminate\Support\Facades\DB;
use MbcApiContent\Models\BaseModel;
use MbcApiContent\Models\Page;
use MbcApiContent\Models\Route;

class MigrationService
{

    public const FACTORIES_NAMESPACE = '\MbcApiContent\Models\Factories\\';
    public const MODELS_NAMESPACE = '\MbcApiContent\Models\\';

    public function __construct()
    {
    }

    public static function getFactoriesClassName(string $modelClassName, $withNamespace = true ) {
        $modelClassName = ucfirst( $modelClassName );
        return ($withNamespace) ? self::FACTORIES_NAMESPACE .$modelClassName . 'Factory' :  $modelClassName . 'Factory';
    }

    public static function getModelClassName(string $modelClassName, $withNamespace = false ) {
        $modelClassName = ucfirst( $modelClassName );
        return ($withNamespace) ? self::MODELS_NAMESPACE .  $modelClassName  : $modelClassName ;
    }

    // pass get_called_class()
    public static function cleanGetCalledClass($class) {
//        $class = get_called_class();
        $class = explode( '\\', $class );
        end( $class );
        $last  = key( $class );
        $class = $class[ $last ];

        return $class;
    }


    public static function getDefaults(string $modelName): ?array
    {
        $factoryClass = self::getFactoriesClassName($modelName);

        return $factoryClass::DEFAULTS;
    }



    public static function seedAll($create = true)
    {

        $nb = fake()->numberBetween(1, 9);

        $data = [
            'name'            => 'route-name-' . $nb,
            'uri'             => '/route-' . $nb,
            'static_uri'      => '/route-'.$nb.'/index.html',
            'static_doc_name' => 'index.html',
        ];


        $route = self::make(Route::class, $data);



//        $data = [
//            'name'            => 'page-nb-1',
//            'route_id' => 1,
//        ];
//
//        $page = $this->make(Page::class, $data);


        return $route;
    }


    public static function create(string $modelClassName, array $data = []) : mixed
    {
        $modelInstance = $modelClassName::factory()->create($data);

        return $modelInstance;
    }

    public static function make(string $modelClassName, array $data = []) : mixed
    {
        $modelInstance = $modelClassName::factory()->make($data);

        return $modelInstance;
    }

}
