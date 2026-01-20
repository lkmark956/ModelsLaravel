<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title', 'Sistema de Gestión Escolar')</title>
    <style>
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }
        body {
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
            background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
            min-height: 100vh;
            padding: 20px;
        }
        .container {
            max-width: 1200px;
            margin: 0 auto;
            background: white;
            border-radius: 10px;
            box-shadow: 0 10px 40px rgba(0,0,0,0.2);
            padding: 30px;
        }
        h1 {
            color: #667eea;
            margin-bottom: 10px;
        }
        .subtitle {
            color: #666;
            margin-bottom: 30px;
            font-size: 14px;
        }
        .nav {
            display: flex;
            gap: 15px;
            margin-bottom: 30px;
            padding-bottom: 15px;
            border-bottom: 2px solid #e0e0e0;
        }
        .nav a {
            padding: 10px 20px;
            background: #667eea;
            color: white;
            text-decoration: none;
            border-radius: 5px;
            transition: background 0.3s;
        }
        .nav a:hover {
            background: #764ba2;
        }
        table {
            width: 100%;
            border-collapse: collapse;
            margin-top: 20px;
        }
        th, td {
            padding: 12px;
            text-align: left;
            border-bottom: 1px solid #e0e0e0;
        }
        th {
            background: #f5f5f5;
            color: #667eea;
            font-weight: bold;
        }
        tr:hover {
            background: #f9f9f9;
        }
        .badge {
            display: inline-block;
            padding: 4px 12px;
            border-radius: 12px;
            font-size: 12px;
            font-weight: bold;
        }
        .badge-basico { background: #4caf50; color: white; }
        .badge-intermedio { background: #ff9800; color: white; }
        .badge-avanzado { background: #f44336; color: white; }
        .nota {
            display: inline-block;
            padding: 4px 10px;
            border-radius: 12px;
            font-size: 12px;
            font-weight: bold;
            background: #4caf50;
            color: white;
        }
    </style>
</head>
<body>
    <div class="container">
        <h1>🎓 Sistema de Gestión Escolar</h1>
        <p class="subtitle">Gestión de alumnos, materias e inscripciones</p>
        
        <div class="nav">
            <a href="/alumnos">👨‍🎓 Alumnos</a>
            <a href="/materias">📚 Materias</a>
        </div>
        
        @yield('content')
    </div>
</body>
</html>
