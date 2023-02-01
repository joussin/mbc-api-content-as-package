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

    // to test : $routeModel = RouterFacade::getRouteModel()->extractPathParameters()
    //         $pattern = '/route/dynamic/{id}/{dept}/{name}';
    // $pattern = '\/route\/dynamic\/(?P<id>\d+)';
//         $uri = '/route/dynamic/7/88/eure';
    public function extractPathParameters() : ?array
    {
        $pattern = $this->pattern;
        $uri = $this->uri;

        if(is_null($pattern))
            return null;

        $pattern = str_replace('/', '\/', $pattern);
        $pattern = str_replace('{', '(?P<', $pattern);
        $pattern = str_replace('}', '>\w+)', $pattern);

        $regex = '/^'.$pattern.'$/';

        preg_match_all($regex,$uri,$matches);

        return $matches;
    }

}

