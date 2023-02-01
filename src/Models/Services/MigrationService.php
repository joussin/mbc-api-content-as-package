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
        $route = Route::factory(1)->create([]);

        $page = Page::factory(1)->create([
            'route_id' => 1
        ]);

        $definitions = PageFactory::getDynamicDefinitions();

        $page = Page::factory()->create($definitions);


        $pageContents = PageContent::factory(1)->create([
            'page_id' => $page,
            'name' => 'content_no_1',
        ]);


        $pageContents = PageContent::factory(1)->create([
            'page_id' => 1,
            'name' => 'content_h1',
        ]);
    }
}
