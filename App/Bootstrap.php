<?php

namespace MainNamespace\App;

use MainNamespace\App\Facades\RouterFacade;
use MainNamespace\App\Models\Route;
use Illuminate\Support\Facades\Schema;


class Bootstrap
{

    private $connection;

    private $excludeTables = ['migrations'];

    private $includeTables = ['page', 'route', 'template'];

    private $prefix = 'Tables_in_';

    private $includeTablesColumns = [];


    public function init()
    {

//        $this->connection = \Illuminate\Support\Facades\Schema::connection('mysql');
//
//        $this->getDbConfig();
//        $this->getDbTableConfig();
//
//        $message = $this->formatMessage('');


        try{
            $router = RouterFacade::initCollections();
        }
        catch (\Exception $e)
        {
            throw new \Exception('Project not configured');
        }
    }



    public function formatMessage()
    {
        $routeTbl = $this->connection->hasTable('route');
        $pageTbl = $this->connection->hasTable('page');
        $templateTbl = $this->connection->hasTable('template');

        $message = 'Table found ' ;

        $messageBase = "Mysql Table missing : ";

        $routeTblErrorStr = (($routeTbl) ? '' : 'table route not found');
        $pageTblErrorStr = (($pageTbl) ? '' : 'table page not found');
        $templateTblErrorStr =  (($templateTbl) ? '' : 'table template not found');

        if( !$routeTbl)
        {
            $message .= $messageBase .  $routeTblErrorStr ;
        }

        elseif( !$pageTbl)
        {
            $message .= $messageBase .  $pageTblErrorStr ;
        }

        elseif( !$templateTbl)
        {
            $message .= $messageBase .  $templateTblErrorStr ;
        }

        return $message;
    }

    public function getDbConfig()
    {
        $database_name = $this->connection->getConnection()->getDatabaseName();

        $tables_found = $this->connection->getAllTables();

        $table_name_getter = $this->prefix . $database_name;

        $tables_found_filtred = array_filter($tables_found, function($table) use($table_name_getter) {
            return (!in_array($table->$table_name_getter, $this->excludeTables)) ? true : false;
        });

        $tables_found_as_list_name = array_map(function ($table) use($table_name_getter) { return $table->$table_name_getter; }, $tables_found_filtred);
        $tables_found_as_list_name = array_values($tables_found_as_list_name);


        $neededButNotFound = array_diff($this->includeTables, $tables_found_as_list_name);
        $foundButNotNeed = array_diff( $tables_found_as_list_name, $this->includeTables);

        return [
            'not_found' => $neededButNotFound,
            'not_need' => $foundButNotNeed,
            'all_found' => $tables_found_as_list_name,
            'all_needed' => $this->includeTables,
        ];
    }


    public function getDbTableConfig()
    {
        $includeTablesColumns = array_reduce($this->includeTables, function ($result, $table) {
            $columns = Schema::getColumnListing($table);
            $result[$table] = $columns;
            return $result;
        }, array());

        return $includeTablesColumns;
    }


}
