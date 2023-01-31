<?php

namespace MbcApiContent\Entity;

use Illuminate\Database\Eloquent\Model;
use MbcApiContent\Entity\Interfaces\EntityInterface;
use MbcApiContent\Entity\Traits\HydrateEntityTrait;

class PageContent  implements EntityInterface
{

    use HydrateEntityTrait;


    /**
     * @var Model
     */
    public $model;


    public int $id;

    public int $version;

    public function __construct($model)
    {

        $this->model = $model;
    }


    public function getName(): string
    {
        return '';
    }

    public function getModel(): ?Model
    {
        return $this->model;
    }
}