<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ClubController;
use App\Http\Controllers\Admin\AdminController;
use App\Http\Controllers\Admin\MiembrosController;
use App\Http\Controllers\Admin\EventosController;
use App\Http\Controllers\Admin\ProyectosController;

Route::get('/', [ClubController::class, 'index'])->name('home');
Route::post('/contacto', [ClubController::class, 'guardarContacto'])->name('contacto.guardar');

Route::middleware('auth')->group(function () {
    Route::get('/dashboard', function () {
        return view('dashboard');
    })->name('dashboard');
});

// Rutas de Admin
Route::middleware(['auth', 'admin'])->prefix('admin')->name('admin.')->group(function () {
    Route::get('/', [AdminController::class, 'index'])->name('dashboard');

    // Miembros
    Route::resource('miembros', MiembrosController::class);

    // Eventos
    Route::resource('eventos', EventosController::class);

    // Proyectos
    Route::resource('proyectos', ProyectosController::class);
});

require __DIR__.'/auth.php';
