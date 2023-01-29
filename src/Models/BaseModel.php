<?php

namespace MbcApiContent\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class BaseModel extends Model implements ModelInterface
{
    use HasFactory;


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
