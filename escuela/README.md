# Sistema de Gestión Escolar - Laravel

Proyecto Laravel que implementa un sistema de gestión de alumnos y materias con relación muchos a muchos.

## 📋 Requisitos Previos

- PHP >= 8.2
- Composer
- SQLite (o MySQL/PostgreSQL si lo prefieres)

## 🚀 Instalación y Configuración

Sigue estos pasos para poner en marcha el proyecto:

### 1. Clonar el repositorio
```bash
git clone https://github.com/lkmark956/ModelsLaravel.git
cd ModelsLaravel/escuela
```

### 2. Instalar dependencias de PHP
```bash
composer install
```

### 3. Configurar el archivo de entorno
```bash
# En Windows PowerShell:
copy .env.example .env

# En Linux/Mac:
cp .env.example .env
```

### 4. Generar la clave de la aplicación
```bash
php artisan key:generate
```

### 5. Crear la base de datos SQLite
```bash
# En Windows PowerShell:
New-Item -Path database -Name database.sqlite -ItemType File

# En Linux/Mac:
touch database/database.sqlite
```

### 6. Ejecutar las migraciones
```bash
php artisan migrate
```

## 🗂️ Estructura del Proyecto

### Modelos
- **Alumno** (`app/Models/Alumno.php`): Representa a los estudiantes
  - Campos: nombre, apellidos, email, fecha_nacimiento, telefono, direccion
  - Relación: muchos a muchos con Materia

- **Materia** (`app/Models/Materia.php`): Representa las asignaturas
  - Campos: nombre_materia, descripcion, creditos, codigo, nivel
  - Relación: muchos a muchos con Alumno

### Migraciones
- `2026_01_20_000001_create_alumnos_table.php`
- `2026_01_20_000002_create_materias_table.php`
- `2026_01_20_000003_create_alumno_materia_table.php` (tabla pivote)

### Tabla Pivote
La tabla `alumno_materia` incluye campos adicionales:
- `nota`: Calificación del alumno en la materia (decimal)
- `fecha_inscripcion`: Fecha de inscripción a la materia

## 🧪 Probar el Funcionamiento

### Opción 1: Usar Tinker (Recomendado)
```bash
php artisan tinker
```

Luego ejecuta:
```php
// Crear una materia
$matematicas = App\Models\Materia::create([
    'nombre_materia' => 'Matemáticas',
    'descripcion' => 'Curso de matemáticas básicas',
    'creditos' => 6,
    'codigo' => 'MAT101',
    'nivel' => 'basico'
]);

// Crear un alumno
$alumno = App\Models\Alumno::create([
    'nombre' => 'Juan',
    'apellidos' => 'Pérez García',
    'email' => 'juan@ejemplo.com',
    'fecha_nacimiento' => '2000-01-15',
    'telefono' => '612345678',
    'direccion' => 'Calle Principal 123'
]);

// Inscribir al alumno en la materia con nota
$alumno->materias()->attach($matematicas->id, [
    'nota' => 8.5,
    'fecha_inscripcion' => '2026-01-20'
]);

// Ver las materias del alumno
$alumno->materias;

// Ver los alumnos de la materia
$matematicas->alumnos;
```

### Opción 2: Script de Prueba
```bash
# Crear el script de prueba (ya existe en el repo como test_models.php)
php test_models.php
```

## 📊 Relaciones Implementadas

### Relación Muchos a Muchos
- Un **alumno** puede estar inscrito en muchas **materias**
- Una **materia** puede tener muchos **alumnos** inscritos
- La relación incluye datos adicionales (nota y fecha de inscripción)

### Uso de las relaciones:
```php
// Obtener materias de un alumno con sus notas
$alumno->materias()->withPivot('nota', 'fecha_inscripcion')->get();

// Obtener alumnos de una materia
$materia->alumnos;

// Acceder a los datos pivote
foreach ($alumno->materias as $materia) {
    echo $materia->pivot->nota;
    echo $materia->pivot->fecha_inscripcion;
}
```

## 🎓 Características Adicionales

- **Accessor en Alumno**: `nombre_completo` concatena nombre y apellidos
- **Validación**: Los campos email y código son únicos
- **Cascada**: Al eliminar un alumno o materia, se eliminan automáticamente sus relaciones

## 📝 Comandos Útiles

```bash
# Limpiar y recrear la base de datos
php artisan migrate:fresh

# Ver rutas disponibles
php artisan route:list

# Limpiar caché
php artisan cache:clear
php artisan config:clear
```

## 🛠️ Tecnologías Utilizadas

- Laravel 11.x
- PHP 8.2+
- SQLite
- Eloquent ORM

## 👨‍💻 Autor

Marco CC
