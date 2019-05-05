@extends('layouts.master.app')
  @section('sub_title', $sub_title)

  @section('content')
    <div class="container-fluid">
      <div class="card uper">
        <div class="card-header">
          Donate
        </div>
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
          {!! Form::open(['url' => route('donation.store', ['event_slug' => 'asalas'])]) !!}
		    	  @include($INC_DIR.'_form_donation')
		      {!! Form::close() !!}
        </div>
      </div>
    </div>
  @endsection