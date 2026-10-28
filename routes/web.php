<?php

use App\Http\Controllers\CategoriaController;
use App\Http\Controllers\ExerciciController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\RutinaController;
use Illuminate\Support\Facades\Route;

Route::get('/', HomeController::class);

Route::get('/home', function () {
    return view('home');
})->middleware(['auth', 'verified'])->name('dashboard');

// PERFIL
Route::middleware(['auth'])->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

// CATEGORIAS
Route::get('/categorias', [CategoriaController::class, 'index'])->middleware('auth')->name('categorias.index');
Route::get('/categorias/create', [CategoriaController::class, 'create'])->middleware(['auth','admin'])->name('categorias.create');
Route::post('/categorias', [CategoriaController::class, 'store'])->middleware(['auth','admin'])->name('categorias.store');
Route::get('/categorias/{id}', [CategoriaController::class, 'show'])->middleware('auth')->name('categorias.show');
Route::get('/categorias/{id}/edit', [CategoriaController::class, 'edit'])->middleware(['auth','admin'])->name('categorias.edit');
Route::put('/categorias/{id}', [CategoriaController::class, 'update'])->middleware(['auth','admin'])->name('categorias.update');
Route::delete('/categorias/{id}', [CategoriaController::class, 'destroy'])->middleware(['auth','admin'])->name('categorias.destroy');

// EXERCICIS
Route::get('/exercicis', [ExerciciController::class, 'index'])->middleware('auth')->name('exercicis.index');
Route::get('/exercicis/create', [ExerciciController::class, 'create'])->middleware(['auth','admin'])->name('exercicis.create');
Route::post('/exercicis', [ExerciciController::class, 'store'])->middleware(['auth','admin'])->name('exercicis.store');
Route::get('/exercicis/{id}', [ExerciciController::class, 'show'])->middleware('auth')->name('exercicis.show');
Route::get('/exercicis/{id}/edit', [ExerciciController::class, 'edit'])->middleware(['auth','admin'])->name('exercicis.edit');
Route::put('/exercicis/{id}', [ExerciciController::class, 'update'])->middleware(['auth','admin'])->name('exercicis.update');
Route::delete('/exercicis/{id}', [ExerciciController::class, 'destroy'])->middleware(['auth','admin'])->name('exercicis.destroy');

// RUTINAS
Route::middleware(['auth'])->group(function () {
    Route::get('/rutinas', [RutinaController::class, 'index'])->name('rutinas.index');
    Route::get('/rutinas/create', [RutinaController::class, 'create'])->name('rutinas.create');
    Route::post('/rutinas', [RutinaController::class, 'store'])->name('rutinas.store');
    Route::get('/rutinas/{id}', [RutinaController::class, 'show'])->name('rutinas.show');
    Route::get('/rutinas/{id}/edit', [RutinaController::class, 'edit'])->name('rutinas.edit');
    Route::put('/rutinas/{id}', [RutinaController::class, 'update'])->name('rutinas.update');
    Route::delete('/rutinas/{id}', [RutinaController::class, 'destroy'])->name('rutinas.destroy');
    Route::post('/rutinas/{rutinaId}/addexercise', [RutinaController::class, 'addExercise'])->name('rutinas.addExercise');
    Route::delete('/rutinas/{rutinaId}/removeexercise/{exerciciId}', [RutinaController::class, 'removeExercise'])->name('rutinas.removeExercise');
});

require __DIR__.'/auth.php';
