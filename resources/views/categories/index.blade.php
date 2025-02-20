@extends('layouts.sidebar')

@section('content')
    <h1>Categorías</h1>

    <table id="categoriesTable" class="display table table-bordered datatable">
        <thead>
            <tr>
                <th>ID</th>
                <th>Nombre</th>
                <th>Código</th>
            </tr>
        </thead>
        <tbody>
            @if($categorias)
                @foreach ($categorias as $categoria)
                    <tr>
                    <td>
                    <a href="{{ route('categories.cmdb_records', $categoria->id) }}">{{ $categoria->id }}</a>
                </td>                        <td>{{ $categoria->nombre }}</td>
                        <td>{{ $categoria->codigo }}</td>
                    </tr>
                @endforeach
            @else
                <tr>
                    <td colspan="4">No se encontraron categorías.</td>
                </tr>
            @endif
        </tbody>
    </table>
@endsection
