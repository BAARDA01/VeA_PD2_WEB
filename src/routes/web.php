<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\AuthorController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\FilmaController;
use App\Http\Controllers\BookController;



Route::get('/', [HomeController::class, 'index']);


// Auth routes
Route::get('/login', [AuthController::class, 'login'])->name('login');
Route::post('/auth', [AuthController::class, 'authenticate']);
Route::get('/logout', [AuthController::class, 'logout']);

Route::get('/authors', [AuthorController::class, 'list']);

Route::get('/authors/create', [AuthorController::class, 'create']);
Route::post('/authors/put', [AuthorController::class, 'put']);

Route::get('/authors/update/{author}', [AuthorController::class, 'update']);
Route::post('/authors/patch/{author}', [AuthorController::class, 'patch']);

Route::post('/authors/delete/{author}', [AuthorController::class, 'delete']);

// Filmas
Route::get('/filmas', [FilmaController::class, 'list']);

Route::get('/filmas/create', [FilmaController::class, 'create']);
Route::post('/filmas/put', [FilmaController::class, 'put']);

Route::get('/filmas/update/{author}', [FilmaController::class, 'update']);
Route::post('/filmas/patch/{author}', [FilmaController::class, 'patch']);

Route::post('/filmas/delete/{author}', [FilmaController::class, 'delete']);


// Book routes
Route::get('/books', [BookController::class, 'list']);
Route::get('/books/create', [BookController::class, 'create']);
Route::post('/books/put', [BookController::class, 'put']);
Route::get('/books/update/{book}', [BookController::class, 'update']);
Route::post('/books/patch/{book}', [BookController::class, 'patch']);
Route::post('/books/delete/{book}', [BookController::class, 'delete']);
