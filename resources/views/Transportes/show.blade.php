<!-- resources/views/transportes/show.blade.php -->
@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Detalles del Transporte</h1>
    <p><strong>ID:</strong> {{ $transporte->id }}</p>
    <p><strong>Tipo:</strong> {{ $transporte->tipo }}</p>
    <p><strong>Huella de Carbono (por km):</strong> {{ $transporte->huella_carbono_por_km }}</p>
    <a href="{{ route('transportes.index') }}" class="btn btn-secondary">Volver</a>
</div>
@endsection