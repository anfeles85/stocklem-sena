<?php

namespace Database\Seeders;

use App\Models\Article;
use App\Models\Category;
use App\Models\Presentation;
use App\Models\Supplier;
use App\Models\Unit;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class ArticleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Article::insert([
            [
                'name' => 'Antibiótico Bovino',
                'quantity' => 100,
                'min_quantity' => 20,
                'photo' => null,
                'technical_sheet' => null,
                'presentation_id' => 1,
                'category_id' => 1,
                'supplier_id' => 1,
                'unit_id' => 1,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'name' => 'Fertilizante NPK 10-20-10',
                'quantity' => 500,
                'min_quantity' => 50,
                'photo' => null,
                'technical_sheet' => null,
                'presentation_id' => 2,
                'category_id' => 4,
                'supplier_id' => 3,
                'unit_id' => 1,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'name' => 'Semillas de Maíz Híbrido',
                'quantity' => 200,
                'min_quantity' => 30,
                'photo' => null,
                'technical_sheet' => null,
                'presentation_id' => 5,
                'category_id' => 10,
                'supplier_id' => 3,
                'unit_id' => 1,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'name' => 'Concentrado para Aves',
                'quantity' => 300,
                'min_quantity' => 40,
                'photo' => null,
                'technical_sheet' => null,
                'presentation_id' => 2,
                'category_id' => 2,
                'supplier_id' => 6,
                'unit_id' => 1,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'name' => 'Insecticida Agrícola',
                'quantity' => 80,
                'min_quantity' => 15,
                'photo' => null,
                'technical_sheet' => null,
                'presentation_id' => 1,
                'category_id' => 9,
                'supplier_id' => 2,
                'unit_id' => 2,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'name' => 'Vitaminas para Ganado',
                'quantity' => 150,
                'min_quantity' => 25,
                'photo' => null,
                'technical_sheet' => null,
                'presentation_id' => 4,
                'category_id' => 6,
                'supplier_id' => 4,
                'unit_id' => 2,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'name' => 'Herbicida Selectivo',
                'quantity' => 120,
                'min_quantity' => 20,
                'photo' => null,
                'technical_sheet' => null,
                'presentation_id' => 6,
                'category_id' => 9,
                'supplier_id' => 2,
                'unit_id' => 2,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'name' => 'Alimento Balanceado Porcinos',
                'quantity' => 400,
                'min_quantity' => 60,
                'photo' => null,
                'technical_sheet' => null,
                'presentation_id' => 2,
                'category_id' => 2,
                'supplier_id' => 6,
                'unit_id' => 1,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'name' => 'Fungicida para Cultivos',
                'quantity' => 90,
                'min_quantity' => 18,
                'photo' => null,
                'technical_sheet' => null,
                'presentation_id' => 1,
                'category_id' => 9,
                'supplier_id' => 2,
                'unit_id' => 2,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'name' => 'Suplemento Mineral Bovino',
                'quantity' => 250,
                'min_quantity' => 35,
                'photo' => null,
                'technical_sheet' => null,
                'presentation_id' => 5,
                'category_id' => 6,
                'supplier_id' => 4,
                'unit_id' => 1,
                'created_at' => now(),
                'updated_at' => now(),
            ],
        ]);
    }
}