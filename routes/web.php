<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\CommentController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\IdeaController;
use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;

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

Route::get('/', 										[DashboardController::class, 'index'])->name('dashboard');

Route::get('/terms', 								function(){ return view('terms'); })->name('terms');

Route::get('/ideas/{id}', 					[IdeaController::class, 'show'])->name('ideas.show');
Route::get('/ideas/{id}/edit', 			[IdeaController::class, 'edit'])->name('ideas.edit');
Route::post('/ideas', 							[IdeaController::class, 'store'])->name('ideas.store');
Route::put('/ideas/{id}', 					[IdeaController::class, 'update'])->name('ideas.update');
Route::delete('/ideas/{id}', 				[IdeaController::class, 'destroy'])->name('ideas.destroy');

Route::post('/ideas/{id}/comments', [CommentController::class, 'store'])->name('comments.store');

Route::get('/register', 						[AuthController::class, 'register'])->name('register');
Route::post('/register', 						[AuthController::class, 'store'])->name('register.store');

Route::get('/login', 								[AuthController::class, 'login'])->name('login');
Route::post('/login', 							[AuthController::class, 'authenticate'])->name('login.authenticate');
Route::post('/logout', 							[AuthController::class, 'logout'])->name('login.logout');

