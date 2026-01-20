@extends('layout')

@section('title', 'Lista de Materias')

@section('content')
    <h2>📚 Lista de Materias</h2>
    <p style="color: #666; margin: 10px 0 20px 0;">Total: <strong>{{ $materias->count() }}</strong> materias disponibles</p>

    <table>
        <thead>
            <tr>
                <th>Materia</th>
                <th>Código</th>
                <th>Créditos</th>
                <th>Nivel</th>
                <th>Alumnos Inscritos</th>
                <th>Promedio Clase</th>
            </tr>
        </thead>
        <tbody>
            @foreach($materias as $materia)
            <tr>
                <td><strong>{{ $materia->nombre_materia }}</strong></td>
                <td>{{ $materia->codigo }}</td>
                <td>{{ $materia->creditos }}</td>
                <td><span class="badge badge-{{ $materia->nivel }}">{{ strtoupper($materia->nivel) }}</span></td>
                <td>{{ $materia->alumnos->count() }}</td>
                <td>
                    @if($materia->alumnos->count() > 0)
                        <span class="nota">{{ number_format($materia->alumnos->avg('pivot.nota'), 2) }}</span>
                    @else
                        <span style="color: #999;">-</span>
                    @endif
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
@endsection
