<?php

namespace MbcApiContent\Models\Migrations;

trait MigrationHelperTrait
{

    public $defaults = null;

    public $datas = null;

    public function __construct()
    {
    }


    public function setDefaults(string $tableName)
    {
        $this->defaults = \MbcApiContent\Models\Migrations\ModelsDefaults
            ::getDatas($tableName);
    }

    public function setDatas(string $tableName, int $nb = 1, int $indexId = 0, array $forceDatas = [])
    {
        $this->datas = \MbcApiContent\Models\Migrations\ModelsDefaults
            ::getDatas($tableName, $nb, $indexId, $forceDatas);
    }


    public function getDefaults(string $tableName): ?array
    {
        $this->setDefaults($tableName);

        return $this->defaults;
    }

    public function getDatas(string $tableName, int $nb = 1, int $indexId = 0, array $forceDatas = []): ?array
    {
        $this->setDatas($tableName,$nb, $indexId, $forceDatas);

        return $this->datas;
    }

}
