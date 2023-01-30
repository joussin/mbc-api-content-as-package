<?php

namespace MbcApiContent\Models;

use Illuminate\Database\Eloquent\Model;
use MbcApiContent\Models\Factories\RouteFactory;
use MbcApiContent\Models\Page;
use Symfony\Component\HttpKernel\Exception\NotFoundHttpException;

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

    public function page(string $requestUri)
    {
        $pages = $this->pages()->getResults();

        if( count($pages->all()) == 0 )
        {
            throw new NotFoundHttpException();
        }
        elseif (count($pages->all()) == 1)
        {
            return $pages->first();
        }
        elseif (count($pages->all()) > 1)
        {
            if(true) // chack if page->uri not null
            {
                return $this->pageWithUri($pages, $requestUri);
            }
            throw new NotFoundHttpException();
        }

        throw new NotFoundHttpException();
    }


    public function pageWithUri(mixed $pages, string $uri)
    {
        $pages = $pages->filter(function($page) use($uri) {
            if($page->uri == $uri)
            {
                return true;
            }
            return false;
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

