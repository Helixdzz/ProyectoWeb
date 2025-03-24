<!-- resources/views/transportes/edit.blade.php -->
@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Editar Transporte</h1>
    <form action="{{ route('transportes.update', $transporte->id) }}" method="POST">
        @csrf
        @method('PUT')
        <div class="form-group">
            <label for="tipo">Tipo de Transporte</label>
            <input type="text" name="tipo" class="form-control" value="{{ $transporte->tipo }}" required>
        </div>
        <div class="form-group">
            <label for="huella_carbono_por_km">Huella de Carbono (por km)</label>
            <input type="number" step="0.01" name="huella_carbono_por_km" class="form-control" value="{{ $transporte->huella_carbono_por_km }}" required>
        </div>
        <button type="submit" class="btn btn-primary">Actualizar</button>
    </form>
</div>
@endsection