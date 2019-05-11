@extends('layouts.master.app', ['navbar_theme' => 'navbar-blue'])
  @section('sub_title', $sub_title)
  @section('content')
    <div class="container" style="margin-top: 30px; margin-bottom: 30px;">
      <div class="row">
        <div class="col-4">
          <div class="card" style="padding: 30px;">
            <div class="card-body text-center">
              <img src="{{ asset('/img/no-user.png') }}" class="img-circle" alt="logo-user" width="150" />
              <div style="margin: 20px 0px;">
                <b class="d-block">{{ Auth::user()->name }}</b>
                <small class="d-block">{{ Auth::user()->email }}</small>
              <p class="card-text">Terdaftar tgl: {{ Auth::user()->created_at->format('m/d/Y H:m') }}</p>
              </div>
            </div>
          </div> 
        </div>
        <div class="col-8">
          <div class="card">
            <div class="card-body">
              <b>Campaign yang telah dibuat:</b>
              <a href="{{ route('event.create') }}" class="btn btn-primary btn-sm">Buat Campaign</a>

              <table class="table table-hovered table-bordered mt-3">
                <thead>
                  <tr>
                    <th width="5">ID</th>
                    <th>Nama</th>
                    <th width="25%">Dibuat</th>
                    <th width="30%">Kendali</th>
                  </tr>
                </thead>
                <tbody>
                  @forelse ($events as $event)
                    <tr>
                      <td scope="row">{{ $event->id }}</td>
                      <td>{{ $event->name }}</td>
                      <td>{{ $event->created_at->format('d M Y H:m') }}</td>
                      <td> 
                        <a href="{{ route('event.view', $event->slug) }}" class="btn btn-default btn-sm">Lihat</a>
                        <a href="{{ route('event.edit', $event->id) }}" class="btn btn-success btn-sm">Ubah</a>
                        <a href="{{ route('event.destroy', $event->id) }}" class="btn btn-danger btn-sm">Hapus</a>
                      </td>
                    </tr>                      
                  @empty
                    <tr>
                      <td colspan="20" class="text-center">Data belum tersedia</td>
                    </tr>
                  @endforelse
                </tbody>
              </table>

              <div style="float:right;">
                {!! $events->links() !!}
              </div>
              <div class="clearfix"></div>
            </div>
          </div>
        </div>
      </div>
    </div>
  @endsection