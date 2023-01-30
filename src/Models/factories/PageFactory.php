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
            'uri'   => null,
        ];
    }


    /**
     * @return array
     */
    public static function getDynamicDefinitions(): array
    {
        $id = fake()->numberBetween(1, 9);
        $name = Str::slug(fake()->name());
        $domainName = fake()->domainName();// carroll.com
        $domainWord = fake()->domainWord();// carroll


        $pageName = 'page-' . $name . '-' . $id;
        $routeNameDyn = 'route-' . $name . '-dyn' ;
        $routeName = 'route-' . $name . '-' . $id;

        $uri = "/$domainWord/dynamic/";
        $path = $uri . "{id}";
        $pathWithId = $uri . "$id";
        $staticPathWithId = $uri . "$id".'/index.html';

        $routeData = [
            'name'            => $routeNameDyn,
            'uri'             => $path,
            'controller_action' => 'dynamic',
        ];

        $route = Route::factory()->create($routeData);

        $pageData = [
            'name'            => $pageName,
            'version'         => 1,
            'route_id'        => $route,
            'uri'             => $pathWithId
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
