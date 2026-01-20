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
        Schema::create('materias', function (Blueprint $table) {
            $table->id();
            $table->string('nombre_materia', 100);
            $table->text('descripcion')->nullable();
            $table->integer('creditos')->default(6);
            $table->string('codigo', 20)->unique();
            $table->enum('nivel', ['basico', 'intermedio', 'avanzado'])->default('basico');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('materias');
    }
};
