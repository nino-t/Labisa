@extends('layouts.master.app')
  @section('sub_title', $sub_title)

  @section('content')
    <div class="container-fluid">
        <h1>Browse Event</h1>
        <table class="table table-bordered table-hovered">
          <thead>
            <tr>
              <th>Name</th>
              <th>Pembuat</th>
              <th>Action</th>
            </tr>
          </thead>
          <tbody>
            @forelse ($events as $event)
              <tr>
                <td>{{ $event->name }}</td>
                <td>{{ $event->userId->name }}</td>
                <td>
                  <a href="{{ route('event.edit', $event->id) }}" class="btn btn-success btn-sm">Edit</a>
                    {!! Form::open(['url' => route('event.destroy', $event->id) ]) !!}
                    {{ method_field('DELETE') }} 
                    <button type="submit" onclick="return confirm('delete this item??');" class="btn btn-danger btn-sm">
                      Hapus
                    </button>
                  {!! Form::close() !!}
                </td>
              </tr>
            @empty
              <tr>
                <td colspan="20" class="text-center">No data</td>
              </tr>
            @endforelse    
          </tbody>
        </table>
				
        {!! $events->links() !!}
    </div>
  @endsection