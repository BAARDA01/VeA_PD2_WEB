<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\AuthorController;

Route::get('/', [HomeController::class, 'index']);

Route::get('/authors', [AuthorController::class, 'list']);

