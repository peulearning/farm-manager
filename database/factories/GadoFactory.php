<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Gado>
 */
class GadoFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
         'codigo' => $this->faker->unique()->bothify('GADO-####'),
         'leite' => $this->faker->randomFloat(2, 0, 50),
         'racao' => $this->faker->randomFloat(2, 0, 20),
         'peso' => $this->faker->randomFloat(2, 200, 800),
         'data_nascimento' => $this->faker->date(),
         'fazenda_id' => \App\Models\Fazenda::factory(),
         'vivo' => true,
         'data_abate' => null,
        ];
    }
}
