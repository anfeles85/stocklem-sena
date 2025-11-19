<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;

use App\Models\Article;
use App\Models\Issue;
use App\Models\Presentation;
use App\Models\Unit;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB; // <--- 1. IMPORTANTE: Agregar esto

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // 2. ACTIVAR MODO MANTENIMIENTO (Apagar Triggers)
        // Esto establece la variable que el trigger 'trg_create_initial_entry' va a revisar
        DB::unprepared('SET @DISABLE_TRIGGERS = 1;');

        // \App\Models\User::factory(10)->create();

        // \App\Models\User::factory()->create([
        //     'name' => 'Test User',
        //     'email' => 'test@example.com',
        // ]);
        
        $this->call(RoleSeeder::class);
        $this->call(UserSeeder::class);
        $this->call(PersonSeeder::class);
        $this->call(CategorySeeder::class);
        $this->call(SupplierSeeder::class);
        $this->call(PresentationSeeder::class);
        $this->call(UnitSeeder::class);
        
        // Al ejecutar este, el trigger verá la variable @DISABLE_TRIGGERS en 1
        // y NO creará la entrada automática duplicada.
        $this->call(ArticleSeeder::class); 
        
        $this->call(EntrySeeder::class);
        $this->call(IssueSeeder::class);

        // 3. DESACTIVAR MODO MANTENIMIENTO (Encender Triggers)
        // Es vital volver a dejarlo en NULL o 0 para que la app funcione normal después
        DB::unprepared('SET @DISABLE_TRIGGERS = NULL;');
    }
}