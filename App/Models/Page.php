<?php

namespace MbcApiContent\App\Models;


use Illuminate\Support\Facades\Log;
use MbcApiContent\App\Models\Route;


class Page  extends BaseModel
{

    protected $table = 'page';

    protected $connection = "mysql";

    protected $fillable = [
        "version",
        "name",
        "route_id"
    ];



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
