<?php

namespace MbcApiContent\Models\Migrations;

trait MigrationHelperTrait
{

    public $defaults = null;

    public function __construct()
    {
    }


    public function setDefaults(string $tableName, int $nb = 1, int $indexId = 0, array $forceDatas = [])
    {
        $this->defaults = \MbcApiContent\Models\Migrations\ModelsDefaults
            ::getDatas($tableName, $nb, $indexId, $forceDatas);
    }


    public function getDefaults(string $tableName, int $nb = 1, int $indexId = 0, array $forceDatas = []): ?array
    {
        $this->setDefaults($tableName, $nb, $indexId, $forceDatas);

        return $this->defaults;
    }











    /*
     *
//                $defaults = \MbcApiContent\Models\ModelsDefaults::
//                getDatas('route', 3, 0, [
//                    [
//                        'uri' => '/',
//                        'static_uri' => '/',
//                        'static_doc_name' => 'index.html',
//                    ],
//                    [
//                        'uri' => '/route-nb-2',
//                        'static_uri' => '/route-nb-2/page.html',
//                        'static_doc_name' => 'page.html',
//                    ],
//                    [
//                        'uri' => '/route-nb-3/{id}',
//                        'static_uri' => '/route-nb-3/{id}/page.html',
//                        'static_doc_name' => 'page.html',
//                    ],
//                ]);
// DB::table('route')->insert($route);
//                dd($defaults);


        $defaults = \MbcApiContent\Models\Migrations\ModelsDefaults::getDatas('route');
        dd($defaults);
     */
}