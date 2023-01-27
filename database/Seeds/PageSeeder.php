<?php

namespace MbcApiContent\Database\Seeds;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class PageSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {

        $page = [
            'version' => 1,
            'name' => "page-home",
            'route_id' => 1,
        ];

        DB::table('page')->insert($page);


        $page = [
            'version' => 1,
            'name' => "page-carte-grise",
            'route_id' => null,
        ];

        DB::table('page')->insert($page);


    }
}
