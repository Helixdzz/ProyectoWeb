<?php

// app/Http/Controllers/TransporteController.php
namespace App\Http\Controllers;

use App\Models\Transporte;
use Illuminate\Http\Request;

class TransporteController extends Controller
{
    // Mostrar todos los transportes
    public function index()
    {
        $transportes = Transporte::all(); // Obtener todos los registros
        return view('transportes.index', compact('transportes'));
    }

    // Mostrar el formulario para crear un nuevo transporte
    public function create()
    {
        return view('transportes.create');
    }

    // Guardar un nuevo transporte en la base de datos
    public function store(Request $request)
    {
        $request->validate([
            'tipo' => 'required|string|max:255',
            'huella_carbono_por_km' => 'required|numeric',
        ]);

        Transporte::create($request->all()); // Crear el registro
        return redirect()->route('transportes.index')->with('success', 'Transporte creado correctamente.');
    }

    // Mostrar los detalles de un transporte específico
    public function show(Transporte $transporte)
    {
        return view('transportes.show', compact('transporte'));
    }

    // Mostrar el formulario para editar un transporte
    public function edit(Transporte $transporte)
    {
        return view('transportes.edit', compact('transporte'));
    }

    // Actualizar un transporte en la base de datos
    public function update(Request $request, Transporte $transporte)
    {
        $request->validate([
            'tipo' => 'required|string|max:255',
            'huella_carbono_por_km' => 'required|numeric',
        ]);

        $transporte->update($request->all()); // Actualizar el registro
        return redirect()->route('transportes.index')->with('success', 'Transporte actualizado correctamente.');
    }

    // Eliminar un transporte de la base de datos
    public function destroy(Transporte $transporte)
    {
        $transporte->delete(); // Eliminar el registro
        return redirect()->route('transportes.index')->with('success', 'Transporte eliminado correctamente.');
    }
}