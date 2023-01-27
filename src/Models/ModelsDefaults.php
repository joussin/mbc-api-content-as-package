<?php

namespace MbcApiContent\Models;

class ModelsDefaults
{


    public static array $COMMON_DEFAULTS = [
            'name' => 'name',
        ];


    public static array $PAGE_DEFAULTS = [
            'version' => 1,
        ];


    public static array $ROUTE_DEFAULTS = [
            'uri' => '/',
            'static_uri' => '/',
            'static_doc_name' => 'index.html',
        ];


    public static function setDefaults($replaces) : array
    {
        self::$COMMON_DEFAULTS['uniq'] = uniqid();

        self::$COMMON_DEFAULTS = array_merge(self::$COMMON_DEFAULTS, self::$PAGE_DEFAULTS, self::$ROUTE_DEFAULTS);

        foreach ($replaces as $key => $value)
        {
            self::$COMMON_DEFAULTS[$key] = $value;
        }

        return self::$COMMON_DEFAULTS;
    }


    public static function getDefaults($replaces) // $replaces => ['key'=> 'value']
    {
        self::setDefaults($replaces);

        return self::$COMMON_DEFAULTS;
    }
}