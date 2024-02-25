<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;

class AdminUserController extends Controller
{
  public function index() {
		$users = User::latest()->paginate(5);

		return view('admin.dahsboard', compact('users'));
	}
}
