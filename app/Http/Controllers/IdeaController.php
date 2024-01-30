<?php

namespace App\Http\Controllers;

use App\Models\Idea;
use Illuminate\Http\Request;

class IdeaController extends Controller
{
  public function store(Request $request) {

		$request->validate([
			'content' => 'required|min:3|max:240'
		]);

		$idea = new Idea(['content' => $request->get('content')]);
		$idea->save();
		return redirect()->route('dashboard')->with('success', 'Idea Created Successfully!');
	}

	public function destroy($id) {

		Idea::findOrFail($id)->delete();

		return redirect()->route('dashboard')->with('success', 'Idea deleted Successfully!');
	}

	public function show($id) {
		$idea = Idea::find($id);
		$editing = false;

		return view('ideas.show', compact('idea', 'editing'));
	}

	public function edit($id) {
		$idea = Idea::find($id);
		$editing = true;

		return view('ideas.show', compact('idea', 'editing'));
	}

	public function update($id) {
		$idea = Idea::find($id);

		request()->validate([
			'content' => 'required|min:3|max:240'
		]);

		$idea->content = request()->get('content');
		$idea->save();
		return redirect()->route('ideas.show', $id)->with('success', 'Idea Updated Successfully!');

	}
}
