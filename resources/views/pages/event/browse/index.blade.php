@extends('layouts.master.app', ['navbar_theme' => 'navbar-blue'])
  @section('sub_title', $sub_title)

  @section('content')
    <section style="border-bottom: 1px solid rgba(0,0,0,.1);">
      <div class="container"> 
        <div class="row">
          <div class="col-6">
            <h5>Halo #OrangBaik, </h5>
            <h5>Pilih campaign yang ingin Anda bantu</h5>
          </div>
          <div class="col-6">
            <form>
              <div class="row">
                <div class="col">
                  <div class="form-group">
                    <label>Kategori</label>
                    @php
                      $categories = App\Category::all()->pluck('name', 'id');
                      $categories[''] = '-- Semua Kategori--';
                    @endphp
                    {!! Form::select('category_id', $categories, null, ['class' => 'form-control']) !!}
                  </div>
                </div>
                <div class="col">
                  <div class="form-group">
                    <label>Kategori Tujuan</label>
                    @php
                      $categories = App\PurposeCategory::all()->pluck('name', 'id');
                      $categories[''] = '-- Semua Tujuan Campaign--';
                    @endphp
                    {!! Form::select('purpose_category_id', $categories, null, ['class' => 'form-control']) !!}
                  </div>
                </div>
              </div>
            </form>
          </div>
        </div>
      </div>      
    </section>

    <section class="_section_list_campaign">
      <div class="container">
        <p>Menampilkan {{ $total_event }} campaign dari {{ $category_event }}</p>
        <div class="row _section_body">
          @forelse ($events as $event)
            @php
              $total_dibutuhkan = intval($event->target_amount);
              $nominal_terkumpul = intval(App\LogDonation::where('event_id', $event->id)->sum('amount'));
              $persentase = ($nominal_terkumpul/$total_dibutuhkan)*100 . '%';
            @endphp

            <div class="col-4 __item mb-4">
              <div class="card">
                <a href="{{ route('event.view', $event->slug) }}">
                  @if (empty($event->thumbnail_url))
                    <img src="{{ asset('img/not-found.png') }}" class="img-responsive" alt="img-event" />
                  @else
                    @php
                      $_path_filename = '';
                      if (empty(strpos($event->thumbnail_url, 'http'))) {
                        $_path_filename = url('/storage') .'/'. $event->thumbnail_url;
                      } else {
                        $_path_filename = $event->thumbnail_url;
                      }
                    @endphp

                    <img src="{{ $_path_filename }}" class="img-responsive" alt="img-event" />
                  @endif
                </a>

                <div class="card-body">
                  <a href="{{ route('event.view', $event->slug) }}">
                    <h4>{{ $event->name }}</h4> 
                  </a>
                  <div class="__description__">
                    <div class="__username__">
                      <p>{{ $event->userId->name }}</p>
                      <img src="https://assets.kitabisa.com/images/icon__verified-org.svg" alt="img-official" height="20" />
                    </div>
                    <div class="__progress__">
                      <div class="progress">
                        <div class="progress-bar" role="progressbar" style="width: {{ $persentase }}" aria-valuenow="{{ $nominal_terkumpul }}" aria-valuemin="0" aria-valuemax="{{ $total_dibutuhkan }}"></div>
                      </div>
                    </div>
                    <div class="__money__">
                      <div class="_to">
                        <small>Terkumpul</small>
                        <p>Rp {{ number_format($nominal_terkumpul, 0, ',', '.') }}</p>
                      </div>
                      <div class="_from text-right">
                        <small>Sisa hari</small>
                        @php
                          $created = new \Carbon\Carbon($event->expired_date); 
                          $now = \Carbon\Carbon::now();
                          $difference = ($created->diff($now)->days < 1)
                              ? '0'
                              : $created->diffInDays($now);
                        @endphp
                        <p>{{ $difference }}</p>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
            </div>  
          @empty
            <h4 class="text-center" style="width:100%;">Campaign tidak ditemukan</h4>
          @endforelse
        </div>

        <div style="float:right;">
          {!! $events->links() !!}
        </div>
        <div class="clearfix"></div>
      </div> 
    </section>
  @endsection