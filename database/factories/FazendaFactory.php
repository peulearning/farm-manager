<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Fazenda>
 */
class FazendaFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
              'nome' => $this->faker->company(),
              'tamanho' => $this->faker->numberBetween(50, 1000), // tamanho em hectares
              'responsavel' => $this->faker->name(),
        ];
    }
}
