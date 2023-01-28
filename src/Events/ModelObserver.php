<?php

namespace MbcApiContent\Events;

use MbcApiContent\Models\ModelInterface;

class ModelObserver
{

    public function created(ModelInterface $model)
    {
        event(new ModelChangedEvent($model, ModelChangedEvent::MODEL_CREATED));
    }

    
    public function updated(ModelInterface $model)
    {

        event(new ModelChangedEvent($model, ModelChangedEvent::MODEL_UPDATED));
    }
 
    public function deleted(ModelInterface $model)
    {

        event(new ModelChangedEvent($model, ModelChangedEvent::MODEL_DELETED));
    }

   
    public function restored(ModelInterface $model)
    {

        event(new ModelChangedEvent($model, ModelChangedEvent::MODEL_RESTORED));
    }

   
    public function forceDeleted(ModelInterface $model)
    {

        event(new ModelChangedEvent($model, ModelChangedEvent::MODEL_FORCE_DELETED));
    }
}