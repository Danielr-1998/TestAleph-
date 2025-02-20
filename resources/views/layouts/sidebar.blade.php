<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>{{ config('app.name') }}</title>
    
    @include('includes.styles')
</head>
<body>
    <div class="d-flex">
        <div id="sidebar" class="bg-dark text-white p-3" style="width: 250px; height: 100vh; position: fixed;">
            <h3>{{ config('app.name') }}</h3>
            <ul class="nav flex-column">
            <li class="nav-item">
                    <a class="nav-link text-white" href="{{ route('home') }}">
                        <i class="fas fa-home"></i> Inicio
                    </a>
                </li>

                <li class="nav-item">
                    <a class="nav-link text-white" href="{{ route('categories.index') }}">
                        <i class="fas fa-folder"></i> Categorías
                    </a>
                </li>
            </ul>
        </div>

        <div id="content" class="ml-250 p-3" style="margin-left: 250px;">
            @yield('content') 
        </div>
    </div>

    @include('includes.scripts')
</body>
</html>
