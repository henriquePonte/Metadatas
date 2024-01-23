<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Mdata>
 */
class MdataFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    protected static $index = 0;
    protected static $types = [
        'size',
        'format',
        'doc_name',
        'type',
        'author',
        'proprietary',
    ];


    public function definition(): array
    {
        if (self::$index === count(self::$types)) {
            self::$index = 0;
        }
        return [
            'mdata' => self::$types[self::$index++],
        ];
    }
}
