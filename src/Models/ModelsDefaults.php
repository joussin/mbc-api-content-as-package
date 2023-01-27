<?php

namespace MbcApiContent\Models;

class ModelsDefaults
{
    public static int $counter = 0;
    public static int $autoIncrementId = 0;

    public static string $tableName = 'table';
    public static string $uniqid = '123456';

    public static int $version = 1;
    public static string $name = 'name';

    public static array $FINAL_DEFAULTS = [];

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


    protected static function setObjDefaults($tableName)
    {
        self::$tableName = $tableName;
        self::$uniqid = uniqid();
        
        self::$name = $tableName . '-name-' . self::$uniqid;

        self::$counter++;
        self::$autoIncrementId++;
    }

    protected static function setCommonDefaults()
    {
        // default $COMMON_DEFAULTS values
        self::$COMMON_DEFAULTS['counter'] = self::$counter;
        self::$COMMON_DEFAULTS['autoIncrementId'] = self::$autoIncrementId;

        self::$COMMON_DEFAULTS['uniq'] = self::$uniqid;

        self::$COMMON_DEFAULTS['version'] = self::$version;
        self::$COMMON_DEFAULTS['tableName'] = self::$tableName;
        self::$COMMON_DEFAULTS['name'] = self::$name;
    }


    protected static function merge_common_and_table_defaults(bool $overrideTableDefaults = false): array
    {
        $table_defaults_name = strtoupper(self::$tableName . '_defaults');
        $table_defaults = self::$$table_defaults_name;

        foreach ($table_defaults as $k => $v) {
            if (isset(self::$COMMON_DEFAULTS[$k]) && self::$COMMON_DEFAULTS[$k] != $v) {
                $table_defaults[$k] = self::$COMMON_DEFAULTS[$k];
            }
        }

        if($overrideTableDefaults)
        {
            self::$$table_defaults_name = $table_defaults;
        }

        return $table_defaults;
    }


    protected static function getDefaults($tableName, array $replaces = []): array
    {
        self::setObjDefaults($tableName);
        self::setCommonDefaults();

        $defaults = self::merge_common_and_table_defaults();

        foreach ($replaces as $key => $value) {
            $defaults[$key] = $value;
        }

        return $defaults;
    }


    // public
    // $replacesArray => [ ['key'=> 'value'] ]
    public static function getDatas($tableName, int $nb = 1, int $currentAutoIncrementId = 0, array $replacesArray = []): ?array
    {
        $datas = [];

        if ($currentAutoIncrementId > 0) {
            self::$autoIncrementId = $currentAutoIncrementId;
        }

//        if ($nb == 1) {
//            $replaces = !empty($replacesArray[0]) ? ($replacesArray[0]) : [];
//
//            $datas[] = self::getDefaults($tableName, $replaces);
//        } else if ($nb > 1) {
//
//            for ($i = 0; $i < $nb; $i++) {
//                $replaces = !empty($replacesArray[$i]) ? ($replacesArray[$i]) : [];
//                $datas[] = self::getDefaults($tableName, $replaces);
//            }
//        }

        for ($i = 0; $i < $nb; $i++) {
            $replaces = !empty($replacesArray[$i]) ? ($replacesArray[$i]) : [];
            $datas[] = self::getDefaults($tableName, $replaces);
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
