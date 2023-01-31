<?php

namespace MbcApiContent\Models\Factory;


use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;
use MbcApiContent\Models\Page;
use MbcApiContent\Models\Route;
use function MbcApiContent\Models\Factory\fake;

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
            'template_name' => null, // ////
            'route_id' => null, // ////
        ];
    }


    /**
     * @return array
     */
    public static function getDynamicDefinitions(): array
    {
        $id = fake()->numberBetween(1, 9);
        $domainWord = fake()->domainWord();// carroll


        $pageName = 'page-' . $domainWord . '-' . $id;
        $routeName = 'route-' . $domainWord . '-' . $id;

        $uri = "/route/dynamic/";
        $path = $uri . '{id}';
        $pathWithId = $uri . "$id";
        $staticPathWithId = $uri . "$id".'/index.html';

        $routeData = [
            'name'            => $routeName,
            'uri'             => $pathWithId,
            'pattern'         => $path,
            'static_uri'      => $staticPathWithId,
        ];

        $route = Route::factory()->create($routeData);

        $pageData = [
            'name'            => $pageName,
            'version'         => 1,
            'route_id'        => $route
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
        $domainWord = fake()->domainWord();// carroll

        $pageName = 'page-' . $domainWord . '-' . $id;

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
