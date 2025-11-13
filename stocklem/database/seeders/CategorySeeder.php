<?php

namespace Database\Seeders;

use App\Models\Category;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class CategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Category::insert([
            ['name' => 'Medicamentos',
            'description' => 'Productos farmacéuticos para el ganado y cultivos'],
            ['name' => 'Alimentos',
            'description' => 'Productos alimenticios para consumo animal y humano'],
            ['name' => 'Cultivos',
            'description' => 'Productos agrícolas y semillas'],
            ['name' => 'Fertilizantes',
            'description' => 'Productos para mejorar la fertilidad del suelo'],
            ['name' => 'Herramientas',
            'description' => 'Instrumentos y equipos para labores agrícolas'],
            ['name' => 'Suplementos',
            'description' => 'Suplementos vitamínicos y nutricionales para animales'],
            ['name' => 'Insumos Agrícolas',
            'description' => 'Insumos generales para producción agrícola'],
            ['name' => 'Equipos de Riego',
            'description' => 'Sistemas y equipos para irrigación de cultivos'],
            ['name' => 'Plaguicidas',
            'description' => 'Productos para el control de plagas y enfermedades'],
            ['name' => 'Semillas',
            'description' => 'Semillas certificadas para siembra de cultivos'],
        ]);
    }
}
