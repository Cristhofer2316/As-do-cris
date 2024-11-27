<?php

use App\Http\Controllers\EventoController;
use App\Http\Controllers\ProfileController;
use App\Models\Evento;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::middleware(['auth'])->group(function () {
    Route::get('evento', [EventoController::class, 'index']);
    Route::get('evento/create', [EventoController::class, 'create']);
    Route::post('evento', [EventoController::class, 'store']);
    Route::get('evento/{id}/edit', [EventoController::class, 'edit']);
    Route::put('evento/{id}', [EventoController::class, 'update']);
    Route::delete('evento/{id}', [EventoController::class, 'destroy']);
});


Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';
