<?php

namespace MbcApiContent\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use MbcApiContent\Models\Factories\RouteFactory;
use MbcApiContent\Models\Migrations\MigrationService;

class BaseModel extends Model implements ModelInterface
{
    use HasFactory;

    /**
     * Create a new factory instance for the model.
     *
     * @return \Illuminate\Database\Eloquent\Factories\Factory<static>
     */
    protected static function newFactory()
    {
        $parentClassName = get_called_class();
        $cleanGetCalledClass = MigrationService::cleanGetCalledClass($parentClassName);

        $factoryClass = MigrationService::getFactoriesClassName($cleanGetCalledClass);

        return $factoryClass::new();
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
