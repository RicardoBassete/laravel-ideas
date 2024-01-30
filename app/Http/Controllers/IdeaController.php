<?php

namespace App\Http\Controllers;

use App\Models\Idea;
use Illuminate\Http\Request;

class IdeaController extends Controller
{
  public function store(Request $request) {

		$request->validate([
			'idea' => 'required|min:3|max:240'
		]);

		$idea = new Idea(['content' => $request->get('idea')]);
		$idea->save();
		return redirect()->route('dashboard')->with('success', 'Idea created Successfully!');
	}

	public function destroy($id) {

		Idea::findOrFail($id)->delete();

		return redirect()->route('dashboard')->with('success', 'Idea deleted Successfully!');
	}

	public function show($id) {
		$idea = Idea::find($id);

		return view('ideas.show', ['idea' => $idea]);

	}
}
