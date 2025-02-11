<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProductoController;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

/*Route::get('/productos', function () {
    $productos = [
        ['nombre' => 'laptop Gamer', 'precio' => 1200, 'descripcion' => 'Laptop para Gaming'],
        ['nombre' => 'Teclado Mecanico', 'precio' => 100, 'descripcion' => 'Teclado RGB con switches mecánicos.'],
        ['nombre' => 'Mouse inalámbrico', 'precio' => 50, 'descripcion' => 'Mouse ergonomico y recargable.'],
        ['nombre' => 'Silla Gaming', 'precio' => 500, 'descripcion' => 'Asiento de coche, con ruedas de silla de oficina a sobreprecio.']
    ];
    return view('productos.index', ['productos' => $productos]);
})->name('productos');*/



Route::get('/producto', [ProductoController::class, 'index'])->name('producto');


Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';

