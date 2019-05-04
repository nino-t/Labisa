<?php

namespace App\Http\Controllers;

use Auth;
use App\Event;
use Illuminate\Http\Request;
use App\Http\Requests\StoreEventRequest;

class EventController extends Controller
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
			$sub_title = 'Galang Dana Sekarang';
			$events = Event::orderBy('created_at', 'desc')->paginate(6);
      return view('pages.event.browse.index', compact('sub_title', 'INC_DIR', 'events'));			
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
      $INC_DIR = self::INC_DIR;
      $sub_title = 'Galang Dana Sekarang';
      return view('pages.event.create.index', compact('sub_title', 'INC_DIR'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreEventRequest $request)
    {
			$data = $request->all();
			$data['user_id'] = Auth::user()->id;
			$file = $request->file('thumbnail');
			$name = 'panji-tamzan.' . $file->getClientOriginalExtension();
			$path = $file->storeAs('/public/uploads/event', $name);

			$data['thumbnail_url'] = url('/').'/'.str_replace("public", "storage", $path);
			$event = Event::create($data);
			return redirect()->route('event.index')->with('success', 'Event is successfully saved');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Event  $event
     * @return \Illuminate\Http\Response
     */
    public function show(Event $event)
    {
      return $event->name;
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Event  $event
     * @return \Illuminate\Http\Response
     */
    public function edit(Event $event)
    {
      $INC_DIR = self::INC_DIR;
      $sub_title = 'Galang Dana Sekarang';
      $model = $event;
      return view('pages.event.edit.index', compact('sub_title', 'INC_DIR', 'model'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Event  $event
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Event $event)
    {
      $data = $request->all();
			$data['user_id'] = Auth::user()->id;
			$file = $request->file('thumbnail');
			$name = 'panji-tamzan.' . $file->getClientOriginalExtension();
			$path = $file->storeAs('/public/uploads/event', $name);

			$data['thumbnail_url'] = url('/').'/'.str_replace("public", "storage", $path);
			$event->update($data);
			return redirect()->route('event.index')->with('success', 'Event is successfully saved');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Event  $event
     * @return \Illuminate\Http\Response
     */
    public function destroy(Event $event)
    {
      $event->delete();
      return redirect('/event');
    }
}
