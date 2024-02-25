<?php

namespace App\Providers;

use App\Models\Theme;
use App\Models\User;
use Illuminate\Pagination\Paginator;
use Illuminate\Support\Facades\Cache;
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
		$topUsers = Cache::remember('topUsers', 60 * 5, function() {
			return User::withCount('ideas')->orderBy('ideas_count', 'DESC')->limit(5)->get();
		});

		$currentTheme = 'sketchy';
		if(Theme::count() > 0) {
			$currentTheme = Theme::first()->pluck('theme')->toArray()[0];
		}


		Paginator::useBootstrapFive();
		View::share('topUsers', $topUsers);
		View::share('currentTheme', $currentTheme);
	}
}
