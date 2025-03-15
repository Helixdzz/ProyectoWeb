<!-- resources/views/productos/create.blade.php -->
@extends('layouts.app')

@section('content')
    <h1>Crear Producto</h1>
    <form action="{{ route('productos.store') }}" method="POST">
        @csrf
        <div class="form-group">
            <label for="nombre">Nombre</label>
            <input type="text" name="nombre" class="form-control" required>
        </div>
        <div class="form-group">
            <label for="marca">Marca</label>
            <input type="text" name="marca" class="form-control" required>
        </div>
        <div class="form-group">
            <label for="sostenibilidad">Sostenibilidad (1-10)</label>
            <input type="number" name="sostenibilidad" class="form-control" min="1" max="10" required>
        </div>
        <div class="form-group">
            <label for="codigo_barras">Código de Barras</label>
            <input type="text" name="codigo_barras" class="form-control" required>
        </div>
        <button type="submit" class="btn btn-primary">Guardar</button>
    </form>
@endsection