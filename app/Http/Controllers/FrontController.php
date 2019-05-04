<?php

namespace App\Http\Controllers;

use App\Event;
use Illuminate\Http\Request;

class FrontController extends Controller
{
	public function index () {
		$last_event = Event::orderBy('created_at', 'DESC')->limit(9)->get();
		$sub_title = 'Indonesia Fundraising Platform';

		return view('pages.home.index', compact('sub_title', 'last_event'));
	}
}
