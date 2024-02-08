<?php

namespace App\Http\Controllers;

use App\Models\Idea;
use Illuminate\Http\Request;

class IdeaLikeController extends Controller
{
  public function like(string $id) {
		$idea = Idea::find($id);

	}

  public function unlike(string $id) {
		$idea = Idea::find($id);

	}
}
