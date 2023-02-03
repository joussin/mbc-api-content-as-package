<?php

namespace MbcApiContent;

use MbcApiContent\Events\ApiContentEventListener;
use MbcApiContent\Events\ApiContentMigrationsEventListener;
use MbcApiContent\Events\ApiContentModelsEventListener;
use MbcApiContent\Facades\RouterFacade;

class Bootstrap
{

    public ApiContentEventListener $apiContentEventListener;
    public ApiContentModelsEventListener $apiContentModelsEventListener;
    public ApiContentMigrationsEventListener $apiContentMigrationsEventListener;

    public const TABLES = ['page', 'route', 'page_content'];

    public function __construct(ApiContentEventListener $apiContentEventListener,
                                ApiContentModelsEventListener $apiContentModelsEventListener,
                                ApiContentMigrationsEventListener $apiContentMigrationsEventListener)
    {
        $this->apiContentEventListener = $apiContentEventListener;
        $this->apiContentModelsEventListener = $apiContentModelsEventListener;
        $this->apiContentMigrationsEventListener = $apiContentMigrationsEventListener;

    }

    public function init(bool $initRouter = true, bool $initListener = true )
    {
        $check  = $this->check(self::TABLES);

        if($check["isMissingDb"] )
        {
            throw new \Exception('Project not configured incorrect db : ' . $check["databaseName"] );
        }

        if(!$check["isMissingDb"] && $check["isMissingTables"] && $this->isCli())
        {
            $this->apiContentMigrationsEventListener->initListener();
        }

        if(!$check["isMissingDb"] && $check["isMissingTables"] && !$this->isCli())
        {
            throw new \Exception('Project not configured missing tables : ' . implode(', ', $check["tablesToCheck"]));
        }

        if(!$check["isMissingDb"] && !$check["isMissingTables"] )
        {
            $this->initRouter($initRouter);

            $this->apiContentEventListener->initListener($initListener);
            $this->apiContentModelsEventListener->initListener($initListener);
        }

    }

    public function initRouter(bool $initRouter = true)
    {
        if($initRouter)
        {
            RouterFacade::initCollections();
        }
    }


    public function isCli() : bool
    {
        return (php_sapi_name() == 'cli');
    }

    public function check(array $tablesToCheck = []) : array
    {

        try{
            $connection = \Illuminate\Support\Facades\Schema::connection('mysql');
            $databaseName = $connection->getConnection()->getDatabaseName();

            $tablesFound = $connection->getAllTables();

        } catch(\Exception $e)
        {
            return [
                'connection' => $connection,
                'databaseName' => $databaseName,
                'isMissingDb' => true,
                'isMissingTables' => true,
            ];
        }



        foreach ($tablesToCheck as $k => $tableToCheck)
        {
            if( $connection->hasTable($tableToCheck) )
            {
                unset($tablesToCheck[$k]);
            }
        }

        return [
            'connection' => $connection,
            'databaseName' => $databaseName,
            'isMissingDb' => false,
            'isMissingTables' => !empty($tablesToCheck),

            'tablesToCheck' => $tablesToCheck,
            'tablesFound'    => $tablesFound,
        ];
    }

}
