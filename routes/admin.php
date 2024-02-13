<?php

use App\Http\Controllers\Admin\DashboardController;

Route::get('/admin', 				[DashboardController::class, 'index']		)->name('admin.dashboard'	)->middleware(['auth'])->can('admin');
Route::post('/admin/theme', [DashboardController::class, 'setTheme'])->name('admin.theme'			)->middleware(['auth'])->can('admin');
