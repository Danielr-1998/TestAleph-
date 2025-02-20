<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Aleph Manager</title>
</head>
<body>
    <nav>
        <ul>
            <li><a href="{{ route('home') }}">Inicio</a></li>
            <li><a href="{{ route('categories.index') }}">Categorías</a></li>
        </ul>
    </nav>

    <div class="container">
        @yield('content')  
    </div>
</body>
</html>
