<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {

//                $defaults = \MbcApiContent\Models\ModelsDefaults::
//                getDatas('route', 3, 0, [
//                    [
//                        'uri' => '/',
//                        'static_uri' => '/',
//                        'static_doc_name' => 'index.html',
//                    ],
//                    [
//                        'uri' => '/route-nb-2',
//                        'static_uri' => '/route-nb-2/page.html',
//                        'static_doc_name' => 'page.html',
//                    ],
//                    [
//                        'uri' => '/route-nb-3/{id}',
//                        'static_uri' => '/route-nb-3/{id}/page.html',
//                        'static_doc_name' => 'page.html',
//                    ],
//                ]);
// DB::table('route')->insert($route);
//                dd($defaults);


        $defaults = \MbcApiContent\Models\ModelsDefaults::getDatas('route');
        dd($defaults);

        Schema::create('route', function (Blueprint $table) use($defaults) {



            $table->increments('id');

            $table->string('method')->default($defaults['method']);
            $table->enum('protocol', ['http', 'https'])->default($defaults['protocol']);


            $table->string('name')->default( $defaults['name'] );
            $table->string('uri')->default($defaults['uri'] );
            $table->string('controller_name')->nullable();
            $table->string('controller_action')->nullable();
            $table->json('path_parameters')->nullable();
            $table->json('query_parameters')->nullable();
            $table->string('static_uri')->nullable()->default($defaults['static_uri'] );
            $table->string('static_doc_name')->nullable()->default($defaults['static_doc_name'] );
            $table->string('domain')->nullable();
            $table->string('rewrite_rule')->nullable();


            $table->enum('status', ['ONLINE', 'OFFLINE'])->default($defaults['status']);
            $table->date('active_start_at')->nullable();
            $table->date('active_end_at')->nullable();

            // UNIQUE
            $table->unique(['id', 'name']);
            $table->unique(['id', 'method', 'uri']);
            $table->unique(['id', 'method', 'static_uri']);
            $table->unique(['id', 'method', 'static_doc_name']);


            $table->timestamp('created_at')->useCurrent();
            $table->timestamp('updated_at')->default(\Illuminate\Support\Facades\DB::raw('CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP'));

        });

    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('route');
    }
};
