<?php

namespace MbcApiContent\Models\Factories;


use Illuminate\Database\Eloquent\Factories\Factory;
use MbcApiContent\Models\Page;
use MbcApiContent\Models\Route;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Model>
 */
class PageFactory extends Factory
{

    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Page::class;


    public function getDefaults() : array
    {
        return [
            // required
            'name'     => 'page-name',
            'version'  => 1,

            // nullable
            'route_id' => null, // ////
            'path_parameters'   => null,
        ];
    }


    /**
     * @return array
     */
    public function getDefinitions($definitions): array
    {
        $nb = fake()->numberBetween(1, 9);

        $definitions['name'] = 'page-name-' . $nb;

        $definitions['route_id'] = Route::factory()->make([
            'name' => 'name-route-dyn-1',
            'uri' => '/dyn/{id}',
            'static_uri' => '/static/dyn/1/index.html',
            'static_doc_name' => 'dynamic.html',
        ]);

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
