<?php

namespace App\Http\Controllers;
use App\Models\Compra;
use App\Models\Producto;
use App\Models\Usuario;
use Illuminate\Http\Request;

class CompraController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {   
        $compras = Compra::with('usuario', 'producto')->get();
        return view('compras.index', compact('compras'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $usuarios = Usuario::all();
        $productos = Producto::all();
        return view('compras.create', compact('usuarios', 'productos'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'usuario_id' => 'required|exists:usuario,id',
            'producto_id' => 'required|exists:producto,id',
            'cantidad' => 'required|integer|min:1',
        ]);
        $producto = Producto::findOrFail($request->producto_id);
        $total = $producto->precio * $request->cantidad;
        $compra = Compra::create([
            'usuario_id' => $request->usuario_id,
            'producto_id' => $request->producto_id,
            'cantidad' => $request->cantidad,
            'total' => $total,
            'fecha_compra' => now(),
        ]);
        return redirect()->route('compras.index')->with('success', 'Compra realizada exitosamente.');
    }

    /**
     * Display the specified resource.
     */
    public function show(Compra $compra)
    {
        return view('compras.show', compact('compra'));
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Compra $compra)
    {
        $compra->delete();
        return redirect()->route('compras.index')->with('success', 'Compra eliminada exitosamente.');
    }
}
