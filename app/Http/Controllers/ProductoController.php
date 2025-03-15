<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Producto;

class ProductoController extends Controller
{
    // Mostrar todos los productos
    public function index()
    {
        $productos = Producto::all(); // Obtener todos los productos
        return view('productos.index', compact('productos'));
    }

    // Mostrar el formulario de creación
    public function create()
    {
        return view('productos.create');
    }

   // app/Http/Controllers/ProductoController.php
public function store(Request $request)
{
    // Validar los datos del formulario
    $request->validate([
        'nombre' => 'required|string|max:255',
        'marca' => 'required|string|max:255',
        'sostenibilidad' => 'required|integer|min:1|max:10',
        'codigo_barras' => 'required|string|unique:productos',
    ]);

    // Crear el producto en la base de datos
    Producto::create([
        'nombre' => $request->nombre,
        'marca' => $request->marca,
        'sostenibilidad' => $request->sostenibilidad,
        'codigo_barras' => $request->codigo_barras,
    ]);

    // Redirigir a la lista de productos con un mensaje de éxito
    return redirect()->route('productos.index')->with('success', 'Producto creado correctamente.');
}

    // Mostrar un producto específico
    public function show(Producto $producto)
    {
        return view('productos.show', compact('producto'));
    }

    // Mostrar el formulario de edición
    public function edit(Producto $producto)
    {
        return view('productos.edit', compact('producto'));
    }

    // Actualizar un producto
    public function update(Request $request, Producto $producto)
    {
        $request->validate([
            'nombre' => 'required|string|max:255',
            'marca' => 'required|string|max:255',
            'sostenibilidad' => 'required|integer|min:1|max:10',
            'codigo_barras' => 'required|string|unique:productos,codigo_barras,' . $producto->id,
        ]);

        $producto->update($request->all()); // Actualizar el producto
        return redirect()->route('productos.index')->with('success', 'Producto actualizado correctamente.');
    }

    // Eliminar un producto
    public function destroy(Producto $producto)
    {
        $producto->delete(); // Eliminar el producto
        return redirect()->route('productos.index')->with('success', 'Producto eliminado correctamente.');
    }
}