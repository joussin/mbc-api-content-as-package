<?php

namespace MainNamespace\Console\Commands;

use Illuminate\Console\Command;
use Illuminate\Support\Facades\Artisan;

class CommandSeeder extends Command
{

    protected $seeder = 'DatabaseSeeder';
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'database:seeder  {--seeder= : The name of the seeder}';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Seed';

    /**
     * Create a new command instance.
     *
     * @return void
     */
    public function __construct()
    {
        parent::__construct();
    }

    /**
     * Execute the console command.
     *
     * @return mixed
     */
    public function handle()
    {
        try {


            $name= $this->seeder;

            $file = $this->input->getOption('seeder')?: false;


            if($file){
                $p = __DIR__ . "/./../../Database/Seeds/";

                $file_exists = file_exists($p . $file . '.php');


                if($file_exists){
                    $name = $file;
                }
            }



            if($name == $this->seeder){
                $this->info("> Exec ALL seeders...");

            } else {
                $this->info("> Exec $file seeder...");
            }


            $this->info("> Seeding Tables...");

            Artisan::call("db:seed", [
                '--class'=> 'MainNamespace\\Database\\Seeds\\' . $name
            ]);

        } catch (\Exception $exception) {
            $this->error("\nUnable to connect database. Did you change the .env file?\n");

            $this->error($exception->getMessage());
        }
    }






}
