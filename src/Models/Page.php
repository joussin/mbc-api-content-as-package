<?php

namespace MbcApiContent\Models;


use Illuminate\Database\Eloquent\Collection;
use MbcApiContent\Models\Factory\PageFactory;
use MbcApiContent\Models\Interfaces\AbstractModel;


class Page  extends AbstractModel
{

    protected $table = 'page';

    protected $connection = "mysql";

    protected $fillable = [
        "version",
        "name",
        "template_name",
        "route_id"
    ];

    protected $casts = [
    ];



    protected static function newFactory()
    {
        return PageFactory::new();
    }


    public function pageContents() : ?Collection
    {
        return $this->hasMany(PageContent::class)->getResults();
    }



    public function route()
    {
        return $this->belongsTo(Route::class, 'route_id', 'id')->getResults();
    }
}
