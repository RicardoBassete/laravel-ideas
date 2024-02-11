<?php

namespace App\Http\Controllers;

use App\Http\Requests\CreateIdeaRequest;
use App\Http\Requests\UpdateIdeaRequest;
use App\Models\Idea;
use Auth;

class IdeaController extends Controller
{
  public function store(CreateIdeaRequest $request) {

		$validated = $request->validated();

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

	public function update($id, UpdateIdeaRequest $request) {
		$idea = Idea::find($id);
		$this->authorize('update', $idea);

		$validated = $request->validated();

		$idea->update($validated);

		return redirect()->route('ideas.show', $id)->with('success', 'Idea Updated Successfully!');

	}
}
