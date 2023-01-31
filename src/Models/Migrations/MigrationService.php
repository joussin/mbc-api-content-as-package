<?php

namespace MbcApiContent\Models\Migrations;

use Illuminate\Support\Str;
use MbcApiContent\Models\Factories\PageFactory;
use MbcApiContent\Models\Page;
use MbcApiContent\Models\PageContent;
use MbcApiContent\Models\Route;

class MigrationService
{

    public function seedAll()
    {
        return [
            $routes = $this->createRoutes(),
            $pages = $this->createPages(),
            $pageContents = $this->createPageContents(),
        ];
    }

    public function createRoutes()
    {
        $routes = Route::factory(3)->create([]);
        return $routes;
    }


    public function createPages()
    {
        $pages = Page::factory(3)->create([]);

        $definitions = PageFactory::getDynamicDefinitions();

        $page = Page::factory()->create($definitions);

        $pages[] = $page;

        return $pages;
    }

    public function createPageContents()
    {
        $pageContents = PageContent::factory(1)->create();
        return $pageContents;
    }


}
