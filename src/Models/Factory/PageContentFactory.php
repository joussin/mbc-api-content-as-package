<?php

namespace MbcApiContent\Models\Factory;


use Illuminate\Database\Eloquent\Factories\Factory;
use MbcApiContent\Models\PageContent;
use Illuminate\Support\Str;

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
            "name" => null,
            "content" => null,
            "page_id" => null,
        ];
    }



    /**
     * @return array
     */
    public function getDefinitions(array $definitions = []): array
    {
        $id = fake()->numberBetween(1, 9);
        $content = fake()->paragraph();
        $domainWord = fake()->domainWord();// carroll

        $definitions["name"] = $domainWord;
        $definitions["content"] = $content;
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
