<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        \App\Models\User::factory(10)->create();
        \App\Models\Cliente::factory(10)->create();
        \App\Models\Catalogo::factory(10)->create();
        \App\Models\Articulo::factory(10)->create();
        \App\Models\Pedido::factory(10)->create();
        \App\Models\pedido_articulo::factory(10)->create();
    }
}
