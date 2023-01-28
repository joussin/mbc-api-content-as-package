<?php

namespace MbcApiContent\Models\Migrations;

trait MigrationHelperTrait
{

    public $defaults = null;

    public function __construct()
    {
    }


    public function setDefaults(string $tableName, int $nb = 1, int $indexId = 0, array $forceDatas = [])
    {
        $this->defaults = \MbcApiContent\Models\Migrations\ModelsDefaults
            ::getDatas($tableName, $nb, $indexId, $forceDatas);
    }


    public function getDefaults(string $tableName, int $nb = 1, int $indexId = 0, array $forceDatas = []): ?array
    {
        $this->setDefaults($tableName, $nb, $indexId, $forceDatas);

        return $this->defaults;
    }

}
