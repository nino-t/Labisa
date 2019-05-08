<?php

namespace App\Http\Controllers;

use Auth;
use App\Event;
use Illuminate\Http\Request;

class AccountController extends Controller
{
  public function __construct()
  {
    $this->middleware('auth');
  }

  public function dashboard() {
    $sub_title = 'Dashboard Akun Anda';
    $events = Event::where('user_id', Auth::user()->id)->orderBy('created_at', 'DESC')->paginate(10);
    return view('pages.account.dashboard', compact('sub_title', 'events'));
  }
}
