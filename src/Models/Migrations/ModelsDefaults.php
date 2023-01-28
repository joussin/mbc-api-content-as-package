<?php

namespace MbcApiContent\Models\Migrations;

class ModelsDefaults
{
    protected static int $counter = 0;
    protected static int $autoIncrementId = 0;

    protected static string $tableName = 'table';
    protected static string $uniqid = '123456';


    protected static function hydrateObj($tableName)
    {
        self::$tableName = $tableName;
        self::$uniqid = uniqid();
        self::$counter++;
        self::$autoIncrementId++;
    }


    public static array $COMMON_DEFAULTS = [

        // required to merge
        'version'         => null,
        'name'            => null,

        // auto
        'created_at' => null,
        'updated_at' => null,
    ];

    protected static function set_common_defaults()
    {
        self::$COMMON_DEFAULTS['version'] = 1;
        self::$COMMON_DEFAULTS['name'] = self::$tableName . '-name';
    }


    // MODELS
    public static array $PAGE_DEFAULTS = [
        // required to merge
        'name'     => null,

        // required
        'version'  => null,

        // nullable
        'route_id' => null,
        'path_parameters'   => null,

        // unique
        'unique'   => [
            ['version', 'id'],
            ['version', 'name'],
        ],

        'foreign' => [
            [
                'name' => 'page_route_id_foreign',
                'column' => 'route_id',
                'relation_table' => 'route',
                'relation_column' => 'id',
                'type' => 'manyToOne' // many page to one route
            ]
        ]
    ];

    public static array $ROUTE_DEFAULTS = [
        // required to merge
        'name'            => null,

        // required
        'method'          => 'GET',
        'protocol'        => 'http',
        'uri'             => '/',
        'static_uri'      => '/',
        'static_doc_name' => 'index.html',
        'status'          => 'ONLINE',


        // nullable
        'controller_name'   => null,
        'controller_action' => null,
        'path_parameters'   => null,
        'query_parameters'  => null,
        'domain'            => null,
        'rewrite_rule'      => null,
        'active_start_at'   => null,
        'active_end_at'     => null,


        // unique
        'unique'            => [
            ['id', 'name'],
            ['id', 'method', 'uri'],
            ['id', 'method', 'static_uri'],
            ['id', 'method', 'static_doc_name']
        ]
    ];


    protected static function get_table_defaults(): array
    {
        $table_defaults_name = strtoupper(self::$tableName . '_defaults');

        return self::$$table_defaults_name;
    }

    protected static function set_table_defaults(array $table_defaults): void
    {
        $table_defaults_name = strtoupper(self::$tableName . '_defaults');

        self::$$table_defaults_name = $table_defaults;
    }






    // private generate methods
    protected static function merge_common_and_table_defaults(bool $overrideTableDefaults = true): array
    {
        $table_defaults = self::get_table_defaults();

        foreach ($table_defaults as $k => $v) {
            if (isset(self::$COMMON_DEFAULTS[$k]) && self::$COMMON_DEFAULTS[$k] != $v) {
                $table_defaults[$k] = self::$COMMON_DEFAULTS[$k];
            }
        }

        if($overrideTableDefaults)
        {
            self::set_table_defaults($table_defaults);
        }

        return $table_defaults;
    }

    protected static function replace_table_defaults(bool $overrideTableDefaults = true, array $replacesDatas = []): array
    {
        $table_defaults = self::get_table_defaults();

        foreach ($replacesDatas as $key => $value) {
            $table_defaults[$key] = $value;
        }

        if($overrideTableDefaults)
        {
            self::set_table_defaults($table_defaults);
        }

        return $table_defaults;
    }

    protected static function getTableDefaults($tableName): array
    {
        self::hydrateObj($tableName);
        self::set_common_defaults();

        $table_defaults = self::get_table_defaults();
        $table_defaults = self::merge_common_and_table_defaults();

        return $table_defaults;
    }

    protected static function getTableDatas($tableName, array $replacesDatas = []): array
    {
        $table_defaults = self::getTableDefaults($tableName);

        $table_datas = self::replace_table_defaults(false, $replacesDatas);

        if(isset($table_datas['unique'])){
            unset($table_datas['unique']);
        }
        if(isset($table_datas['foreign'])){
            unset($table_datas['foreign']);
        }

        return $table_datas;
    }



    // public
    // $replacesDatasArray : force data value for key
    // $replacesDatasArray => [ ['key'=> 'value'] ]
    public static function getDatas($tableName, int $nb = 1, int $currentAutoIncrementId = 0, array $replacesDatasArray = []): ?array
    {
        $datas = [];

        if ($currentAutoIncrementId > 0) {
            self::$autoIncrementId = $currentAutoIncrementId;
        }

        for ($i = 0; $i < $nb; $i++) {
            $replacesDatas = !empty($replacesDatasArray[$i]) ? ($replacesDatasArray[$i]) : [];
            $datas[] = self::getTableDatas($tableName, $replacesDatas);
        }

        if (count($datas) > 1) {
            return $datas;
        } elseif (count($datas) == 1) {
            return $datas[0];
        }

        return null;
    }

}
