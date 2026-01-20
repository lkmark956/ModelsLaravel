<?php

namespace Database\Seeders;

use App\Models\Alumno;
use App\Models\Materia;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    use WithoutModelEvents;

    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // Crear materias
        $optativa = Materia::create([
            'nombre_materia' => 'Optativa',
            'descripcion' => 'Asignatura de libre configuración para ampliar conocimientos',
            'creditos' => 6,
            'codigo' => 'OPT001',
            'nivel' => 'intermedio',
        ]);

        $ingles = Materia::create([
            'nombre_materia' => 'Ingles',
            'descripcion' => 'Idioma inglés para el ámbito profesional y técnico',
            'creditos' => 4,
            'codigo' => 'ING001',
            'nivel' => 'basico',
        ]);

        $accesoADatos = Materia::create([
            'nombre_materia' => 'Acceso a datos',
            'descripcion' => 'Gestión y persistencia de datos en aplicaciones',
            'creditos' => 7,
            'codigo' => 'AD001',
            'nivel' => 'intermedio',
        ]);

        $desarrolloInterfaces = Materia::create([
            'nombre_materia' => 'Desarrollo de Interfaces',
            'descripcion' => 'Diseño y desarrollo de interfaces gráficas de usuario',
            'creditos' => 7,
            'codigo' => 'DI001',
            'nivel' => 'intermedio',
        ]);

        $sistemasGestion = Materia::create([
            'nombre_materia' => 'Sistemas de gestion empresarial',
            'descripcion' => 'Implementación y gestión de sistemas ERP y CRM',
            'creditos' => 6,
            'codigo' => 'SGE001',
            'nivel' => 'avanzado',
        ]);

        $itinerario = Materia::create([
            'nombre_materia' => 'Itinerario',
            'descripcion' => 'Proyecto integrador del ciclo formativo',
            'creditos' => 5,
            'codigo' => 'ITI001',
            'nivel' => 'avanzado',
        ]);

        // Crear alumnos
        $alumno1 = Alumno::create([
            'nombre' => 'Angel Luis',
            'apellidos' => 'Matador',
            'email' => 'angel.matador@estudiante.com',
            'fecha_nacimiento' => '2004-03-15',
            'telefono' => '612345678',
            'direccion' => 'Calle Principal 10, Sevilla',
        ]);

        $alumno2 = Alumno::create([
            'nombre' => 'Lorenzo',
            'apellidos' => 'Cruz Fernandez',
            'email' => 'lorenzo.cruz@estudiante.com',
            'fecha_nacimiento' => '2003-07-22',
            'telefono' => '623456789',
            'direccion' => 'Avenida de la Constitución 25, Sevilla',
        ]);

        $alumno3 = Alumno::create([
            'nombre' => 'Luis',
            'apellidos' => 'Capel Velazques',
            'email' => 'luis.capel@estudiante.com',
            'fecha_nacimiento' => '2004-11-08',
            'telefono' => '634567890',
            'direccion' => 'Plaza Nueva 5, Sevilla',
        ]);

        $alumno4 = Alumno::create([
            'nombre' => 'Mario',
            'apellidos' => 'Sanchez Ruiz',
            'email' => 'mario.sanchez@estudiante.com',
            'fecha_nacimiento' => '2003-05-18',
            'telefono' => '645678901',
            'direccion' => 'Calle Sierpes 42, Sevilla',
        ]);

        $alumno5 = Alumno::create([
            'nombre' => 'Juan',
            'apellidos' => 'Jimenez Nieto',
            'email' => 'juan.jimenez@estudiante.com',
            'fecha_nacimiento' => '2004-09-30',
            'telefono' => '656789012',
            'direccion' => 'Alameda de Hércules 88, Sevilla',
        ]);

        // Asignar materias a alumnos (relación muchos a muchos)
        // Angel Luis cursa: Optativa, Acceso a datos, Desarrollo de Interfaces, Sistemas de gestión
        $alumno1->materias()->attach($optativa->id, ['nota' => 8.50, 'fecha_inscripcion' => '2025-09-01']);
        $alumno1->materias()->attach($accesoADatos->id, ['nota' => 9.25, 'fecha_inscripcion' => '2025-09-01']);
        $alumno1->materias()->attach($desarrolloInterfaces->id, ['nota' => 8.75, 'fecha_inscripcion' => '2025-09-01']);
        $alumno1->materias()->attach($sistemasGestion->id, ['nota' => 7.50, 'fecha_inscripcion' => '2025-09-01']);

        // Lorenzo cursa: Ingles, Acceso a datos, Desarrollo de Interfaces, Itinerario
        $alumno2->materias()->attach($ingles->id, ['nota' => 9.00, 'fecha_inscripcion' => '2025-09-01']);
        $alumno2->materias()->attach($accesoADatos->id, ['nota' => 8.50, 'fecha_inscripcion' => '2025-09-01']);
        $alumno2->materias()->attach($desarrolloInterfaces->id, ['nota' => 9.25, 'fecha_inscripcion' => '2025-09-01']);
        $alumno2->materias()->attach($itinerario->id, ['nota' => 8.00, 'fecha_inscripcion' => '2025-09-15']);

        // Luis cursa: Optativa, Ingles, Acceso a datos, Itinerario
        $alumno3->materias()->attach($optativa->id, ['nota' => 7.50, 'fecha_inscripcion' => '2025-09-01']);
        $alumno3->materias()->attach($ingles->id, ['nota' => 6.75, 'fecha_inscripcion' => '2025-09-01']);
        $alumno3->materias()->attach($accesoADatos->id, ['nota' => 8.25, 'fecha_inscripcion' => '2025-09-01']);
        $alumno3->materias()->attach($itinerario->id, ['nota' => 7.80, 'fecha_inscripcion' => '2025-09-15']);

        // Mario cursa: Todas las materias
        $alumno4->materias()->attach($optativa->id, ['nota' => 9.50, 'fecha_inscripcion' => '2025-09-01']);
        $alumno4->materias()->attach($ingles->id, ['nota' => 10.00, 'fecha_inscripcion' => '2025-09-01']);
        $alumno4->materias()->attach($accesoADatos->id, ['nota' => 9.75, 'fecha_inscripcion' => '2025-09-01']);
        $alumno4->materias()->attach($desarrolloInterfaces->id, ['nota' => 9.80, 'fecha_inscripcion' => '2025-09-01']);
        $alumno4->materias()->attach($sistemasGestion->id, ['nota' => 9.25, 'fecha_inscripcion' => '2025-09-01']);
        $alumno4->materias()->attach($itinerario->id, ['nota' => 9.90, 'fecha_inscripcion' => '2025-09-15']);

        // Juan cursa: Optativa, Desarrollo de Interfaces, Sistemas de gestión
        $alumno5->materias()->attach($optativa->id, ['nota' => 8.00, 'fecha_inscripcion' => '2025-09-01']);
        $alumno5->materias()->attach($desarrolloInterfaces->id, ['nota' => 8.50, 'fecha_inscripcion' => '2025-09-01']);
        $alumno5->materias()->attach($sistemasGestion->id, ['nota' => 7.75, 'fecha_inscripcion' => '2025-09-01']);
    }
}
