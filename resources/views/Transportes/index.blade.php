<!-- resources/views/transportes/index.blade.php -->
@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Lista de Transportes</h1>
    <a href="{{ route('transportes.create') }}" class="btn btn-primary mb-3">Agregar Transporte</a>
    <table class="table">
        <thead>
            <tr>
                <th>ID</th>
                <th>Tipo</th>
                <th>Huella de Carbono (por km)</th>
                <th>Acciones</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($transportes as $transporte)
            <tr>
                <td>{{ $transporte->id }}</td>
                <td>{{ $transporte->tipo }}</td>
                <td>{{ $transporte->huella_carbono_por_km }}</td>
                <td>
                    <a href="{{ route('transportes.edit', $transporte->id) }}" class="btn btn-warning">Editar</a>
                    <form action="{{ route('transportes.destroy', $transporte->id) }}" method="POST" style="display:inline;">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn btn-danger">Eliminar</button>
                    </form>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
</div>
@endsection