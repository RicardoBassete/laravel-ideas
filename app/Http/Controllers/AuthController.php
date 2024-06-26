<?php

namespace App\Http\Controllers;

use App\Mail\WelcomeEmail;
use App\Models\User;
use Auth;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Mail;

class AuthController extends Controller
{
	public function login() {

		if(Auth::user()) {
			return redirect()->route('dashboard');
		}

		return view('auth.login');
	}


	public function authenticate() {

		$validated = request()->validate([
			'email' => 'required|email',
			'password' => 'required|min:8',
		]);

		if(Auth::attempt($validated)) {
			request()->session()->regenerate();

			return redirect()->route('dashboard')->with('success', 'Logged in successfully!');
		}

		return redirect()->route('login')->withErrors([
			'email' => 'No matching user found with the provided email and password'
		]);
	}

	public function register() {

		if(Auth::user()) {
			return redirect()->route('dashboard');
		}

		return view('auth.register');
	}

	public function store(Request $request) {
		$validated = $request->validate([
			'name' => 'required|min:3|max:40',
			'email' => 'required|email|unique:users,email',
			'password' => 'required|confirmed|min:8',
		]);

		$user = User::create([
			'name' => $validated['name'],
			'email' => $validated['email'],
			'password' => Hash::make($validated['password']),
		]);

		// Mail::to($user->email)->send(new WelcomeEmail($user));

		return redirect()->route('login.authenticate')->with('success', 'User created successfully!');
	}

	public function logout() {
		Auth::logout();
		request()->session()->invalidate();
		request()->session()->regenerateToken();

		return redirect()->route('dashboard')->with('success', 'Logged out successfully!');
	}

}
