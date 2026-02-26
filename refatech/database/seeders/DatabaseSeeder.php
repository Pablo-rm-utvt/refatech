<?php

namespace Database\Seeders;
use App\Models\Usuario;
use App\Models\Proveedor;
use App\Models\Producto;
use App\Models\Compra;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // User::factory(10)->create();
        Usuario::factory(50)->create();
        Proveedor::factory(50)->create();
        Producto::factory(100)->create();
        Compra::factory(200)->create();
    }
}
