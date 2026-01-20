<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     * Tabla pivote para relación muchos a muchos entre alumnos y materias
     * Nombre en orden alfabético: alumno_materia (Laravel convention)
     */
    public function up(): void
    {
        Schema::create('alumno_materia', function (Blueprint $table) {
            $table->id();
            $table->foreignId('alumno_id')->constrained('alumnos')->onDelete('cascade');
            $table->foreignId('materia_id')->constrained('materias')->onDelete('cascade');
            $table->decimal('nota', 4, 2)->nullable(); // Campo extra para la nota del alumno
            $table->date('fecha_inscripcion')->nullable();
            $table->timestamps();

            // Índice único para evitar duplicados
            $table->unique(['alumno_id', 'materia_id']);
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('alumno_materia');
    }
};
