<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\pkg_competences\CategorieTechnologieController;

Route::middleware('auth')->group(function () {
    Route::resource('CategorieTechnologie', CategorieTechnologieController::class);
});