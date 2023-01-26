<?php

namespace MbcApiContent\App\Events;

use MbcApiContent\App\Models\ModelInterface;

class ModelObserver
{

    public function created(ModelInterface $model)
    {
        event(new ApiContentModelEvent($model, 'created'));
    }

    
    public function updated(ModelInterface $model)
    {

        event(new ApiContentModelEvent($model, 'updated'));
    }
 
    public function deleted(ModelInterface $model)
    {

        event(new ApiContentModelEvent($model, 'deleted'));
    }

   
    public function restored(ModelInterface $model)
    {

        event(new ApiContentModelEvent($model, 'restored'));
    }

   
    public function forceDeleted(ModelInterface $model)
    {

        event(new ApiContentModelEvent($model, 'forceDeleted'));
    }
}