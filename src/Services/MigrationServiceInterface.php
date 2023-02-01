<?php

namespace MbcApiContent\Services;

interface MigrationServiceInterface
{
    public function seed(string $type = 'all') : void;
}