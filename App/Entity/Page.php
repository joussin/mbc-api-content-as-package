<?php

namespace MainNamespace\App\Entity;

use Illuminate\Database\Eloquent\Model;
use MainNamespace\App\Entity\Interfaces\EntityInterface;
use MainNamespace\App\Entity\Traits\HydrateEntityTrait;
use MainNamespace\App\Entity\Traits\TemplateEntityParserTrait;
use MainNamespace\App\Entity\Validators\ValidationRules;
use MainNamespace\App\Models\Page as PageModel;


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
