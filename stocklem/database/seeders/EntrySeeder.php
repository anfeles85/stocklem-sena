<?php

namespace Database\Seeders;

use App\Models\Article;
use App\Models\Entry;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class EntrySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Entry::insert([
            [
                'sena_code' => 'ENTRY-001',
                'date_entry' => '2025-11-15',
                'expiration_date' => '2025-11-24',
                'quantity' => 50,
                'observations' => 'Entrada inicial de antibiótico bovino',
                'article_id' => 1,
                'created_at' => now(),
                'updated_at' => now(),
                'user_id' => 1, 
            ],
            [
                'sena_code' => 'ENTRY-002',
                'date_entry' => '2025-11-20',
                'expiration_date' => '2025-11-25',
                'quantity' => 200,
                'observations' => 'Entrada de fertilizante NPK',
                'article_id' => 2,
                'created_at' => now(),
                'updated_at' => now(),
                'user_id' => 2, 
            ],
            [
                'sena_code' => 'ENTRY-003',
                'date_entry' => '2025-11-22',
                'expiration_date' => '2025-12-02',
                'quantity' => 100,
                'observations' => 'Semillas de maíz para temporada',
                'article_id' => 3,
                'created_at' => now(),
                'updated_at' => now(),
                'user_id' => 1, 
            ],
            [
                'sena_code' => 'ENTRY-004',
                'date_entry' => '2025-02-10',
                'expiration_date' => '2025-12-15',
                'quantity' => 150,
                'observations' => 'Concentrado para aves de engorde',
                'article_id' => 4,
                'created_at' => now(),
                'updated_at' => now(),
                'user_id' => 2, 
            ],
            [
                'sena_code' => 'ENTRY-005',
                'date_entry' => '2025-02-15',
                'expiration_date' => '2025-11-30',
                'quantity' => 40,
                'observations' => 'Insecticida para control de plagas',
                'article_id' => 5,
                'created_at' => now(),
                'updated_at' => now(),
                'user_id' => 1, 
            ],
            [
                'sena_code' => 'ENTRY-006',
                'date_entry' => '2025-03-01',
                'expiration_date' => '2026-03-01',
                'quantity' => 80,
                'observations' => 'Vitaminas para ganado lechero',
                'article_id' => 6,
                'created_at' => now(),
                'updated_at' => now(),
                'user_id' => 2, 
            ],
            [
                'sena_code' => 'ENTRY-007',
                'date_entry' => '2025-03-05',
                'expiration_date' => '2027-03-05',
                'quantity' => 60,
                'observations' => 'Herbicida selectivo para cultivos',
                'article_id' => 7,
                'created_at' => now(),
                'updated_at' => now(),
                'user_id' => 1, 
            ],
            [
                'sena_code' => 'ENTRY-008',
                'date_entry' => '2025-03-10',
                'expiration_date' => '2025-09-10',
                'quantity' => 200,
                'observations' => 'Alimento balanceado para porcinos',
                'article_id' => 8,
                'created_at' => now(),
                'updated_at' => now(),
                'user_id' => 2, 
            ],
            [
                'sena_code' => 'ENTRY-009',
                'date_entry' => '2025-03-15',
                'expiration_date' => '2027-03-15',
                'quantity' => 45,
                'observations' => 'Fungicida para protección de cultivos',
                'article_id' => 9,
                'created_at' => now(),
                'updated_at' => now(),
                'user_id' => 1, 
            ],
            [
                'sena_code' => 'ENTRY-010',
                'date_entry' => '2025-03-20',
                'expiration_date' => '2026-06-20',
                'quantity' => 120,
                'observations' => 'Suplemento mineral para ganado bovino',
                'article_id' => 10,
                'created_at' => now(),
                'updated_at' => now(),
                'user_id' => 2, 
            ],
        ]);
    }
}
