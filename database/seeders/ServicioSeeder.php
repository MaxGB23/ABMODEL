<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Servicio;
use App\Models\Categoria;

class ServicioSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // Asegúrate de que existan categorías para asignar a los servicios
        Categoria::factory()->count(5)->create(); // Crea 5 categorías si aún no están creadas

        // Crear servicios y asignarles un `categoria_id` de forma aleatoria
        Servicio::factory()->count(10)->create([
            'categoria_id' => Categoria::inRandomOrder()->first()->id, // Obtiene un `categoria_id` aleatorio de las categorías existentes
        ]);
    }
}
