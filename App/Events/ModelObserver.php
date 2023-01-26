<?php

namespace MbcApiContent\App\Events;

use MbcApiContent\App\Models\ModelInterface;

class ModelObserver
{

    public function created(ModelInterface $model)
    {
        event(new ModelChangedEvent($model, 'created'));
    }

    
    public function updated(ModelInterface $model)
    {

        event(new ModelChangedEvent($model, 'updated'));
    }
 
    public function deleted(ModelInterface $model)
    {

        event(new ModelChangedEvent($model, 'deleted'));
    }

   
    public function restored(ModelInterface $model)
    {

        event(new ModelChangedEvent($model, 'restored'));
    }

   
    public function forceDeleted(ModelInterface $model)
    {

        event(new ModelChangedEvent($model, 'forceDeleted'));
    }
}