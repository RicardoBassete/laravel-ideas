<?php

namespace App\Http\Controllers;

use App\Models\User;
use Auth;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class UserController extends Controller
{
	public function profile() {
		return $this->show(Auth::id());
	}

	public function show(string $id) {
		$user = User::find($id);
		$ideas = $user->ideas()->paginate(5);

		return view('users.show', compact('user', 'ideas'));
	}

	public function edit(string $id) {
		$user = User::find($id);
		$ideas = $user->ideas()->paginate(5);

		return view('users.edit', compact('user', 'ideas'));
	}

	public function update(string $id) {
		$user = User::find($id);
		$validated = request()->validate([
			'name' => 'required|min:3|max:40',
			'bio' => 'nullable|min:3|max:250',
			'image' => 'image'
		]);

		if(request()->has('image')) {
			$imagePath = request()->file('image')->store('profile', 'public');
			$validated['image'] = $imagePath;

			$user->image && Storage::disk('public')->delete($user->image);
		}

		$user->update($validated);

		return redirect()->route('profile');

	}

}