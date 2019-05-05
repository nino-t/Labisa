<?php

namespace App\Http\Controllers;

use Auth;
use App\Accounts;
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

    public function store(StoreEventRequest $request)
    {
			//
    }

    public function show(Event $event)
    {
      //
    }

    public function edit(Event $event)
    {
      //
    }

    public function update(Request $request, Event $event)
    {
      //
    }

    public function destroy(Event $event)
    {
      //
    }
}
