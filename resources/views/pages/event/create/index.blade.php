@extends('layouts.master.app')
  @section('sub_title', $sub_title)

  @section('content')
    <div class="container-fluid">
      <div class="card uper">
        <div class="card-header">
          Create Event
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
            <form method="post" action="{{ route('galangan.store') }}">
              @component('_input')
                @slot('label')
                  Name
                @endslot
              @endcomponent

              <div class="form-group">
                @csrf
                <label for="name">Book Name:</label>
                <input type="text" class="form-control" name="book_name"/>
              </div>
  
            <div class="form-group">
              <label for="price">Book ISBN Number :</label>
              <input type="text" class="form-control" name="isbn_no"/>
            </div>
            <div class="form-group">
              <label for="quantity">Book Price :</label>
              <input type="text" class="form-control" name="book_price"/>
            </div>
            <button type="submit" class="btn btn-primary">Create Book</button>
          </form>
        </div>
      </div>
    </div>
  @endsection