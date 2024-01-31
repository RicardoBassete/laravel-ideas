<?php

namespace App\Http\Controllers;

use App\Models\Comment;
use App\Models\Idea;
use Illuminate\Http\Request;

class CommentController extends Controller
{
	public function index() {

	}

	public function create() {

	}

	public function store($id) {

		request()->validate([
			'content' => 'required|min:3|max:240'
		]);

		$comment = new Comment([
			'content' => request()->get('content'),
			'idea_id' => $id
		]);
		$comment->save();

		return redirect()->route('ideas.show', $id)->with('success', 'Comment posted successfully!');
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
