<!-- resources/views/transportes/create.blade.php -->
@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Agregar Transporte</h1>
    <form action="{{ route('transportes.store') }}" method="POST">
        @csrf
        <div class="form-group">
            <label for="tipo">Tipo de Transporte</label>
            <input type="text" name="tipo" class="form-control" required>
        </div>
        <div class="form-group">
            <label for="huella_carbono_por_km">Huella de Carbono (por km)</label>
            <input type="number" step="0.01" name="huella_carbono_por_km" class="form-control" required>
        </div>
        <button type="submit" class="btn btn-primary">Guardar</button>
    </form>
</div>
@endsection