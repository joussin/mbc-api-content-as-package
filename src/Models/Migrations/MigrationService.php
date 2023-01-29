<?php

namespace MbcApiContent\Models\Migrations;

class MigrationService
{

    use MigrationHelperTrait;


    public function __construct()
    {
    }

    public function seedAll()
    {
        $this->seed('route');
        $this->seed('page');
    }

}