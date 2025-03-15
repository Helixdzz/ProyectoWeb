<!-- resources/views/productos/edit.blade.php -->
@extends('layouts.app')

@section('content')
    <h1>Editar Producto</h1>
    <form action="{{ route('productos.update', $producto->id) }}" method="POST">
        @csrf
        @method('PUT')
        <div class="form-group">
            <label for="nombre">Nombre</label>
            <input type="text" name="nombre" class="form-control" value="{{ $producto->nombre }}" required>
        </div>
        <div class="form-group">
            <label for="marca">Marca</label>
            <input type="text" name="marca" class="form-control" value="{{ $producto->marca }}" required>
        </div>
        <div class="form-group">
            <label for="sostenibilidad">Sostenibilidad (1-10)</label>
            <input type="number" name="sostenibilidad" class="form-control" value="{{ $producto->sostenibilidad }}" min="1" max="10" required>
        </div>
        <div class="form-group">
            <label for="codigo_barras">Código de Barras</label>
            <input type="text" name="codigo_barras" class="form-control" value="{{ $producto->codigo_barras }}" required>
        </div>
        <button type="submit" class="btn btn-primary">Actualizar</button>
    </form>
@endsection