<?php

namespace App\Http\Controllers;

use Auth;
use App\Accounts;
use App\Event;
use App\User;
use Illuminate\Http\Request;

class AccountController extends Controller
{
    const INC_DIR = 'pages.event._include.';

    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
      $INC_DIR = self::INC_DIR;
			$sub_title = 'Profile';
      return view('pages.account.index', compact('sub_title', 'INC_DIR'));			
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
      //
    }

    public function dashboard() {
      $sub_title = 'Dashboard Akun Anda';
      $events = Event::where('user_id', Auth::user()->id)->orderBy('created_at', 'DESC')->paginate(10);
      return view('pages.account.dashboard', compact('sub_title', 'events'));
    }

    public function store(StoreEventRequest $request)
    {
			//
    }

    public function show(Event $event)
    {
      //
    }

    public function edit(User $user)
    {
      $INC_DIR = self::INC_DIR;
      $sub_title = 'Profile Detail';
      $model = Auth::user();
      return view('pages.account.edit.index', compact('sub_title', 'INC_DIR', 'model'));
    }

    public function update(Request $request, User $user)
    {
      $data = $request->all();
      Auth::user()->update($data);
			return redirect()->route('account.index')->with('success', 'Account is successfully saved');
    }

    public function destroy(Event $event)
    {
      //
    }
}
