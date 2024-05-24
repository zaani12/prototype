<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\pkg_competences\CompetenceController;
use App\Models\pkg_competences\Competence;

// routes for competence management
Route::middleware('auth')->group(function () {
    $namespace = 'App\Http\Controllers\pkg_competences';
    Route::namespace($namespace)->group(function () {
        Route::prefix('Competence')->group(function () {
            Route::get('/', [CompetenceController::class, 'index'])->name('competence.index');
            Route::get('/form-ajouter', [CompetenceController::class, 'create'])->name('competence.create');
            Route::post('/ajouter', [CompetenceController::class, 'store'])->name('competence.store');
            Route::get('/{id}', [CompetenceController::class, 'show'])->name('competence.show');
            Route::get('/{id}/edit', [CompetenceController::class, 'edit'])->name('competence.edit');
            Route::post('/{id}/update', [CompetenceController::class, 'update'])->name('competence.update');
            Route::delete('/{id}/delete', [CompetenceController::class, 'destroy'])->name('competence.delete');
        });
    });
});
