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


    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        return [

            'name'            => 'my-new-name',

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
