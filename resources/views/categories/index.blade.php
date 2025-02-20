<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Categorías</title>
</head>
<body>
    <h1>Categorías</h1>

    @if ($categorias)
        <ul>
            @foreach ($categorias as $categoria)
                <li>
                    <strong>{{ $categoria->nombre }}</strong> <!-- Mostrar el nombre de la categoría -->
                    <ul>
                        @foreach ($categoria->campos_cmdb as $campo)
                            <li>{{ $campo }}</li> <!-- Mostrar los campos cmdb de la categoría -->
                        @endforeach
                    </ul>
                </li>
            @endforeach
        </ul>
    @else
        <p>No se encontraron categorías.</p>
    @endif
</body>
</html>
