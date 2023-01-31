<?php

namespace MbcApiContent\Models;

use MbcApiContent\Models\Factories\RouteFactory;

class Route  extends BaseModel
{

    protected $table = 'route';

    protected $connection = "mysql";

    protected $fillable = [
        "method",
        "protocol",
        "name",
        "uri",
        "controller_name",
        "controller_action",
        "path_parameters",
        "query_parameters",
        "static_doc_name",
        "static_uri",
        "domain",
        "rewrite_rule",
        "status",
        "active_start_at",
        "active_end_at"
    ];

    protected $casts = [
        'path_parameters' => 'array',
        'query_parameters' => 'array',
    ];


    protected static function newFactory()
    {
        return RouteFactory::new();
    }


    public function page()
    {
        return $this->hasOne(Page::class)->getResults();
    }



    public function index(){
        $route = Route::with('page')->get();
    }
}

