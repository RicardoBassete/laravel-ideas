<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class AuthController extends Controller
{
	public function index() {
		return view('auth.register');
	}

	public function create() {

	}

	public function store(Request $request) {
		$validated = $request->validate([
			'name' => 'required|min:3|max:40',
			'email' => 'required|email|unique:users,email',
			'password' => 'required|confirmed|min:8',
		]);

		User::create([
			'name' => $validated['name'],
			'email' => $validated['email'],
			'password' => Hash::make($validated['password']),
		]);

		return redirect()->route('dashboard')->with('success', 'User created successfully!');
	}

	public function show() {

	}

	public function edit() {

	}

	public function update() {

	}

	public function destroy() {

	}

}
