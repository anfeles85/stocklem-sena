<?php

namespace Database\Seeders;

use App\Models\Presentation;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class PresentationSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Presentation::insert([
            ['description' => 'Botella de 500ml'],
            ['description' => 'Saco de 50kg'],
            ['description' => 'Caja de 20 unidades'],
            ['description' => 'Frasco de 100ml'],
            ['description' => 'Bolsa de 10kg'],
            ['description' => 'Garrafa de 5 litros'],
            ['description' => 'Paquete de 1kg'],
            ['description' => 'Tambor de 200 litros'],
            ['description' => 'Caja de 100 unidades'],
            ['description' => 'Saco de 25kg'],
        ]);
    }
}
