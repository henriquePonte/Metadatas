<?php

namespace Database\Factories;

use App\Models\Document;
use App\Models\Mdata;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\DocumentMdata>
 */
class DocumentMdataFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'mdata_id' => $this->faker->numberBetween(1, 6),
            'document_id' => $this->faker->numberBetween(1, 500),
            'content' => $this->faker->name,
        ];
    }
}
