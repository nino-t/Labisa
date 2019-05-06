@extends('layouts.master.app', ['navbar_theme' => 'navbar-blue'])
  @section('sub_title', $sub_title)

  @section('content')
    <section class="_background_silver">
      <div class="container">
        <div class="row">
          <div class="col-12">
            <div class="event-detail __heading">
              <h3 class="__title__">{{ $event->name }}</h3>
            </div>      
          </div>
  
          <div class="col-8">
            <div class="event-detail __heading">
              @if (empty($event->thumbnail_url))
                <img src="{{ asset('img/not-found.png') }}" class="img-responsive __image__" alt="img-event" />
              @else
                @php
                  $_path_filename = '';
                  if (empty(strpos($event->thumbnail_url, 'http'))) {
                    $_path_filename = url('/storage') .'/'. $event->thumbnail_url;
                  } else {
                    $_path_filename = $event->thumbnail_url;
                  }
                @endphp
    
                <img src="{{ $_path_filename }}" class="img-responsive __image__" alt="img-event" />
              @endif
    
              <p class="__message__">{{ $event->message }}</p>
            </div>
          </div>
          <div class="col-4">
            <div class="event-detail __heading">
              @php
                $total_dibutuhkan = intval($event->target_amount);
                $nominal_terkumpul = intval(App\LogDonation::where('event_id', $event->id)->sum('amount'));
                $persentase = ($nominal_terkumpul/$total_dibutuhkan)*100 . '%';
              @endphp
              <h3 class="__price__">Rp {{ number_format($nominal_terkumpul, 0, ',', '.') }}</h3>
              <p class="__price_info__">terkumpul dari Rp {{ number_format($event->target_amount, 0, ',', '.') }}</p>
              <div class="__progress__">
                <div class="progress">
                  <div class="progress-bar" role="progressbar" style="width: {{ $persentase }}" aria-valuenow="{{ $nominal_terkumpul }}" aria-valuemin="0" aria-valuemax="{{ $total_dibutuhkan }}"></div>
                </div>
              </div>
              <div class="__money__">
                <div class="_to">
                  <p><b>{{ $persentase }}</b> tercapai</p>
                </div>
                <div class="_from text-right">
                  @php
                    $created = new \Carbon\Carbon($event->expired_date); 
                    $now = \Carbon\Carbon::now();
                    $difference = ($created->diff($now)->days < 1)
                        ? '0'
                        : $created->diffInDays($now);
                  @endphp
                  <p><b>{{ $difference }}</b> hari lagi</p>
                </div>
              </div>
              <a href="#" class="btn btn-danger btn-lg" style="width: 100%;">DONASI SEKARANG</a>
              <div class="__start_info__">
                <p>Penggalangan dana dimulai <b>{{ $event->created_at->format('d M Y') }}</b> oleh:</p>
                <div class="__user__">
                  <div class="row">
                    <div class="col-3">
                    <img src="{{ asset('/img/no-user.png') }}" class="img-responsive img-circle" alt="logo-user" />
                    </div>
                    <div class="col-9">
                      <a href="" class="__title__">{{ $event->userId->name }}</a>
                      <img src="https://assets.kitabisa.com/images/icon__verified-org.svg" alt="img-official" height="20" />
                      <br />
                      <small>Akun telah terverifikasi</small>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>      
    </section>
 
    <div class="_background_white">
      <div class="container">
        <div class="row">
          <div class="col-8">
            <div class="event-detail __body">
              <div class="__description__">
                {!! $event->description !!}
              </div>
            </div>
          </div>
          <div class="col-4">
            <div class="event-detail __body">
              @php
                $total_donatur = App\LogDonation::where('event_id', $event->id)->count();
                $donaturs = App\LogDonation::where('event_id', $event->id)->limit(9)->get();
              @endphp

              <div class="__denatur__">
                <h3 class="__title__">Donatur ({{ $total_donatur }})</h3>
                <div class="__list__">
                  @forelse ($donaturs as $donatur)
                    <div class="row __donatur_info__">
                      <div class="col-4 __image__">
                          <img src="https://kitabisa-userupload-01.s3-ap-southeast-1.amazonaws.com/_production/user/1337504/23_1337504_1552222617_9929_a.jpg" class="img-responsive" alt="logo-user" />
                      </div>
                      <div class="col-8 __donatur_description__">
                        <h4 class="__nominal__">Rp {{ $donatur->amount }}</h4>
                        <h4 class="__user__">{{ $donatur->donatur_name }}</h4>
                        <small>{{ $donatur->created_at->format('m/d/Y H:m') }}</small>
                        <p>{{ $donatur->donatur_message }}</p>
                      </div>
                    </div>  
                  @empty
                    <p>Belum ada donatur</p>
                  @endforelse
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  @endsection