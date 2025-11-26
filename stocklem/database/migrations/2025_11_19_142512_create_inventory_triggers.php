<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Support\Facades\DB;

return new class extends Migration
{
    public function up(): void
    {
        $triggers = [
            // Primero los que no dependen de otros
            'trg_create_initial_entry.sql',
            // Luego los de actualización de stock
            'trg_article_entry_insert.sql',
            'trg_article_entry_update.sql',
            'trg_article_issue_insert.sql',
            'trg_article_issue_update.sql',
        ];

        foreach ($triggers as $triggerFile) {
            $path = database_path("scripts/triggers/{$triggerFile}");
            DB::unprepared(file_get_contents($path));
        }
    }

    public function down(): void
    {
        // Orden inverso de eliminación
        DB::unprepared('DROP TRIGGER IF EXISTS trg_article_issue_update');
        DB::unprepared('DROP TRIGGER IF EXISTS trg_article_issue_insert');
        DB::unprepared('DROP TRIGGER IF EXISTS trg_article_entry_update');
        DB::unprepared('DROP TRIGGER IF EXISTS trg_article_entry_insert');
        DB::unprepared('DROP TRIGGER IF EXISTS trg_create_initial_entry');
    }
};