<?php

namespace MbcApiContent\App\Entity;

use Illuminate\Database\Eloquent\Model;
use MbcApiContent\App\Entity\Interfaces\EntityInterface;
use MbcApiContent\App\Entity\Traits\HydrateEntityTrait;
use MbcApiContent\App\Entity\Traits\TemplateEntityParserTrait;
use MbcApiContent\App\Entity\Validators\ValidationRules;
use MbcApiContent\App\Models\Page as PageModel;


class Page  implements EntityInterface
{

    use HydrateEntityTrait;

    use TemplateEntityParserTrait;

    /**
     * @var Model
     */
    public $model;


    public ?Template $templateEntity;


    public int $id;

    public int $version;

    public string $alias;

    public ?int $template_id;

    public ?array $template_input_data;

    public ?int $route_id;

    public string $created_at;

    public string $updated_at; //\DateTimeInterface


    public function __construct(PageModel $pageModel, ?Template $templateEntity = null)
    {
        $modelAsArray = $pageModel->toArray();

        $validate = $this->validate($modelAsArray, ValidationRules::PAGE_RULES, true);

        $modelAsArray = $this->assignProp($modelAsArray);

        $this->model = $pageModel;

        if(!is_null($templateEntity))
        {
            $this->templateEntity = $templateEntity;
        }
    }


    public function getTemplateModel() : ?Model
    {
        return $this->getModel()->template()->getResults();
    }

    public function parseTemplate() : ?string
    {
        return $this->parse($this, $this->templateEntity);
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
