@extends('layout')

@section('title', 'Lista de Alumnos')

@section('content')
    <h2>📋 Lista de Alumnos</h2>
    <p style="color: #666; margin: 10px 0 20px 0;">Total: <strong>{{ $alumnos->count() }}</strong> alumnos registrados</p>

    <table>
        <thead>
            <tr>
                <th>Nombre</th>
                <th>Email</th>
                <th>Teléfono</th>
                <th>Materias Cursadas</th>
                <th>Promedio</th>
            </tr>
        </thead>
        <tbody>
            @foreach($alumnos as $alumno)
            <tr>
                <td><strong>{{ $alumno->nombre }} {{ $alumno->apellidos }}</strong></td>
                <td>{{ $alumno->email }}</td>
                <td>{{ $alumno->telefono ?? 'N/A' }}</td>
                <td>{{ $alumno->materias->count() }}</td>
                <td>
                    @if($alumno->materias->count() > 0)
                        <span class="nota">{{ number_format($alumno->materias->avg('pivot.nota'), 2) }}</span>
                    @else
                        <span style="color: #999;">-</span>
                    @endif
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
@endsection
