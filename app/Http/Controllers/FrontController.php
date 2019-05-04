<?php

namespace App\Http\Controllers;

use App\Event;
use Illuminate\Http\Request;

class FrontController extends Controller
{
	const INC_DIR = 'pages.event._include.';
	
	public function index () {
    $limit_event = 9;
    $top_events = Event::orderBy('created_at', 'DESC')->limit(6)->get();
    $last_event = Event::orderBy('created_at', 'DESC')->limit($limit_event)->get();
		$sub_title = 'Indonesia Fundraising Platform';

    return view('pages.home.index', compact('sub_title', 'last_event', 'limit_event', 'top_events'));
  }
  
  public function eventList (Request $request) {
    $sub_title = 'Indonesia Fundraising Platform';
    $root_event = Event::whereNotNull('id');
    $category_event = 'Semua Kategori';

    if ($request->has('q')) {
      $events = $root_event->where('name', 'like', '%'.$request->q.'%')->orderBy('created_at', 'DESC')->paginate(9);
      $total_event = $root_event->where('name', 'like', '%'.$request->q.'%')->count();
    } else {
      $events = $root_event->orderBy('created_at', 'DESC')->paginate(9);
      $total_event = $root_event->count();
    }

		return view('pages.event.browse.index', compact('sub_title', 'events', 'total_event', 'category_event'));
  }

  public function eventView (Request $request) {
    $event = Event::where('slug', $request->event_slug)->first();
  }

  public function donation_store () {
	$data = $request->all();
	$data['user_id'] = Auth::user()->id;
	$data['event_id'] = Event::where('slug', $request->event_slug)->first()->id;
	$event = Event::create($data);
	return redirect()->route('event.index')->with('success', 'Donate is success');
  }

  public function donation () {
	$INC_DIR = self::INC_DIR;
	$sub_title = 'Donasi';
	return view('pages.donation.index', compact('sub_title', 'INC_DIR'));
}
}
