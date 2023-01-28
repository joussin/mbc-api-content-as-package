<?php

namespace MbcApiContent\Models;


use Illuminate\Support\Facades\Log;
use MbcApiContent\Models\Route;


class Page  extends BaseModel
{

    protected $table = 'page';

    protected $connection = "mysql";

    protected $fillable = [
        "version",
        "name",
        "route_id",
        "path_parameters"
    ];

    protected $casts = [
        'path_parameters' => 'array',
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
