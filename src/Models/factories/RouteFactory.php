<?php

namespace MbcApiContent\Models\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use MbcApiContent\Models\Route;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Model>
 */
class RouteFactory extends Factory
{


    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Route::class;



    public function getDefaults() : array
    {
        return [
            // required
            'method'          => 'GET',
            'protocol'        => 'http',
            'name'            => 'route-name',
            'uri'             => '/',
            'static_uri'      => '/',
            'static_doc_name' => 'index.html',
            'status'          => 'ONLINE',


            // nullable
            'controller_name'   => null,
            'controller_action' => null,
            'path_parameters'   => null,
            'query_parameters'  => null,
            'domain'            => null,
            'rewrite_rule'      => null,
            'active_start_at'   => null,
            'active_end_at'     => null,
        ];
    }


    public function getFakeDefinitions(string $key = null)
    {
        $fake = [
            'numberBetween' => fake()->numberBetween(1, 9),
            'name' => fake()->name(),
            'url' => fake()->url(),
            'domainName' => fake()->domainName(), // carroll.com
            'domainWord' => fake()->domainWord(), // carroll

        ];

        return is_null($key) ? $fake : $fake[$key];
    }

    /**
     * @return array
     */
    public function getDefinitions(array $definitions = []): array
    {
        $definitions['name'] = 'route-' . $this->getFakeDefinitions('name') . '-' . $this->getFakeDefinitions('numberBetween');
        $definitions['uri'] = "/" . $this->getFakeDefinitions('domainWord');
        $definitions['static_uri'] = "/" . $this->getFakeDefinitions('domainWord') . "/index.html";
        $definitions['static_doc_name'] = "index.html";

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
