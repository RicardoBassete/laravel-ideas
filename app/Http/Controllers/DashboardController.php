<?php

namespace App\Http\Controllers;

use App\Models\Idea;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
	public function index(Request $request)
	{
		$ideas = Idea::orderBy('created_at', 'DESC');

		$search = $request->query('search');

		if($search) {
			$ideas = $ideas->where('content', 'like', "%$search%");
		}

		return view('dashboard', [
			'ideas' => $ideas->paginate(5)
		]);
	}


}
