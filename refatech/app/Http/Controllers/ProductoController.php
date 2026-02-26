<?php

namespace App\Http\Controllers;
use App\Models\Producto;
use App\Models\Proveedor;
use Illuminate\Http\Request;

class ProductoController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {   
        $proveedores=Proveedor::all();
        $productos = Producto::with('proveedor')->get();
        return view('productos.index',compact('productos','proveedores'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $proveedores=Proveedor::all();
        return view('productos.create',compact('proveedores'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'nombre_producto' => 'required|string|max:255',
            'descripcion' => 'required|string|max:255',
            'precio' => 'required|decimal:0,2',
            'stock' => 'required|integer',
            'proveedor_id' => 'required|exists:proveedor,id',
        ]);
        Producto::create($request->all());
        return redirect()->route('productos.index')->with('success', 'Producto creado exitosamente.');
    }

    /**
     * Display the specified resource.
     */
    public function show(Producto $producto)
    {
        return view('productos.show', compact('producto'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Producto $producto)
    {
        $proveedores=Proveedor::all();
        return view('productos.edit', compact('producto','proveedores'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Producto $producto)
    {
        $request->validate([
            'nombre_producto' => 'required|string|max:255',
            'descripcion' => 'required|string|max:255',
            'precio' => 'required|decimal:0,2',
            'stock' => 'required|integer',
            'proveedor_id' => 'required|exists:proveedor,id',
        ]);
        $producto->update($request->all());
        return redirect()->route('productos.index')->with('success', 'Producto actualizado exitosamente.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Producto $producto)
    {
        $producto->delete();
        return redirect()->route('productos.index')->with('success', 'Producto eliminado exitosamente.');
    }
}
