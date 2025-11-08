<?php

namespace Database\Seeders;

use App\Models\Person;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class PersonSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Person::insert([
            ['document' => '1001111111', 'phone' => '3121111111', 'name' => 'Juan Martínez', 'status' => 'ACTIVO'],
            ['document' => '1001234567', 'phone' => '3124567890', 'name' => 'Carlos Pérez', 'status' => 'ACTIVO'],
            ['document' => '1002222222', 'phone' => '3122222222', 'name' => 'Ana López', 'status' => 'ACTIVO'],
            ['document' => '1003333333', 'phone' => '3123333333', 'name' => 'Luis Rodríguez', 'status' => 'ACTIVO'],
            ['document' => '1007654321', 'phone' => '3156781234', 'name' => 'María Gómez', 'status' => 'ACTIVO'],
            ['document' => '1004444444', 'phone' => '3144444444', 'name' => 'Pedro Sánchez', 'status' => 'ACTIVO'],
            ['document' => '1005555555', 'phone' => '3155555555', 'name' => 'Laura Torres', 'status' => 'INACTIVO'],
            ['document' => '1006666666', 'phone' => '3166666666', 'name' => 'Andrés Ramírez', 'status' => 'ACTIVO'],
            ['document' => '1008888888', 'phone' => '3188888888', 'name' => 'Sofia Vargas', 'status' => 'ACTIVO'],
            ['document' => '1009999999', 'phone' => '3199999999', 'name' => 'Diego Morales', 'status' => 'ACTIVO'],
        ]);
    }
}
