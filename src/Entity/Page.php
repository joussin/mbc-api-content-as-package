<?php

namespace MbcApiContent\Entity;

use Illuminate\Database\Eloquent\Model;
use MbcApiContent\Entity\Interfaces\EntityInterface;
use MbcApiContent\Entity\Traits\HydrateEntityTrait;
use MbcApiContent\Entity\Validators\ValidationRules;
use MbcApiContent\Models\Page as PageModel;


class Page  implements EntityInterface
{

    use HydrateEntityTrait;


    /**
     * @var Model
     */
    public $model;


    public int $id;

    public int $version;

    public string $alias;


    public ?int $route_id;

    public string $created_at;

    public string $updated_at; //\DateTimeInterface


    public function __construct(PageModel $pageModel)
    {
        $modelAsArray = $pageModel->toArray();

        $validate = $this->validate($modelAsArray, ValidationRules::PAGE_RULES, true);

        $modelAsArray = $this->assignProp($modelAsArray);

        $this->model = $pageModel;

    }




    public function getModel(): ?Model
    {
        return $this->model;
    }


    public function getName(): string
    {
        return (isset($this->alias) ? $this->alias : '');
    }


}
