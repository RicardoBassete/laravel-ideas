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
		$this->authorize('delete', $idea);

		$idea->delete();

		return redirect()->back()->with('success', 'Idea deleted Successfully!');
	}

	public function show($id) {
		$idea = Idea::find($id);

		return view('ideas.show', compact('idea'));
	}

	public function edit($id) {
		$idea = Idea::find($id);
		$this->authorize('update', $idea);

		return view('ideas.show', compact('idea'));
	}

	public function update($id) {
		$idea = Idea::find($id);
		$this->authorize('update', $idea);

		$validated = request()->validate([
			'content' => 'required|min:3|max:240'
		]);

		$idea->update($validated);

		return redirect()->route('ideas.show', $id)->with('success', 'Idea Updated Successfully!');

	}
}
