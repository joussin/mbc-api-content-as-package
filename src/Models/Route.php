<?php

namespace MbcApiContent\Models;

use MbcApiContent\Http\Controllers\Rendering\MainController;
use MbcApiContent\Models\Factory\RouteFactory;
use MbcApiContent\Models\Interfaces\AbstractModel;

class Route  extends AbstractModel
{

    protected $table = 'route';

    protected $connection = "mysql";



    public const DEFAULT_CONTROLLER_NAME = MainController::class;

    public const DEFAULT_CONTROLLER_ACTION = "any";


    public function __construct(array $attributes = [])
    {
        parent::__construct($attributes);

        $this->method = strtoupper($this->method);


//        if (is_null($this->controller_action)) {
//            $this->controller_action = self::DEFAULT_CONTROLLER_ACTION;
//        }
//        if (is_null($this->controller_name)) {
//            $this->controller_name = self::DEFAULT_CONTROLLER_NAME;
//        }

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


    public function page() : ?Page
    {
        return $this->hasOne(Page::class)->getResults();
    }


}

