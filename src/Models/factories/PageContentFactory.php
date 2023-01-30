<?php

namespace MbcApiContent\Models\Factories;


use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;
use MbcApiContent\Models\PageContent;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Model>
 */
class PageContentFactory extends Factory
{

    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = PageContent::class;


    public function getDefaults() : array
    {
        return [
            "content" => null,
            "page_id" => null,
        ];
    }



    /**
     * @return array
     */
    public function getDefinitions(array $definitions = []): array
    {
        $definitions["content"] = null;
        $definitions["page_id"] = null;

        return $definitions;
    }


    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        return $this->getDefinitions($this->getDefaults());
    }
}
