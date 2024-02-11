<?php

use App\Http\Controllers\Admin\DashboardController;

Route::get('/admin', [DashboardController::class, 'index'])->name('admin.dashboard')->middleware(['auth'])->can('admin');

