<?php

namespace MbcApiContent\Models;


use Illuminate\Support\Facades\Log;
use MbcApiContent\Models\Factories\PageFactory;
use MbcApiContent\Models\Route;


class Page  extends BaseModel
{

    protected $table = 'page';

    protected $connection = "mysql";

    protected $fillable = [
        "version",
        "name",
        "route_id",
        "uri"
    ];

    protected $casts = [
        'path_parameters' => 'array',
    ];



    protected static function newFactory()
    {
        return PageFactory::new();
    }



//    public function pageContents()
//    {
//        return $this->hasMany(PageContent::class);
//    }




    // doc
    public function route()
    {
        return $this->belongsTo(Route::class, 'route_id', 'id');
    }



    public function updatedEventCallback() : bool
    {
        return true;
    }

}
