@extends('layouts.sidebar')

@section('content')
    <h1>Registros de la CMDB</h1>

    {{-- Esto imprimirá la variable cmdb y detendrá la ejecución de la vista --}}

    @if ($cmdb && isset($cmdb))  
        <table id="tableCmdb" class="display table table-bordered datatable">
            <thead>
                <tr>
                    <th>Identificador</th>
                    <th>Nombre</th>
                    <th>Categoría</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($cmdb as $record)
                    <tr>
                        <td>{{ $record->identificador }}</td>
                        <td>{{ $record->nombre }}</td>
                        <td>{{ $record->categoria_id }}</td>  
                    </tr>
                @endforeach
            </tbody>
        </table>
    @else
        <p>No se encontraron registros.</p>
    @endif
    @endsection
