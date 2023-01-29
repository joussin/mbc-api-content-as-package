<?php

namespace MbcApiContent\Models\Factories;


use Illuminate\Database\Eloquent\Factories\Factory;
use MbcApiContent\Models\Page;

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



    // MODELS
    public const DEFAULTS = [
        // required
        'name'     => 'page-name',
        'version'  => 1,

        // nullable
        'route_id' => null, // ////
        'path_parameters'   => null,
    ];


    /**
     * @return array
     */
    public function getDefinition(): array
    {
        $nb = fake()->numberBetween(1, 9);

        return [

            // required
            'name'     => 'page-name-' . $nb,
            'version'  => 1,

            // nullable
            'route_id' => null, // ////
            'path_parameters'   => null,
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
//        return self::DEFAULTS;
    }
}
