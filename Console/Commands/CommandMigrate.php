<?php

namespace MainNamespace\Console\Commands;

use Illuminate\Console\Command;
use Illuminate\Support\Facades\Artisan;

class CommandMigrate extends Command
{

    protected $path = './laravel-package/Database/migrations/';

    protected $database = 'mysql';

    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'database:migrate  {--name= : The name of the migration}';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Tables migration';

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

            $path = $this->path;

            $file = $this->input->getOption('name')?: false;

            if($file){
                $p = __DIR__ . "/./../../Database/migrations/";

                $file_exists = file_exists($p . $file);


                if($file_exists){
                    $path = $path . $file;
                }
            }


            $this->info("> Creating Tables...");


            if($path == $this->path){
                $this->info("> Exec ALL migrations...");

            } else {
                $this->info("> Exec $file migrations...");
            }


            Artisan::call("migrate:refresh", [
                '--path' => $path,
                '--database' =>  $this->database,
            ]);

        } catch (\Exception $exception) {
            $this->error("\nUnable to connect database. Did you change the .env file?\n");

            $this->error($exception->getMessage());
        }
    }






}
