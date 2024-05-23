<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\pkg_rh\PersonneController; 

// Define the namespace for controllers within the personne folder
$namespace = 'App\Http\Controllers\Personne';

// Namespace all routes within this file
Route::namespace($namespace)->group(function () {
    Route::prefix('Apprenant')->group(function () {
        Route::get('/', [PersonneController::class, 'index'])->name('apprenant.index');
        Route::get('/form-ajouter', [PersonneController::class, 'create'])->name('apprenant.create');
        Route::post('/ajouter', [PersonneController::class, 'store'])->name('apprenant.store');
        Route::get('/{id}', [PersonneController::class, 'show'])->name('apprenant.show');
        Route::get('/{id}/edit', [PersonneController::class, 'edit'])->name('apprenant.edit');
        Route::post('/{id}/update', [PersonneController::class, 'update'])->name('apprenant.update');
        Route::delete('/{id}/delete', [PersonneController::class, 'delete'])->name('apprenant.delete');
    });
});
