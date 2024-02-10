<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Auth;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
  public function index() {



		return view('admin.dahsboard');
	}
}
