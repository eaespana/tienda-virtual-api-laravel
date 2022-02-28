<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

class Pedido_articuloFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'articulo_id' => rand(1,10),
            'pedido_id' => rand(1,10),
            'cantidad_solicitada' => rand(1,10)
        ];
    }
}
