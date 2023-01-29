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
    public static array $DEFAULTS = [
        // required to merge
        'name'     => null,

        // required
        'version'  => null,

        // nullable
        'route_id' => null,
        'path_parameters'   => null,



        // auto
        'created_at' => null,
        'updated_at' => null,


        // unique
        'unique'   => [
            ['version', 'id'],
            ['version', 'name'],
        ],

        'foreign' => [
            [
                'name' => 'page_route_id_foreign',
                'column' => 'route_id',
                'relation_table' => 'route',
                'relation_column' => 'id',
                'type' => 'manyToOne' // many page to one route
            ]
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

            'name' => 'page-name',
            'route_id' => null,
//                        'path_parameters' => json_encode(['id'=> 2]),

        ];
    }
}
