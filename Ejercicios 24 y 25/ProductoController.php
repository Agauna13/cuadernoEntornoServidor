<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ProductoController extends Controller
{
    private $productos = [
        'laptop-gamer' => ['nombre' => 'Laptop Gamer', 'precio' => 1200, 'descripcion' => 'Laptop para Gaming.'],
        'teclado-mecanico' => ['nombre' => 'Teclado Mecánico', 'precio' => 100, 'descripcion' => 'Teclado RGB con switches mecánicos.'],
        'mouse-inalambrico' => ['nombre' => 'Mouse Inalámbrico', 'precio' => 50, 'descripcion' => 'Mouse ergonómico y recargable.'],
        'silla-gaming' => ['nombre' => 'Silla Gaming', 'precio' => 500, 'descripcion' => 'Asiento de coche, con ruedas de silla de oficina a sobreprecio.']
    ];

    public function index(Request $request)
    {
        $sessionProductos = $request->session()->get('productos', []);
        $productos = array_merge($this->productos, $sessionProductos);
        return view('productos.index', ['productos' => $productos]);
    }

    public function show(Request $request, $nombre)
    {
        $sessionProductos = $request->session()->get('productos', []);
        $allProductos = array_merge($this->productos, $sessionProductos);

        if (!array_key_exists($nombre, $allProductos)) {
            return redirect('/productos');
        }

        return view('productos.producto', ['producto' => $allProductos[$nombre]]);
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'nombre' => 'required|string|max:255',
            'precio' => 'required|numeric|min:0',
            'descripcion' => 'required|string',
        ]);

        $slug = strtolower(str_replace(' ', '-', $validated['nombre']));

        $sessionProductos = $request->session()->get('productos', []);
        $sessionProductos[$slug] = [
            'nombre' => $validated['nombre'],
            'precio' => $validated['precio'],
            'descripcion' => $validated['descripcion'],
        ];

        $request->session()->put('productos', $sessionProductos);

        return redirect()->route('productos.index');
    }
}
