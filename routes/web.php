<?php

use App\Http\Controllers\CommentController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\IdeaController;
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

Route::get('/', 										[DashboardController::class, 'index']	)->name('dashboard');

Route::get('/terms', 								function(){ return view('terms'); }		)->name('terms');

Route::get('/ideas/{id}', 					[IdeaController::class, 'show']				)->name('ideas.show');
Route::get('/ideas/{id}/edit', 			[IdeaController::class, 'edit']				)->name('ideas.edit')->middleware('auth');
Route::post('/ideas', 							[IdeaController::class, 'store']			)->name('ideas.store')->middleware('auth');
Route::put('/ideas/{id}', 					[IdeaController::class, 'update']			)->name('ideas.update')->middleware('auth');
Route::delete('/ideas/{id}', 				[IdeaController::class, 'destroy']		)->name('ideas.destroy')->middleware('auth');

Route::post('/ideas/{id}/comments', [CommentController::class, 'store']		)->name('comments.store')->middleware('auth');
