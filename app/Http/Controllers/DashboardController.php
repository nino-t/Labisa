<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class DashboardController extends Controller
{
  public function __construct()
  {
      $this->middleware('auth');
  }

  public function index() {
		$sub_title = 'Dashboard informasi bantuan';
		return view('pages.dashboard.index', compact('sub_title'));
  }
}
