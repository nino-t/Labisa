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
                  if (strpos($event->thumbnail_url, 'http') === false) {
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
              <a href="{{ route('event.donation', ['event.donation' => $event->slug]) }}" class="btn btn-danger btn-lg" style="width: 100%;">DONASI SEKARANG</a>

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
      <div class="_tab_event">
        <div class="container">
          <ul>
            <li class="active">
              <a href="javascript:void(0)" id="button_detail">Detail</a>
            </li>
            <li>
              <a href="javascript:void(0)" id="button_update">Update</a>
            </li>
          </ul>      
        </div>
      </div>

      <div class="container">
        <div class="row">
          <div class="col-8">
            <div class="event-detail __body" id="event-detail">
              <div class="__description__">
                <div class="__button-update">
                  <p>Baca update terbaru dari penggalangan dana ini!</p>
                  <a href="javascript:void(0)" class="btn btn-primary btn-lg" id="lihat_update">Lihat Update</a>
                </div>

                {!! $event->description !!}
              </div>
            </div>

            <div class="event-detail __body d-none" id="event-update">
              <div class="">Not Found</div>
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
                      <div class="col-3 __image__">
                        <img src="{{ asset('/img/no-user.png') }}" class="img-responsive img-circle" alt="logo-user" />
                      </div>
                      <div class="col-9 __donatur_description__">
                        <h4 class="__nominal__">Rp {{ number_format($donatur->amount, 0, ',', '.') }}</h4>
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

      <div class="container">
        <div class="row">
          <div class="col-8">
            <div class="event-detail __body">
              <div class="__feedback___">
                <div class="watermark">
                  <p><b>Disclaimer</b> : Informasi dan opini yang tertulis di halaman penggalangan ini adalah milik penggalang dana dan tidak mewakili Kitabisa.</p>
                </div>

                <div class="text-center">
                  <p class="text-report">Penggalangan dana ini mencurigakan? <a href="">Laporkan</a></p>
                </div>
                <a href="{{ route('event.donation', ['event.donation' => $event->slug]) }}" class="btn btn-danger btn-lg" style="width: 100%; padding-top: 10px; padding-bottom: 10px;">DONASI SEKARANG</a>
              </div>
            </div>
          </div>
        </div>

        <div class="row">
          <div class="col-12">
              <div class="event-detail __body">
                <div class="make-event">
                  <div class="row">
                    <div class="col-8">
                      <p>Mau buat halaman untuk galang dana online seperti ini?</p>
                    </div>
                    <div class="col-4">
                      <a href="" class="btn btn-primary btn-lg" style="width: 100%;">Buat sekarang gratis</a>
                    </div>
                  </div>
                </div>
              </div>
          </div>
        </div>
      </div>
    </div>
  @endsection

  @push('scripts')
    <script>
      $(document).on('click', '#button_detail', function(e) {
        e.preventDefault();
        var self = $(this);
        var parent = self.parent();
        parent.addClass('active');
        $('#button_update').parent().removeClass('active');

        $('#event-update').addClass('d-none');
        $('#event-detail').removeClass('d-none');   
      });

      $(document).on('click', '#button_update', function(e) {
        e.preventDefault();
        var self = $(this);
        var parent = self.parent();
        parent.addClass('active');
        $('#button_detail').parent().removeClass('active');

        $('#event-update').removeClass('d-none');
        $('#event-detail').addClass('d-none');        
      });

      $(document).on('click', '#lihat_update', function(e) {
        e.preventDefault();
        var self = $(this);
        var parent = self.parent();
        $('#button_update').parent().addClass('active');
        $('#button_detail').parent().removeClass('active');

        $('#event-update').removeClass('d-none');
        $('#event-detail').addClass('d-none');        
      });
    </script>
  @endpush