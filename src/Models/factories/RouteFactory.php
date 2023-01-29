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



    public const DEFAULTS = [
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

    /**
     * @return array
     */
    public function getDefinition(): array
    {
        $nb = fake()->numberBetween(1, 9);
        $uri = fake()->url();

        return [
            'method'          => 'GET',
            'protocol'        => 'http',
            'name'            => 'route-name-' . $nb,
            'uri'             => $uri,
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

    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        return self::getDefinition();
        return self::DEFAULTS;
    }
}
