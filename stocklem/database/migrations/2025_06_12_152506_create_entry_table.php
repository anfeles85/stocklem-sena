<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('entry', function (Blueprint $table) {
            $table->id();
            $table->string('sena_code')->comment('codigo sena');
            $table->date('date')->comment('fecha entrada');
            $table->date('expiration_date')->comment('fecha expiracion');
            $table->integer('quantity')->comment('cantidad entrada');
            $table->text('observations')->comment('observaciones entrada');
            $table->foreignId('article_id')->constrained('article')->onDelete('cascade')->onUpdate('cascade')->comment('FK con articulo');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('entry');
    }
};
