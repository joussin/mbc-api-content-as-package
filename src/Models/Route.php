<?php

namespace MbcApiContent\Models;

use Illuminate\Database\Eloquent\Model;
use MbcApiContent\Models\Factories\RouteFactory;
use MbcApiContent\Models\Page;


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


    // $laravelRouteParameters = ['id'=> 1]
    public function pageWith(array $laravelRouteParameters = [])
    {
        $pages = $this->pages()->getResults();

        $pages = $pages->filter(function($page) use($laravelRouteParameters) {

            $isThatPage = true;

            // to check
//            $this->path_parameters
//                // to check in
//            $page->path_parameters
//            // with
//                $laravelRouteParameters

                    foreach($this->path_parameters as $parameter)
                    {
                        if(
                            !isset($page->path_parameters[$parameter]) ||
                            !isset($laravelRouteParameters[$parameter]) ||
                            !($page->path_parameters[$parameter] == $laravelRouteParameters[$parameter])
                        )
                        {
                            $isThatPage = false;
                        }
                    }

            return $isThatPage;
        });

        return $pages->first();
    }


    public function pages()
    {
        return $this->hasMany(Page::class);
    }

    public function index(){
        $route = Route::with('page')->get();
    }
}

