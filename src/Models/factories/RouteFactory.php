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

    public static array $DEFAULTS = [
        // required to merge
        'name'            => null,

        // required
        'method'          => 'GET',
        'protocol'        => 'http',
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

        // required to merge
        'version'         => null,


        // auto
        'created_at' => null,
        'updated_at' => null,


        // unique
        'unique'            => [
            ['id', 'name'],
            ['id', 'method', 'uri'],
            ['id', 'method', 'static_uri'],
            ['id', 'method', 'static_doc_name']
        ]
    ];



    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        return [

            'name'            => 'route-name',

            // required
            'method'          => 'GET',
            'protocol'        => 'http',
            'uri'             => '/',
            'static_uri'      => '/',
            'static_doc_name' => 'index.html',
            'status'          => 'ONLINE',

//            'user_id' => User::factory(),
//            'title' => fake()->title(),
//            'content' => fake()->paragraph(),

//            'user_type' => function (array $attributes) {
//                return User::find($attributes['user_id'])->type;
//            },
        ];
    }




//                    [
//                        'name'            => 'route-nb-3',
//                        'uri'             => '/route-nb-3/{id}',
//                        'static_uri'      => '/route-nb-3/{id}/page.html',
//                        'static_doc_name' => 'page.html',
////                        'controller_name' => 'DynamicController',
//                        'controller_action' => 'dynamic',
//                        'path_parameters' => json_encode(['id']),
//                    ],

    /**
     * Configure the model factory.
     *
     * @return $this
     */
    public function configure()
    {
        return $this->afterMaking(function (Route $route) {
            //
        })->afterCreating(function (Route $route) {
            //
        });
    }
}
