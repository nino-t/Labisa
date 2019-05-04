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
                    <select class="form-control">
                      <option selected>Choose...</option>
                      <option>...</option>
                    </select>    
                  </div>
                </div>
                <div class="col">
                  <div class="form-group">
                    <label>Kategori Tujuan</label>
                    <select class="form-control">
                      <option selected>Choose...</option>
                      <option>...</option>
                    </select>    
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
        <p>menampilkan 3.845 campaign dari Semua Campaigner</p>
        <div class="row _section_body">
            @forelse ($events as $event)
            <div class="col-4 __item mb-4">
              <div class="card">
                <img src="{{ $event->thumbnail_url }}" class="img-responsive" alt="" />
                <div class="card-body">
                  <h4>{{ $event->name }}</h4>
                  <div class="__description__">
                    <div class="__username__">
                      <p>{{ $event->userId->name }}</p>
                      <img src="https://assets.kitabisa.com/images/icon__verified-org.svg" alt="img-official" height="20" />
                    </div>
                    <div class="__progress__">
                      <div class="progress">
                        <div class="progress-bar" role="progressbar" style="width: 25%" aria-valuenow="25" aria-valuemin="0" aria-valuemax="100"></div>
                      </div>
                    </div>
                    <div class="__money__">
                      <div class="_to">
                        <small>Terkumpul</small>
                        <p>Rp 80.658.039</p>
                      </div>
                      <div class="_from">
                        <small>Sisa hari</small>
                        <p>220</p>  
                      </div>
                    </div>
                  </div>
                </div>
              </div>
            </div>  
          @empty
              <h4>No data</h4>
          @endforelse
        </div>
      </div> 
    </section>
  @endsection