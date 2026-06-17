<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ContactController;
use App\Http\Controllers\ProjectController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\CoursesController;


use App\Http\Controllers\Auth\AdminLoginController;

use App\Http\Controllers\Admin\AdminController;
use App\Http\Controllers\Admin\CourseController as AdminCourseController;
use App\Http\Controllers\Admin\ContactController as AdminContactController;
use App\Http\Controllers\Admin\ProjectController as AdminProjectController;

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
// Route::prefix('/courses')->name('courses.')->group(function(){
//     Route::get('/', [CoursesController::class, 'index'])->name("index");
//     Route::get('/{id}', [CoursesController::class, 'show'])->name("show");

// }
// );



//route for admin login page
Route::prefix('/admin/login')->name('admin.auth.')->group(function () {


    Route::get('/', [AdminLoginController::class, 'index'])->name("login");
    Route::post('/logout', [AdminLoginController::class, 'logout'])->name("logout");
    Route::post('/submit', [AdminLoginController::class, 'login'])->name("login.submit");
});

//route for admin page
Route::prefix('/admin/')->middleware('admin')->name('admin.')->group(function () {
    Route::get('/',[AdminController::class, 'index'])->name("index");

    Route::prefix('/education')->name('education.')->group(function () {
        Route::get('/', [AdminController::class, 'index'])->name("index");
    });
    Route::prefix('/projects')->name('projects.')->group(function () {
        Route::get('/', [AdminProjectController::class, 'index'])->name("index");
        //edit,update,delete routes for projects
        //add
        Route::post('/', [AdminProjectController::class, 'store'])->name("store");
        Route::get('/{id}/edit', [AdminProjectController::class, 'edit'])->name("edit");
        Route::put('/{id}', [AdminProjectController::class, 'update'])->name("update");
        Route::delete('/{id}', [AdminProjectController::class, 'destroy'])->name("destroy");
    });
    Route::prefix('/courses')->name('courses.')->group(function () {
        Route::get('/', [AdminCourseController::class, 'index'])->name("index");
    });
    Route::prefix('/contacts')->name('contacts.')->group(function () {
        Route::get('/', [AdminContactController::class, 'index'])->name("index");
        Route::get('/{id}', [AdminContactController::class, 'show'])->name("show");
        Route::post('/{id}/reply', [AdminContactController::class, 'reply'])->name('contacts.reply');
    });

});