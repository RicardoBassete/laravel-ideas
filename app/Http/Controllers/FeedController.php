<?php

namespace App\Http\Controllers;

use App\Models\Idea;
use Auth;
use Illuminate\Http\Request;

class FeedController extends Controller
{
	/**
	 * Handle the incoming request.
	 */
	public function __invoke(Request $request)
	{
		$followingIDs = Auth::user()->followings()->pluck('user_id');

		$ideas = Idea::whereIn('user_id', $followingIDs)->latest();

		$search = $request->query('search');

		if($search) {
			$ideas = $ideas->search($search);
		}

		return view('dashboard', [
			'ideas' => $ideas->paginate(10)
		]);
	}
}
