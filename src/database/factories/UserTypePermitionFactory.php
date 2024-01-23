<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\UserTypePermition>
 */
class UserTypePermitionFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */

    protected static $index = 0;

    protected static $types = [
        'Administrador',
        'Funcionario',
        'Gestor',
        'Diretor',
        'Cliente'
    ];

    public function definition(): array
    {
        if (self::$index === count(self::$types)) {
            self::$index = 0;
        }
        return [
            'type' => self::$types[self::$index++],
        ];
    }
}
