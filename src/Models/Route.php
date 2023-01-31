<?php

namespace MbcApiContent\Models;

use MbcApiContent\Http\Controllers\Rendering\MainController;
use MbcApiContent\Models\Factories\RouteFactory;

class Route  extends BaseModel
{

    protected $table = 'route';

    protected $connection = "mysql";


    public const DEFAULT_NAMESPACE = "MbcApiContent\Http\Controllers\Rendering\\";

    public const CONTROLLER_NAME = MainController::class;


    public function __construct(array $attributes = [])
    {
        parent::__construct($attributes);

        if (is_null($this->controller_name)) {
            $this->controller_name = self::DEFAULT_NAMESPACE . self::CONTROLLER_NAME;
        }
        else if (!\str_contains($this->controller_name, '\\')){
             {
                 $this->controller_name = self::DEFAULT_NAMESPACE . $this->controller_name;
            }
        }

        $this->method = strtoupper($this->method);
    }

    protected $fillable = [
        "method",
        "protocol",
        "name",
        "uri",
        "pattern",
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

