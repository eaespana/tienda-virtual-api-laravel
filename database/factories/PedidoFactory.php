<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

class PedidoFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'cliente_id' => rand(1,10),
            'ciudad_remision' => $this->faker->cityPrefix,
            'direccion_remision' => $this->faker->Address,
            'fecha_entrega' => now()
        ];
    }
}
