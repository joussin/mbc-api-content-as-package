<?php

namespace MbcApiContent\App\Models;


use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Log;
use MbcApiContent\App\Models\Route;


class Page  extends Model
{

    protected $table = 'page';

    protected $connection = "mysql";

    protected $fillable = [
        "version",
        "name",
        "template_id",
        "template_input_data",
        "route_id"
    ];

    protected $casts = [
        'template_input_data' => 'array',
    ];


    // doc
    public function route()
    {
        return $this->belongsTo(Route::class, 'route_id', 'id');
    }

    // doc
    public function template()
    {
        return $this->belongsTo(Template::class, 'template_id', 'id');
    }
}
