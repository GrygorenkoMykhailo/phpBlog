<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\PostsController;
use Illuminate\Support\Facades\Route;
use App\Http\Middleware\EnsureAuthenticated;

Route::get('/', function(){ return view('index'); });
Route::get('/register', function(){ return view('register'); });
Route::get('/login', function(){ return view('login'); });

Route::get('/unauthenticated', function() { return view('error.unauthenticated'); });
Route::get('/badrequest', function() { return view('error.badrequest'); });
Route::get('/notfound', function() { return view('error.notfound'); });

Route::post('/login', [AuthController::class, 'login']);
Route::post('/register', [AuthController::class, 'register']);

//Route::get('/user/{id}/posts', [UserController::class, 'getPosts'])->middleware(EnsureAuthenticated::class);
Route::get('/user/{id}/posts', [UserController::class, 'getPosts']);
Route::post('/user/{id}/posts/store', [PostsController::class, 'store']);
