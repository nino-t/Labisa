@extends('layouts.master.app')
  @section('sub_title', $sub_title)

  @push('styles')
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/Swiper/4.5.0/css/swiper.min.css" />
  @endpush

  @section('content')
    <div class="bread_cover" id="first-banner">
      <div class="_body">
        <h3 class="__title__">Galang Dana untuk Hal yang Anda Perjuangkan</h3>
        <div class="__action__ row">
          <div class="col-6">
          <a href="{{ route('event.create') }}" class="btn btn-danger btn-lg">Galang Dana Sekarang</a>
          </div>
          <div class="col-6">
            <a href="javascript:void(0)" class="btn btn-success btn-lg"><i class="fab fa-whatsapp"></i> Konsultasi Dana Medis</a>
          </div>
        </div>
      </div>
      <div class="_footer">
        <div class="container">
          <div class="row">
            <div class="col-sm">
              <h3>{{ App\Event::count() }}</h3>
              <p>Campaign Terdanai</p>
            </div>
            <div class="col-sm">
              @php
                $total_log_donation = App\LogDonation::whereNotNull('id')->sum('amount');
              @endphp
              <h3>Rp {{ number_format($total_log_donation, 0, ',', '.') }}</h3>
              <p>Donasi dan Zakat Tersalurkan</p>
            </div>
            <div class="col-sm">
              <h3>{{ App\User::count() }}</h3>
              <p>#OrangBaik Tergabung</p>
            </div>
          </div>
        </div>
      </div>
    </div>

    <section class="_sub_banners _background_silver py-5" style="padding-bottom: 30px !important;">
      <div class="container">
        <div class="row">
          <div class="col-3 __text__">
            <h3>Website  Galang Dana #1 di Indonesia</h3>
            <p>Cerita mereka yang sukses menggalang dana</p>
            <a href="javascript:void(0)" class="btn btn-primary btn-lg">Mulai Galang Dana</a>
          </div>
          <div class="col-9 __content__">
            <div class="swiper-container" id="slide-top">
              <div class="swiper-wrapper" style="margin-bottom: 50px;"> 
                @foreach ($top_events as $event)
                  <a href="{{ route('event.view', $event->slug) }}" class="swiper-slide __item">
                    @if (empty($event->thumbnail_url))
                      <img src="{{ asset('img/not-found.png') }}" class="img-responsive" alt="img-event" />
                    @else
                      @php
                        $_path_filename = '';
                        if (strpos($event->thumbnail_url, 'http') === false) {
                          $_path_filename = url('/storage') .'/'. $event->thumbnail_url;
                        } else {
                          $_path_filename = $event->thumbnail_url;
                        }
                      @endphp

                      <img src="{{ $_path_filename }}" class="img-responsive" alt="img-event" />
                    @endif

                    <p>{{ Str::limit($event->message, 80, '...') }}</p>
                  </a>                      
                @endforeach
              </div>

              <div class="swiper-pagination"></div>
            </div>
          </div>  
        </div>
      </div>
    </section>

    <section class="_background_white _section_list_campaign">
      <div class="container-fluid">
        <div class="_section_heading">
          <h3>Siap memberi bantuan?</h3>
          <p>Halo #OrangBaik, pilih campaign yang ingin Anda bantu</p>    
        </div>
        <div class="_section_body">
          <div class="container">
            <div class="row">
              @foreach ($last_event as $event)
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
                          if (strpos($event->thumbnail_url, 'http') === false) {
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
              @endforeach
            </div>

            @if (count($last_event) >= $limit_event)
              <div class="row justify-content-center">
                <div class="col-md-4" style="padding-top: 10px; padding-bottom: 30px;">
                  <a href="{{ route('event.browse') }}" class="btn btn-primary btn-lg" style="width:100%;">Lihat Semua</a>
                </div>
              </div>
            @endif
          </div>
        </div>
      </div>
    </section>

    <section class="_background_primary _section_follow_bottom">
      <h3>Galang Dana di Kitabisa</h3>
      <p>Dari menolong anggota keluarga, hingga membangun jembatan di  desa, ribuan orang telah menggunakan Kitabisa untuk galang dana</p>
      <div class="__action__ row" style="width: 100%;">
        <div class="col-6">
          <a href="javascript:void(0)" class="btn btn-danger btn-lg">Galang Dana Sekarang</a>
        </div>
        <div class="col-6">
          <a href="javascript:void(0)" class="btn btn-success btn-lg"><i class="fab fa-whatsapp"></i> Konsultasi Dana Medis</a>
        </div>
      </div>
    </section>
  @endsection

  @push('scripts')
    <script src="https://cdnjs.cloudflare.com/ajax/libs/Swiper/4.5.0/js/swiper.min.js"></script>
    <script>
      $(document).ready(function() {
        var swiper = new Swiper('#slide-top', {
          slidesPerView: 2,
          spaceBetween: 30,
          slidesPerGroup: 2,
          loop: true,
          loopFillGroupWithBlank: true,
          pagination: {
            el: '.swiper-pagination',
            clickable: true,
          },
          autoplay: {
            delay: 5000
          }
        });
      });
    </script>
  @endpush