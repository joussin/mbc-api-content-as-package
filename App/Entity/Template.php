<?php

namespace MbcApiContent\App\Entity;

use Illuminate\Database\Eloquent\Model;
use MbcApiContent\App\Entity\Interfaces\EntityInterface;
use MbcApiContent\App\Entity\Traits\HydrateEntityTrait;
use MbcApiContent\App\Entity\Validators\ValidationRules;
use MbcApiContent\App\Models\Template as TemplateModel;


class Template  implements EntityInterface
{

    use HydrateEntityTrait;

    /**
     * @var Model
     */
    public $model;

    public int $id;

    public int $version;

    public string $alias;

    public ?array $template_data;


    public ?string $template_content;

    public string $created_at;

    public string $updated_at; //\DateTimeInterface


    public function __construct(TemplateModel $templateModel)
    {
        $modelAsArray = $templateModel->toArray();

        $validate = $this->validate($modelAsArray, ValidationRules::TEMPLATE_RULES, true);

        $modelAsArray = $this->assignProp($modelAsArray);

        $this->model = $templateModel;
    }


    public function getName(): string
    {
        return (isset($this->alias) ? $this->alias : '');
    }


    public function getModel(): ?Model
    {
        return $this->model;
    }



}
