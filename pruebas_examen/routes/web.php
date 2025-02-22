<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\ProductController;
use Illuminate\Support\Facades\Route;


/*
|Las rutas son lo primero que se carga al acceder a una aplicacion web de laravel.
|Éstas rutas se definen en la carpeta Routes que contendrá entre otros, éste fichero, auth.php y console.php.
|Nos centraremos en este web.php para las actividades presentes.
*/

Route::get('/', function () {
    return view('welcome');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});


Route::resource('products', ProductController::class);


require __DIR__.'/auth.php';
