<?php

namespace MbcApiContent\Models\Collections;

use Illuminate\Database\Eloquent\Collection;

class PageContentModelCollection extends Collection implements PageContentModelCollectionInterface
{


    public function getByName($name)
    {
        dd($name);
    }
}