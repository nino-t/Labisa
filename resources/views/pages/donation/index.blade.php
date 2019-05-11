@extends('layouts.master.app', ['navbar_theme' => 'navbar-blue'])
  @section('sub_title', $sub_title)

  @section('content')
    <div class="container donation-page" style="margin-top: 30px;">
      <div class="row justify-content-center">
        <div class="col-md-6">
          <div class="card" style="margin-bottom: 20px;">
            <div class="card-body">
              <a href="{{ route('event.view', $event->slug) }}" class="row"> 
                <div class="col-3">
                  @if (empty($event->thumbnail_url))
                    <img src="{{ asset('img/not-found.png') }}" class="img-responsive __image__ donasi-event-img" alt="img-event" />
                  @else
                    @php
                      $_path_filename = '';
                      if (empty(strpos($event->thumbnail_url, 'http'))) {
                        $_path_filename = url('/storage') .'/'. $event->thumbnail_url;
                      } else {
                        $_path_filename = $event->thumbnail_url;
                      }
                    @endphp
        
                    <img src="{{ $_path_filename }}" class="img-responsive __image__ donasi-event-img" alt="img-event" />
                  @endif
                </div>
                <div class="col-9">
                  <p style="margin: 0; padding: 0;">Anda akan berdonasi untuk : </p>
                  <b>{{ $event->name }}</b>
                </div>
              </a>
            </div>
          </div>

          <div class="card _card_donation" style="margin-bottom: 50px;">
            <div class="card-body">
              @if ($errors->any())
                <div class="alert alert-danger">
                  <ul>
                      @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                      @endforeach
                  </ul>
                </div><br />
              @endif
              {!! Form::open(['url' => route('event.donation.store', ['event_slug' => $event->slug])]) !!}
                @include($INC_DIR.'_form_donation')
              {!! Form::close() !!}
            </div>
          </div>
        </div>
      </div>
    </div>
  @endsection