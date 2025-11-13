<?php

namespace Database\Seeders;

use App\Models\Supplier;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class SupplierSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Supplier::insert([
            ['name' => 'Agroinsumos del Valle', 'phone' => '3111234567'],
            ['name' => 'Distribuidora Agropecuaria', 'phone' => '3129876543'],
            ['name' => 'Semillas y Fertilizantes S.A.', 'phone' => '3151234890'],
            ['name' => 'Veterinaria La Granja', 'phone' => '3187654321'],
            ['name' => 'Suministros Agrícolas Ltda', 'phone' => '3165432198'],
            ['name' => 'Concentrados Premium', 'phone' => '3143216789'],
            ['name' => 'Tecniagrícola', 'phone' => '3198765432'],
            ['name' => 'Insumos del Campo', 'phone' => '3176543219'],
            ['name' => 'AgroMundo S.A.S', 'phone' => '3132109876'],
            ['name' => 'Proveedora Pecuaria', 'phone' => '3189012345'],
        ]);
    }
}
