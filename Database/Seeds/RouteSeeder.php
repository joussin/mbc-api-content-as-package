<?php

namespace MbcApiContent\Database\Seeds;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class RouteSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {



        $route = [
            'method' => "GET",
            'protocol' => "http",
            'name' => "route-home",
            'uri' => "/",
            'static_doc_name' => 'home.html',
            'static_uri' => '/home.html'
        ];

        DB::table('route')->insert($route);

        $route = [
            'method' => "GET",
            'protocol' => "http",
            'name' => "route-numero-2",
            'uri' => "/route-numero-2",
            'static_doc_name' => 'route-numero-2.html',
            'static_uri' => '/route-numero-2.html'
        ];

        DB::table('route')->insert($route);


        $route = [
            'method'           => 'GET',
            'protocol'         => 'http',
            'name'             => 'route-name-test',
            'uri'              => '/uri-test',
            'controller_name'   => 'MbcApiContent\App\Http\Controllers\Rendering\MainController',
            'controller_action' => 'any',
            'path_parameters'        => null,
            'query_parameters'       => null,
            'static_uri'        => '/static/uri-test.html',
            'static_doc_name'    => 'uri-test.html',
            'domain'           => 'www.domain.com',
            'rewrite_rule'      => null,
            'status'           => 'ONLINE',
            'active_start_at'  => '2023-01-01',
            'active_end_at'    => '2023-12-31'
        ];

        DB::table('route')->insert($route);

    }
}
