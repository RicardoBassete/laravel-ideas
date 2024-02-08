<?php

namespace App\Http\Controllers;

use App\Models\Idea;
use Auth;
use Illuminate\Http\Request;

class IdeaLikeController extends Controller
{
  public function like(string $id) {
		$idea = Idea::find($id);
		$user = Auth::user();

		$user->likes()->attach($idea);

		return redirect()->route('ideas.show', $idea->id);
	}

  public function unlike(string $id) {
		$idea = Idea::find($id);
		$user = Auth::user();

		$user->likes()->detach($idea);

		return redirect()->route('ideas.show', $idea->id);
	}
}
