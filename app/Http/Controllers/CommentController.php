<?php

namespace App\Http\Controllers;

use App\Http\Requests\CreateCommentRequest;
use App\Models\Comment;
use App\Models\Idea;
use Auth;
use Illuminate\Http\Request;

class CommentController extends Controller
{
	public function store($id, CreateCommentRequest $request) {

		$validated = $request->validated();

		$validated['idea_id'] = $id;
		$validated['user_id'] = Auth::user()->id;

		Comment::create($validated);

		return redirect()->route('ideas.show', $id)->with('success', 'Comment posted successfully!');
	}
}
