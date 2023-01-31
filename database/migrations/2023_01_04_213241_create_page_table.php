<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Facades\DB;

return new class extends Migration
{

    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('page', function (Blueprint $table) {

            $table->increments('id');
            $table->integer('version');
            $table->string('name');
            $table->string('template_name')->nullable();

            $table->integer('route_id')->nullable()->unsigned();

            $table->timestamp('created_at')->useCurrent();
            $table->timestamp('updated_at')->default(\Illuminate\Support\Facades\DB::raw('CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP'));


            // UNIQUE
            $table->unique(['version', 'id']);
            $table->unique(['version', 'name']);

        });



        // many page to one route
        Schema::table('page', function (Blueprint $table) {
            $table->foreign(
                'route_id',
                'page_route_id_foreign')
                ->references('id')
                ->on('route')
                ->nullOnDelete();
        });



    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('page', function (Blueprint $table) {
            $table->dropForeign('page_route_id_foreign');
        });

        Schema::dropIfExists('page');
    }
};
