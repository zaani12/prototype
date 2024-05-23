<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\pkg_rh\PersonneController; 

// Define the namespace for controllers within the personne folder
$namespace = 'App\Http\Controllers\pkg_rh';

// Namespace all routes within this file
Route::namespace($namespace)->group(function () {
    Route::prefix('Apprenant')->group(function () {
        Route::get('/', [PersonneController::class, 'index'])->name('formateur.index');
        Route::get('/form-ajouter', [PersonneController::class, 'create'])->name('formateur.create');
        Route::post('/ajouter', [PersonneController::class, 'store'])->name('formateur.store');
        Route::get('/{id}', [PersonneController::class, 'show'])->name('formateur.show');
        Route::get('/{id}/edit', [PersonneController::class, 'edit'])->name('formateur.edit');
        Route::post('/{id}/update', [PersonneController::class, 'update'])->name('formateur.update');
        Route::delete('/{id}/delete', [PersonneController::class, 'delete'])->name('formateur.delete');
    });
});
