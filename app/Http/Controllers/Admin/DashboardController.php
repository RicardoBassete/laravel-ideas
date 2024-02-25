<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Theme;
use Auth;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Gate;

class DashboardController extends Controller
{
  public function index() {

		$themes = [
			'lux',
			'morph',
			'quartz',
			'sketchy',
			'vapor',
			'united'
		];

		return view('admin.dahsboard', compact('themes'));
	}

	public function setTheme(Request $request) {
		$currentTheme = Theme::first();
		$currentTheme->theme = $request->get('theme');
		$currentTheme->save();
		return redirect()->route('admin.theme');
	}
}
