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

    public ?int $page_id;

    public ?string $name;
    public ?string $content;

    public string $created_at;

    public string $updated_at; //\DateTimeInterface


    public function __construct($model)
    {

        $this->model = $model;
    }


    public function getName(): string
    {
        return $this->name ?? '';
    }

    public function getModel(): ?Model
    {
        return $this->model;
    }
}