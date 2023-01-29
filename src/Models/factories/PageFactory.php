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
        'route_id' => null,
        'path_parameters'   => null,



//        // auto
//        'created_at' => null,
//        'updated_at' => null,

    ];


    public const UNIQUES = [
        // unique
        // unique
        'unique'   => [
            ['version', 'id'],
            ['version', 'name'],
        ],
    ];

    public const FOREIGNS = [

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
        return self::DEFAULTS;
    }
}
