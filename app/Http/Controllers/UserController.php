<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class UserController extends Controller
{
	public function show(string $id) {
		$user = User::find($id);
		$ideas = $user->ideas()->paginate(5);

		return view('users.show', compact('user', 'ideas'));
	}

	public function edit(string $id) {
		$user = User::find($id);
		$ideas = $user->ideas()->paginate(5);

		return view('users.show', compact('user', 'ideas'));
	}

	public function update(Request $request, string $id) {
		$user = User::find($id);
	}

}
