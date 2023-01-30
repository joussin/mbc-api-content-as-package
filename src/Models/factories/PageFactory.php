<?php

namespace MbcApiContent\Models\Factories;


use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;
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
    public static function getDynamicDefinitions(): array
    {
        $id = fake()->numberBetween(1, 9);
        $name = Str::slug(fake()->name());

        $pageName = 'page-' . $name . '-' . $id;
        $routeName = 'route-' . $name . '-' . $id;

        $routeData = [
            'name'            => $routeName,
            'uri'             => '/url/dynamic/{id}',
            'static_uri'      => '/url/static/dynamic/' . $id . '/index.html',
            'path_parameters' => ['id'],
            'controller_action' => 'dynamic',
        ];

        $route = Route::factory()->create($routeData);

        $pageData = [
            'name'            => $pageName,
            'version'         => 1,
            'route_id'        => $route,
            'path_parameters' => ['id' => $id]
        ];

        return $pageData;
    }

    /**
     * @return array
     */
    public function getDefinitions(array $definitions = []): array
    {
        $id = fake()->numberBetween(1, 9);
        $name = Str::slug(fake()->name());

        $pageName = 'page-' . $name . '-' . $id;

        $definitions['name'] = $pageName;

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
