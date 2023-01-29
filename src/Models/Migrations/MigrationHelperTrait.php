<?php

namespace MbcApiContent\Models\Migrations;

use Illuminate\Support\Facades\DB;

trait MigrationHelperTrait
{

    public $defaults = null;

    public $datas = null;

    public function __construct()
    {
    }


    public function setDefaults(string $tableName)
    {
        $this->defaults = \MbcApiContent\Models\Migrations\ModelsDefaults
            ::getDatas($tableName);
    }

    public function setDatas(string $tableName, int $nb = 1, int $indexId = 0, array $forceDatas = [])
    {
        $this->datas = \MbcApiContent\Models\Migrations\ModelsDefaults
            ::getDatas($tableName, $nb, $indexId, $forceDatas);
    }


    public function getDefaults(string $tableName): ?array
    {
        $this->setDefaults($tableName);

        return $this->defaults;
    }

    public function getDatas(string $tableName, int $nb = 1, int $indexId = 0, array $forceDatas = []): ?array
    {
        $this->setDatas($tableName, $nb, $indexId, $forceDatas);

        return $this->datas;
    }





    public function seed($table)
    {

        if ($table == 'route') {


            $datas = $this->getDatas('route', 3, 0,
                [
                    [
                        'name'            => 'route-nb-1',
                        'uri'             => '/',
                        'static_uri'      => '/',
                        'static_doc_name' => 'index.html',
                    ],
                    [
                        'name'            => 'route-nb-2',
                        'uri'             => '/route-nb-2',
                        'static_uri'      => '/route-nb-2/page.html',
                        'static_doc_name' => 'page.html',
                    ],
                    [
                        'name'            => 'route-nb-3',
                        'uri'             => '/route-nb-3/{id}',
                        'static_uri'      => '/route-nb-3/{id}/page.html',
                        'static_doc_name' => 'page.html',
//                        'controller_name' => 'DynamicController',
                        'controller_action' => 'dynamic',
                        'path_parameters' => json_encode(['id']),
                    ],
                ]
            );


            DB::table('route')->insert($datas[0]);
            DB::table('route')->insert($datas[1]);
            DB::table('route')->insert($datas[2]);


        } else if ($table == 'page') {


            $datas = $this->getDatas('page', 4, 0,
                [
                    [
                        'name' => 'page-nb-1',
                        'route_id' => 1,
                    ],
                    [
                        'name' => 'page-nb-2',
                        'route_id' => 2,
                    ],
                    [
                        'name' => 'page-nb-3',
                        'route_id' => 3,
                        'path_parameters' => json_encode(['id'=> 1]),
                    ],
                    [
                        'name' => 'page-nb-4',
                        'route_id' => 3,
                        'path_parameters' => json_encode(['id'=> 2]),
                    ]
                ]
            );


            DB::table('page')->insert($datas[0]);
            DB::table('page')->insert($datas[1]);
            DB::table('page')->insert($datas[2]);
            DB::table('page')->insert($datas[3]);

        }

    }


}
