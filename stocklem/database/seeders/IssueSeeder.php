<?php

namespace Database\Seeders;

use App\Models\Article;
use App\Models\Issue;
use App\Models\Person;
use App\Models\Unit;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class IssueSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Issue::insert([
            [
                'sena_code' => 'ISSUE-001',
                'date_issue' => '2025-01-20',
                'quantity' => 10,
                'observations' => 'Salida para tratamiento de ganado',
                'article_id' => 1,
                'person_id' => 1,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'sena_code' => 'ISSUE-002',
                'date_issue' => '2025-02-05',
                'quantity' => 50,
                'observations' => 'Fertilización de cultivo de maíz',
                'article_id' => 2,
                'person_id' => 2,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'sena_code' => 'ISSUE-003',
                'date_issue' => '2025-02-12',
                'quantity' => 30,
                'observations' => 'Siembra de maíz parcela norte',
                'article_id' => 3,
                'person_id' => 3,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'sena_code' => 'ISSUE-004',
                'date_issue' => '2025-02-18',
                'quantity' => 40,
                'observations' => 'Alimentación aves de corral',
                'article_id' => 4,
                'person_id' => 4,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'sena_code' => 'ISSUE-005',
                'date_issue' => '2025-02-22',
                'quantity' => 15,
                'observations' => 'Control de plagas en cultivo',
                'article_id' => 5,
                'person_id' => 5,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'sena_code' => 'ISSUE-006',
                'date_issue' => '2025-03-05',
                'quantity' => 20,
                'observations' => 'Suplementación ganado lechero',
                'article_id' => 6,
                'person_id' => 6,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'sena_code' => 'ISSUE-007',
                'date_issue' => '2025-03-08',
                'quantity' => 25,
                'observations' => 'Control de maleza en cultivo',
                'article_id' => 7,
                'person_id' => 8,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'sena_code' => 'ISSUE-008',
                'date_issue' => '2025-03-12',
                'quantity' => 60,
                'observations' => 'Alimentación porcinos en crecimiento',
                'article_id' => 8,
                'person_id' => 9,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'sena_code' => 'ISSUE-009',
                'date_issue' => '2025-03-18',
                'quantity' => 18,
                'observations' => 'Prevención hongos en cultivo',
                'article_id' => 9,
                'person_id' => 10,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'sena_code' => 'ISSUE-010',
                'date_issue' => '2025-03-22',
                'quantity' => 35,
                'observations' => 'Suplemento mineral para vacas',
                'article_id' => 10,
                'person_id' => 1,
                'created_at' => now(),
                'updated_at' => now(),
            ],
        ]);
    }
}
