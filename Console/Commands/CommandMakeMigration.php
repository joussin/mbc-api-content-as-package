<?php

namespace MainNamespace\Console\Commands;

use Illuminate\Console\Command;
use Illuminate\Database\Console\Migrations\TableGuesser;
use Illuminate\Support\Composer;
use Illuminate\Support\Facades\Artisan;
use Illuminate\Support\Str;

class CommandMakeMigration extends Command
{

    protected $path = '/src/Database/migrations/';

    protected $database = 'mysql';

    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'database:make {name : The name of the migration}
        {--create : The table to be created}
        {--table : The table to migrate}';

//    protected $signature = 'database:make {name : The name of the migration}
//        {--create= : The table to be created}
//        {--table= : The table to migrate}
//        {--path= : The location where the migration file should be created}
//        {--realpath : Indicate any provided migration file paths are pre-resolved absolute paths}
//        {--fullpath : Output the full path of the migration (Deprecated)}';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'create migration';

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
            $name = Str::snake(trim($this->input->getArgument('name')));

            $table = $this->input->getOption('table')?: false;

            $create = $this->input->getOption('create') ?: false;


            $optionKey = '--table';


            if($create)
            {
                $table = false;

                $name = "create_{$name}_table";

                $optionKey = "--create";
            }

            if($table)
            {
                $name = "update_{$name}_table";

                $optionKey = "--table";
            }


            if(!$table && !$create)
            {
                $name = "update_{$name}_table";

                $optionKey = "--table";
            }

//            if (! $table) {
//                [$table, $create] = TableGuesser::guess($name);
//            }


            $options = [
                'name' => $name,
                $optionKey => $name,
                '--path' => $this->path
            ];



            $this->info("> Creating Migration file...");

            Artisan::call("make:migration", $options);


        } catch (\Exception $exception) {
            $this->error("\nUnable to connect database. Did you change the .env file?\n");

            $this->error($exception->getMessage());
        }
    }






}
