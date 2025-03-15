<!-- resources/views/productos/show.blade.php -->
@extends('layouts.app')

@section('content')
    <h1>Detalles del Producto</h1>
    <p><strong>Nombre:</strong> {{ $producto->nombre }}</p>
    <p><strong>Marca:</strong> {{ $producto->marca }}</p>
    <p><strong>Sostenibilidad:</strong> {{ $producto->sostenibilidad }}</p>
    <p><strong>Código de Barras:</strong> {{ $producto->codigo_barras }}</p>
    <a href="{{ route('productos.index') }}" class="btn btn-secondary">Volver</a>
@endsection