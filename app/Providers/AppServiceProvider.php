<?php

namespace App\Providers;

use App\Models\User;
use Illuminate\Pagination\Paginator;
use Illuminate\Support\ServiceProvider;
use View;

class AppServiceProvider extends ServiceProvider
{
	/**
	 * Register any application services.
	 */
	public function register(): void
	{
		//
	}

	/**
	 * Bootstrap any application services.
	 */
	public function boot(): void
	{
		$topUsers = User::withCount('ideas')->orderBy('ideas_count', 'DESC')->limit(5)->get();

		Paginator::useBootstrapFive();
		View::share('topUsers', $topUsers);
	}
}
