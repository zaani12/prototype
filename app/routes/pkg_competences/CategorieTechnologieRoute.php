<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\pkg_competences\CategorieTechnologieController;

Route::middleware('auth')->group(function () {
    Route::put('CategorieTechnologie/{CategorieTechnologie}/update', [CategorieTechnologieController::class, 'update'])->name('CategorieTechnologie.update');
    Route::resource('CategorieTechnologie', CategorieTechnologieController::class);
});