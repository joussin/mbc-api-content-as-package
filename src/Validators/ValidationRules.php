<?php

namespace MbcApiContent\Validators;

class ValidationRules
{

    public const DOMAIN_REGEX_RULES = '/^(?!-)[A-Za-z0-9-]+([\-\.]{1}[a-z0-9]+)*\.[A-Za-z]{2,6}$/';

    public const ROUTE_RULES = [
        'method'           => 'required|string|in:GET,HEAD,POST,PUT,PATCH,DELETE',
        'protocol'         => 'required|string|in:http,https',
        'name'             => 'required|string|alpha-dash|min:2|max:50',
        'uri'              => 'required|string|starts_with:/',
        'controller_name'   => 'nullable|string',
        'controller_action' => 'nullable|string|alpha-dash|min:2|max:50',
        'path_parameters'        => 'nullable|string',
        'query_parameters'       => 'nullable|string',
        'static_uri'        => 'nullable|string|starts_with:/',
        'static_doc_name'    => 'nullable|string|min:5|ends_with:.html,.php',

        'domain'           => 'nullable|string|regex:'. self::DOMAIN_REGEX_RULES,
        'rewrite_rule'      => 'nullable|string',
        'status'           => 'nullable|string|in:ONLINE,OFFLINE',
        "active_start_at"  => "nullable|date_format:Y-m-d",
        "active_end_at"    => "nullable|date_format:Y-m-d|after:active_start_at"
    ];

    public const PAGE_RULES = [

        'version' => 'required|integer',
        'name'             => 'required|string|alpha-dash|min:2|max:50',
        'route_id'             => 'nullable|integer',
    ];


}
