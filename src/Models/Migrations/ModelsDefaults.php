<?php

namespace MbcApiContent\Models\Migrations;

class ModelsDefaults
{
    protected static int $counter = 0;
    protected static int $autoIncrementId = 0;

    protected static string $tableName = 'table';
    protected static string $uniqid = '123456';

    protected static int $version = 1;
    protected static string $name = 'name';

    protected static function hydrateObj($tableName)
    {
        self::$tableName = $tableName;
        self::$uniqid = uniqid();

        self::$name = $tableName . '-name-' . self::$uniqid;

        self::$counter++;
        self::$autoIncrementId++;
    }


    public static array $COMMON_DEFAULTS = [
        // infos
        'counter'         => null,
        'autoIncrementId' => null,
        'tableName'       => null,
        'uniq'            => null,

        // required to merge
        'version'         => null,
        'name'            => null,

        // auto
        'created_at' => null,
        'updated_at' => null,
    ];

    protected static function set_common_defaults()
    {
        // default $COMMON_DEFAULTS values
        self::$COMMON_DEFAULTS['counter'] = self::$counter;
        self::$COMMON_DEFAULTS['autoIncrementId'] = self::$autoIncrementId;

        self::$COMMON_DEFAULTS['uniq'] = self::$uniqid;

        self::$COMMON_DEFAULTS['version'] = self::$version;
        self::$COMMON_DEFAULTS['tableName'] = self::$tableName;
        self::$COMMON_DEFAULTS['name'] = self::$name;
    }

    // MODELS
    public static array $PAGE_DEFAULTS = [
        // required to merge
        'name'     => "",

        // required
        'version'  => 1,

        // nullable
        'route_id' => null,
        
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
        'name'            => "",

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


    public static array $FINAL_DEFAULTS = [];



    // private generate methods
    protected static function merge_common_and_table_defaults(bool $overrideTableDefaults = false): array
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

    protected static function replace_table_defaults(bool $overrideTableDefaults = false, array $replacesDatas = []): array
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

    protected static function getTableDefaultsDatas($tableName, array $replacesDatas = []): array
    {
        self::hydrateObj($tableName);
        self::set_common_defaults();

        $table_defaults = self::merge_common_and_table_defaults();

        $table_defaults = self::replace_table_defaults(false, $replacesDatas);

        return $table_defaults;
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
            $datas[] = self::getTableDefaultsDatas($tableName, $replacesDatas);
        }

        self::$FINAL_DEFAULTS = $datas;

        if (count(self::$FINAL_DEFAULTS) > 1) {
            return self::$FINAL_DEFAULTS;
        } elseif (count(self::$FINAL_DEFAULTS) == 1) {
            return self::$FINAL_DEFAULTS[0];
        }

        return null;
    }

}
