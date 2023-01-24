<?php

namespace MbcApiContent\Database\Seeds;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class TemplateSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {

        $template_data = ['info'];
        $template_content = '<!DOCTYPE html><html lang=\"en\"><head><meta charset=\"UTF-8\"></head><body><h1>TEMPLATE HTML CONTENT DE PAGE HOMEPAGE : {{info}}</h1><div id=\"container\"><div id=\"editor\"><h1>Titre de mon article</h1><p><small>author: Joussin</small></p><p>content</p></div></div></body></html>';



        $template = [
            'version' => 1,
            'name' => "template-home",

            'template_data' => json_encode($template_data),
            'template_content' => $template_content,
        ];

        DB::table('template')->insert($template);



        $template = [
            'version' => 1,
            'name' => "template-model-2",

            'template_data' => null, //json_encode($template_data),
            'template_content' => null, //$template_content,
        ];

        DB::table('template')->insert($template);




    }
}
