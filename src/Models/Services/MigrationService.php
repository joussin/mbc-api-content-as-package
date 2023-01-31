<?php

namespace MbcApiContent\Models\Services;

use MbcApiContent\Models\Factory\PageFactory;
use MbcApiContent\Models\Page;
use MbcApiContent\Models\PageContent;
use MbcApiContent\Models\Route;

class MigrationService
{

    public function seed(string $type = 'all')
    {
        $routes = Route::factory(3)->create([]);

        $pages = Page::factory(3)->create([]);

        $definitions = PageFactory::getDynamicDefinitions();

        $page = Page::factory()->create($definitions);


        $pageContents = PageContent::factory(1)->create([
            'page_id' => $page
        ]);
    }
}
