<?php

namespace MbcApiContent\Database\Seeds;


use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $this->call([
            RouteSeeder::class,
            PageSeeder::class,
        ]);
    }
}
