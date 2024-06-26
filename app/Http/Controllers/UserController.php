<?php

namespace App\Http\Controllers;

use App\Http\Requests\UpdateUserRequest;
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
		$this->authorize('update', $user);

		$ideas = $user->ideas()->paginate(5);

		return view('users.edit', compact('user', 'ideas'));
	}

	public function update(string $id, UpdateUserRequest $request) {
		$user = User::find($id);
		$this->authorize('update', $user);

		$validated = $request->validated();

		if($request->has('image')) {
			$imagePath = $request->file('image')->store('profile', 'public');
			$validated['image'] = $imagePath;

			$user->image && Storage::disk('public')->delete($user->image ?? '');
		}

		$user->update($validated);

		return redirect()->route('profile');
	}

	public function follow(string $id) {
		$currentUser = Auth::user();

		$currentUser->followings()->attach($id);

		return redirect()->route('users.show', $id)->with('success', 'Followed Successfully!');

	}

	public function unfollow(string $id) {
		$currentUser = Auth::user();

		$currentUser->followings()->detach($id);

		return redirect()->route('users.show', $id)->with('success', 'Unfollowed Successfully!');
	}

}
