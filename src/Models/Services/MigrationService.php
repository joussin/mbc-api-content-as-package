<?php

namespace MbcApiContent\Models\Services;

use MbcApiContent\Models\Factory\PageFactory;
use MbcApiContent\Models\Page;
use MbcApiContent\Models\PageContent;
use MbcApiContent\Models\Route;

class MigrationService
{

    public function seedAll()
    {
        $routes = $this->createRoutes();
        $pages = $this->createPages();
        $pageContents = $this->createPageContents();
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

        $pageContents = PageContent::factory(1)->create([
            'page_id' => 1
        ]);

        return $pageContents;
    }


}
