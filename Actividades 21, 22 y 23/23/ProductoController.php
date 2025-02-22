<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ProductoController extends Controller
{
    //
    public function index(){
        $productos = [
            ['nombre' => 'laptop Gamer', 'precio' => 1200, 'descripcion' => 'Laptop para Gaming'],
            ['nombre' => 'Teclado Mecanico', 'precio' => 100, 'descripcion' => 'Teclado RGB con switches mecánicos.'],
            ['nombre' => 'Mouse inalámbrico', 'precio' => 50, 'descripcion' => 'Mouse ergonomico y recargable.'],
            ['nombre' => 'Silla Gaming', 'precio' => 500, 'descripcion' => 'Asiento de coche, con ruedas de silla de oficina a sobreprecio.']
        ];
        return view('productos.index', ['productos' => $productos]);
    }
}
