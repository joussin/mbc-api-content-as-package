<?php

namespace MbcApiContent;

use MbcApiContent\Entity\Collections\RouteEntityCollectionInterface;
use MbcApiContent\Events\ApiContentEventListener;
use MbcApiContent\Facades\RouterFacade;

class Bootstrap
{

    public ApiContentEventListener $apiContentEventListener;

    public const TABLES = ['page', 'route'];

    public function __construct(ApiContentEventListener $apiContentEventListener)
    {
        $this->apiContentEventListener = $apiContentEventListener;

    }

    public function init(bool $initRouter = true, bool $initListener = true )
    {
        $check  = $this->check(self::TABLES);

        if($check["isMissingDb"] )
        {
            throw new \Exception('Project not configured incorrect db : ' . $check["databaseName"] );
        }
        if(!$check["isMissingDb"] && $check["isMissingTables"] && !$this->isCli())
        {
            throw new \Exception('Project not configured missing tables : ' . implode(', ', $check["tablesToCheck"]));

        }

        if(!$check["isMissingDb"] && !$check["isMissingTables"])
        {
            $this->initRouter();

            $this->apiContentEventListener->initListener($initListener);
        }

    }

    public function initRouter()
    {
        $router = RouterFacade::initCollections();
    }

    public function getRoutesEntityCollection(): RouteEntityCollectionInterface
    {
        return RouterFacade::getRoutesEntityCollection();
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
