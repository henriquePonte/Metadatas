<?php

namespace Database\Factories;
use Illuminate\Support\Str;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Department>
 */
class DepartmentFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */

    protected static $index = 0;
    protected static $departments = [
        'Marketing',
        'Recursos Humanos',
        'Tecnologia da Informação',
        'Contabilidade',
        'Atendimento ao Cliente',
        'Logística',
        'Produção',
        'Pesquisa e Desenvolvimento'
    ];

    public function definition(): array
    {
        if (self::$index === count(self::$departments)) {
            self::$index = 0;
        }
        return [
            'name' => self::$departments[self::$index++],
            'code' => Str::random(5),
        ];
    }
}
