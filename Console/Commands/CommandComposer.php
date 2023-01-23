<?php

namespace MainNamespace\Console\Commands;

use Illuminate\Console\Command;
use Illuminate\Support\Composer;

class CommandComposer extends Command
{

    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'composer:dumpautoload';


    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = '';

    /**
     * The Composer instance.
     *
     * @var \Illuminate\Support\Composer
     */
    protected $composer;

    /**
     * Create a new command instance.
     *
     * @return void
     */
    public function __construct(Composer $composer)
    {
        parent::__construct();
        $this->composer = $composer;
    }

    /**
     * Execute the console command.
     *
     * @return mixed
     */
    public function handle()
    {
        try {

            print $this->composer->getVersion();

            $this->composer->dumpAutoloads();


        } catch (\Exception $exception) {
            $this->error("\nUnable to connect database. Did you change the .env file?\n");

            $this->error($exception->getMessage());
        }
    }






}
