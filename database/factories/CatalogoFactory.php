<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

class CatalogoFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'nombre_catalogo' => $this->faker->text(20),
            'descripcion_catalogo' => $this->faker->text(150)
        ];
    }
}
