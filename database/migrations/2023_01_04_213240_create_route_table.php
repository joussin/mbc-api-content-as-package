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
        Schema::create('route', function (Blueprint $table) {

            $table->increments('id');

            $table->string('method')->default('GET');
            $table->enum('protocol', ['http', 'https'])->default('http');


            $table->string('name');
            $table->string('uri');
            $table->string('pattern')->nullable();
            $table->string('controller_name')->nullable();
            $table->string('controller_action')->nullable();
            $table->json('path_parameters')->nullable();
            $table->json('query_parameters')->nullable();
            $table->string('static_uri');
            $table->string('static_doc_name');
            $table->string('domain')->nullable();
            $table->string('rewrite_rule')->nullable();


            $table->enum('status', ['ONLINE', 'OFFLINE'])->default('ONLINE');
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
