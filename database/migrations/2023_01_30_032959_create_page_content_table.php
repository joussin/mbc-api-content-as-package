<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
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
        Schema::create('page_content', function (Blueprint $table) {
            $table->id();
            $table->integer('page_id')->nullable()->unsigned();

            $table->string('name')->nullable();
            $table->string('content')->nullable();


            $table->timestamp('created_at')->useCurrent();
            $table->timestamp('updated_at')->default(\Illuminate\Support\Facades\DB::raw('CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP'));


        });



        // many page to one route
        Schema::table('page_content', function (Blueprint $table) {
            $table->foreign(
                'page_id',
                'page_content_page_id_foreign')
                ->references('id')
                ->on('page')
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
//        Schema::table('page_content', function (Blueprint $table) {
//            $table->dropForeign('page_content_page_id_foreign');
//        });

        Schema::dropIfExists('page_content');
    }
};
