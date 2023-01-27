<?php

namespace MbcApiContent\App\Entity;

use Illuminate\Database\Eloquent\Model;
use MbcApiContent\App\Entity\Interfaces\EntityInterface;
use MbcApiContent\App\Entity\Traits\HydrateEntityTrait;
use MbcApiContent\App\Entity\Validators\ValidationRules;
use MbcApiContent\App\Models\Page as PageModel;


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
