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
            'template_id' => 1,
            'template_input_data' => json_encode([
                'info' => "Page home alias = page-home | template = 1 | route = 1"
            ]),
            'route_id' => 1,
        ];

        DB::table('page')->insert($page);


        $page = [
            'version' => 1,
            'name' => "page-carte-grise",
            'template_id' => null, // 1
            'template_input_data' => null, //json_encode($template_input_data),
            'route_id' => null,
        ];

        DB::table('page')->insert($page);


    }
}
