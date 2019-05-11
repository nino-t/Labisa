@extends('layouts.master.app')
  @section('sub_title', $sub_title)

  @section('content')
    <div class="container">
      <div class="card uper">
        <div class="card-header">
          Change Password
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
          {!! Form::model($model, ['url' => route('account.change.password'), 'method' => 'PUT', 'files' => true]) !!} 
            @include($INC_DIR.'_form_change_password')
					{!! Form::close() !!}
        </div>
      </div>
    </div>
  @endsection