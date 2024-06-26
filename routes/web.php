<?php

use App\Http\Controllers\CommentController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\FeedController;
use App\Http\Controllers\IdeaController;
use App\Http\Controllers\IdeaLikeController;
use App\Http\Controllers\UserController;
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

Route::get('/', 											[DashboardController::class, 'index']	)->name('dashboard');

Route::get('/feed', 									FeedController::class									)->name('feed')->middleware('auth');

Route::get('/ideas/{id}', 						[IdeaController::class, 'show']				)->name('ideas.show');
Route::get('/ideas/{id}/edit', 				[IdeaController::class, 'edit']				)->name('ideas.edit')->middleware('auth');
Route::post('/ideas', 								[IdeaController::class, 'store']			)->name('ideas.store')->middleware('auth');
Route::put('/ideas/{id}', 						[IdeaController::class, 'update']			)->name('ideas.update')->middleware('auth');
Route::delete('/ideas/{id}', 					[IdeaController::class, 'destroy']		)->name('ideas.destroy')->middleware('auth');

Route::post('/ideas/{id}/comments', 	[CommentController::class, 'store']		)->name('comments.store')->middleware('auth');

Route::get('/profile', 								[UserController::class, 'profile']		)->name('profile')->middleware('auth');
Route::get('/users/{id}', 						[UserController::class, 'show']				)->name('users.show');
Route::get('/users/{id}/edit', 				[UserController::class, 'edit']				)->name('users.edit')->middleware('auth');
Route::put('/users/{id}', 						[UserController::class, 'update']			)->name('users.update')->middleware('auth');

Route::post('/users/{id}/follow',			[UserController::class, 'follow']			)->name('users.follow')->middleware('auth');
Route::delete('/users/{id}/unfollow',	[UserController::class, 'unfollow']		)->name('users.unfollow')->middleware('auth');


Route::post('/ideas/{id}/like',				[IdeaLikeController::class, 'like']		)->name('ideas.like')->middleware('auth');
Route::delete('/ideas/{id}/unlike',		[IdeaLikeController::class, 'unlike']	)->name('ideas.unlike')->middleware('auth');

Route::get('/lang/{lang}',function(string $lang){
	App::setLocale($lang);
	Session::put('locale', $lang);
	return redirect()->back();
})->name('lang');

Route::get('/terms', 									function(){ return view('terms'); }		)->name('terms');
