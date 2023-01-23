<?php

namespace MainNamespace\App\Services;

use MainNamespace\App\Models\Page;
use MainNamespace\App\Models\Route;
use MainNamespace\App\Models\Template;

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





    public function postTemplate(array $attributes) : array
    {
        $template = new Template();
        $template->fill($attributes);
        $template->save();
        return $template->toArray();
    }

    public function getAllTemplate() : array
    {

        $templates = Template::all();

        $templatesArray = [];

        foreach ($templates as $template)
        {
            $templatesArray[] = $template->toArray();
        }

        return $templatesArray;
    }

    public function getTemplate(int $id) : array
    {
        $template = Template::where('id', $id)->first();

        return $template->toArray();
    }

    public function updateTemplate(int $id, array $attributes) : array
    {
        $template = Template::where('id', $id)->first();
        $template->fill($attributes);
        $template->save();
        return $template->toArray();
    }

}
