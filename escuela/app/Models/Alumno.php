<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

class Alumno extends Model
{
    use HasFactory;

    /**
     * La tabla asociada al modelo.
     */
    protected $table = 'alumnos';

    /**
     * Los atributos que son asignables en masa.
     */
    protected $fillable = [
        'nombre',
        'apellidos',
        'email',
        'fecha_nacimiento',
        'telefono',
        'direccion',
    ];

    /**
     * Los atributos que deben ser convertidos a tipos nativos.
     */
    protected $casts = [
        'fecha_nacimiento' => 'date',
    ];

    /**
     * Relación muchos a muchos con Materia.
     * Un alumno puede cursar muchas materias.
     */
    public function materias(): BelongsToMany
    {
        return $this->belongsToMany(Materia::class, 'alumno_materia')
                    ->withPivot('nota', 'fecha_inscripcion')
                    ->withTimestamps();
    }

    /**
     * Obtener el nombre completo del alumno.
     */
    public function getNombreCompletoAttribute(): string
    {
        return "{$this->nombre} {$this->apellidos}";
    }
}
