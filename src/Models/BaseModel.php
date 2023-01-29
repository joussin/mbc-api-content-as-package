<?php

namespace MbcApiContent\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use MbcApiContent\Models\Factories\RouteFactory;

class BaseModel extends Model implements ModelInterface
{
    use HasFactory;

    public static function get_factories_class_name(string $model, $without_namespace = true ) {
        $namespace = '\MbcApiContent\Models\Factories\\';

        return (!$without_namespace) ? $model . 'Factory' : $namespace . $model . 'Factory';

    }

    public static function get_model_class_name( $without_namespace = true ) {
        $class = get_called_class();
        if ( $without_namespace ) {
            $class = explode( '\\', $class );
            end( $class );
            $last  = key( $class );
            $class = $class[ $last ];
        }
        return $class;
    }


    /**
     * Create a new factory instance for the model.
     *
     * @return \Illuminate\Database\Eloquent\Factories\Factory<static>
     */
    protected static function newFactory()
    {
        $model = self::get_model_class_name();

        $factoryClassLong = self::get_factories_class_name($model);

        return $factoryClassLong::new();
    }


    public function createdEventCallback() : mixed
    {
        return null;
    }
    public function updatedEventCallback() : mixed
    {
        return null;
    }
    public function deletedEventCallback() : mixed
    {
        return null;
    }
    public function restoredEventCallback() : mixed
    {
        return null;
    }
    public function forceDeletedEventCallback(): mixed
    {
        return null;
    }

//    public function __call($method, $args)
//    {
//        if(is_callable(array($this, $method))) {
//            return call_user_func_array($this->$method, $args);
//        }
//        // else throw exception
//    }


}
