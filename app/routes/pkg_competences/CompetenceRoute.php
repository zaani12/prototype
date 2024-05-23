<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\pkg_competences\CompetenceController;
use App\Models\pkg_competences\Competence;

// routes for competence management
Route::middleware('auth')->group(function () {
    Route::prefix('/')->group(function () {
        Route::resource('competences', CompetenceController::class);
        Route::get('competences/export', [CompetenceController::class, 'export'])->name('competences.export');
        Route::post('competences/import', [CompetenceController::class, 'import'])->name('competences.import');
    });
});
