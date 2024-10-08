<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;
use App\Http\Controllers\BlogpostController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/
// User related routes  
Route::get('/', [UserController::class, "homepage"])->name('login');
Route::post('/register', [UserController::class, "register"])->middleware('guest');
Route::post('/login', [UserController::class, "login"])->middleware('guest');
Route::post('/logout', [UserController::class, "logout"])->middleware('mustBeLoggedIn');

// Blog post related routes
Route::get('/create-post', [BlogpostController::class, "showCreateBlogpostForm"])->middleware('mustBeLoggedIn');
Route::post('/create-post', [BlogpostController::class, "createBlogpost"])->middleware('mustBeLoggedIn');
Route::get('/blogpost/{post}', [BlogpostController::class, "showSingleBlogpost"]);

// Profile related routes
Route::get('/profile/{user:username}', [UserController::class, "profile"]);
