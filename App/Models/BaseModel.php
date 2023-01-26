<?php

namespace MbcApiContent\App\Models;

use Illuminate\Database\Eloquent\Model;

class BaseModel extends Model implements ModelInterface
{

    public function __call($method, $args)
    {
        // example :
//        $page->createdEventCallback()
//        $page->updatedEventCallback()
//        $page->deletedEventCallback()
//        $page->restoredEventCallback()
//        $page->forceDeletedEventCallback()
        dd($method, $args);

//        if(is_callable(array($this, $method))) {
//            return call_user_func_array($this->$method, $args);
//        }
//        // else throw exception
    }

}