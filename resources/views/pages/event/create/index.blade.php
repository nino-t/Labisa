@extends('layouts.master.app', ['navbar_theme' => 'navbar-blue'])
  @section('sub_title', $sub_title)

  @section('content')
    <div class="container" style="margin-top: 30px; margin-bottom: 30px;">  
      <div class="row justify-content-center">
        <div class="col-md-6">
          <div class="card" style="margin-bottom: 20px;">
            <div class="card-body">
              @if ($errors->any())
                <div class="alert alert-danger">
                  <ul>
                    @foreach ($errors->all() as $error)
                      <li>{{ $error }}</li>
                    @endforeach
                  </ul>
                </div>
              @endif

              {!! Form::open(['url' => route('event.store'), 'files' => true]) !!}
                @include($INC_DIR.'_form')
              {!! Form::close() !!}
            </div>
          </div>
        </div>
      </div>
    </div>
  @endsection