<?php

namespace App\Http\Controllers;

use App\Models\Idea;
use Auth;
use Illuminate\Http\Request;

class IdeaController extends Controller
{
  public function store(Request $request) {

		$validated = $request->validate([
			'content' => 'required|min:3|max:240'
		]);

		$validated['user_id'] = Auth::user()->id;

		Idea::create($validated);

		return redirect()->back()->with('success', 'Idea Created Successfully!');
	}

	public function destroy($id) {
		$idea = Idea::findOrFail($id);

		if(Auth::user()->id !== $idea->user_id) {
			abort(404);
		}

		$idea->delete();

		return redirect()->back()->with('success', 'Idea deleted Successfully!');
	}

	public function show($id) {
		$idea = Idea::find($id);
		$editing = false;

		return view('ideas.show', compact('idea', 'editing'));
	}

	public function edit($id) {
		$idea = Idea::find($id);
		$editing = true;

		if(Auth::user()->id !== $idea->user_id) {
			abort(404);
		}

		return view('ideas.show', compact('idea', 'editing'));
	}

	public function update($id) {
		$idea = Idea::find($id);

		if(Auth::user()->id !== $idea->user_id) {
			abort(404);
		}

		$validated = request()->validate([
			'content' => 'required|min:3|max:240'
		]);

		$idea->update($validated);

		return redirect()->route('ideas.show', $id)->with('success', 'Idea Updated Successfully!');

	}
}
