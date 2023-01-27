<?php

namespace MbcApiContent\App\Services;

use MbcApiContent\App\Models\Page;
use MbcApiContent\App\Models\Route;

class ApiService implements ApiServiceInterface
{

    public function postRoute(array $attributes) : array
    {
        $route = new Route();
        $route->fill($attributes);
        $route->save();
        return $route->toArray();
    }

    public function getAllRoute() : array
    {
        $routes = Route::all();

        $routesArray = [];

        foreach ($routes as $route)
        {
            $routesArray[] = $route->toArray();
        }

        return $routesArray;
    }

    public function getRoute(int $id) : array
    {
        $route = Route::where("id", $id)->first();

        return $route->toArray();
    }

    public function updateRoute(int $id, array $attributes) : array
    {
        $route = Route::where('id', $id)->first();
        $route->fill($attributes);
        $route->save();
        return $route->toArray();
    }




    public function postPage(array $attributes) : array
    {
        $page = new Page();
        $page->fill($attributes);
        $page->save();
        return $page->toArray();
    }

    public function getAllPage() : array
    {
        $pages = Page::all();

        $pagesArray = [];

        foreach ($pages as $page)
        {
            $pagesArray[] = $page->toArray();
        }

        return $pagesArray;
    }

    public function getPage(int $id) : array
    {
        $page = Page::where("id", $id)->first();

        return $page->toArray();
    }

    public function updatePage(int $id, array $attributes) : array
    {
        $page = Page::where('id', $id)->first();
        $page->fill($attributes);
        $page->save();
        return $page->toArray();
    }
}
