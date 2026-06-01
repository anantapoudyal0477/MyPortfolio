<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ContactController;
use App\Http\Controllers\ProjectController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\CoursesController;

//route for home page
Route::get('/', [HomeController::class, 'index'])->name("index");

//route for contact page
Route::prefix('/contact')->name('contact.')->group(function () {
    Route::get('/', [ContactController::class, 'index'])->name("index");
    Route::post('/submit', [ContactController::class, 'store'])->name("submit");
});

//route for projects page
Route::prefix('/projects')->name('projects.')->group(function () {
    Route::get('/projects', [ProjectController::class, 'index'])->name("index");
});

//route for courses page
Route::prefix('/courses')->name('courses.')->group(function(){
    Route::get('/', [CoursesController::class, 'index'])->name("index");
    Route::get('/{id}', [CoursesController::class, 'show'])->name("show");

}
);