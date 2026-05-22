<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ContactController;
use App\Http\Controllers\ProjectController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\ProgramController;

//route for home page
Route::get('/', [HomeController::class, 'index'])->name("index");

//route for contact page
Route::prefix('/contact')->name('contact.')->group(function () {
    Route::get('/', [ContactController::class, 'index'])->name("index");
    Route::get('/submit', [ContactController::class, 'submit'])->name("submit");
});

//route for projects page
Route::get('/projects', [ProjectController::class, 'index'])->name("projects");

//route for programs page
Route::get('/programs', [ProgramController::class, 'index'])->name("programs");