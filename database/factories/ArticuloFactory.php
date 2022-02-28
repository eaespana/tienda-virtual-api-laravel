<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

class ArticuloFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'catalogo_id' => rand(1,10),
            'nombre_articulo' => $this->faker->name,
            'descripcion_articulo' => $this->faker->text(150),
            'cantidad_existencia' => rand(20,100)
        ];

    }
}
