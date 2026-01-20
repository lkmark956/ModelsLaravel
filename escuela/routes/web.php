<?php

use Illuminate\Support\Facades\Route;
use App\Models\Alumno;
use App\Models\Materia;

// Rutas de prueba para alumnos y materias
Route::get('/', function () {
    return redirect('/alumnos');
});

Route::get('/alumnos', function () {
    $alumnos = Alumno::with('materias')->get();
    return view('alumnos.index', compact('alumnos'));
});

Route::get('/alumnos/{id}', function ($id) {
    $alumno = Alumno::with('materias')->findOrFail($id);
    return view('alumnos.show', compact('alumno'));
});

Route::get('/materias', function () {
    $materias = Materia::with('alumnos')->get();
    return view('materias.index', compact('materias'));
});

Route::get('/materias/{id}', function ($id) {
    $materia = Materia::with('alumnos')->findOrFail($id);
    return view('materias.show', compact('materia'));
});
