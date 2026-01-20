<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

class Materia extends Model
{
    use HasFactory;

    /**
     * La tabla asociada al modelo.
     */
    protected $table = 'materias';

    /**
     * Los atributos que son asignables en masa.
     */
    protected $fillable = [
        'nombre_materia',
        'descripcion',
        'creditos',
        'codigo',
        'nivel',
    ];

    /**
     * Relación muchos a muchos con Alumno.
     * Una materia puede tener muchos alumnos.
     */
    public function alumnos(): BelongsToMany
    {
        return $this->belongsToMany(Alumno::class, 'alumno_materia')
                    ->withPivot('nota', 'fecha_inscripcion')
                    ->withTimestamps();
    }
}
