<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Aleph Manager</title>
    <!-- Agrega tus estilos CSS aquí -->
</head>
<body>
    <!-- Menú de navegación -->
    <nav>
        <ul>
            <li><a href="{{ route('home') }}">Inicio</a></li>
            <li><a href="{{ route('categories.index') }}">Categorías</a></li>
        </ul>
    </nav>

    <!-- Contenido principal -->
    <div class="container">
        @yield('content')  <!-- Aquí se mostrará el contenido de las vistas hijas -->
    </div>
</body>
</html>
