<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

class ClienteFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'user_id' => rand(1,10),
            'nombre_cliente' => $this->faker->name,
            'celular' => $this->faker->phoneNumber,
            'ciudad' => $this->faker->cityPrefix,
            'direccion' => $this->faker->Address
        ];
    }
}
