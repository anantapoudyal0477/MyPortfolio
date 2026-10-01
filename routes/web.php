<?php

use App\Http\Controllers\Viewer\IndexController;
use Illuminate\Support\Facades\Route;

Route::get('/', IndexController::class)->name('home');
