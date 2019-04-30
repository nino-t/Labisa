@extends('layouts.master.app')
  @section('sub_title', $sub_title)

  @section('content')
    <div class="bread_cover" id="first-banner">
      <div class="_body">
        <h3 class="__title__">Galang Dana untuk Hal yang Anda Perjuangkan</h3>
        <div class="__action__ row">
          <div class="col-6">
          <a href="{{ route('galangan.create') }}" class="btn btn-danger btn-lg">Galang Dana Sekarang</a>
          </div>
          <div class="col-6">
            <a href="javascript:void(0)" class="btn btn-success btn-lg"><i class="fab fa-whatsapp"></i> Konsultasi Dana Medis</a>
          </div>
        </div>
      </div>
      <div class="_footer">
        <div class="container-fluid">
          <div class="row">
            <div class="col-sm">
              <h3>22.510</h3>
              <p>Campaign Terdanai</p>
            </div>
            <div class="col-sm">
              <h3>Rp 641.937.880.786</h3>
              <p>Donasi dan Zakat Tersalurkan</p>
            </div>
            <div class="col-sm">
              <h3>1.848.094</h3>
              <p>#OrangBaik Tergabung</p>
            </div>
          </div>
        </div>
      </div>
    </div>

    <section class="_sub_banners _background_silver py-5">
      <div class="container-fluid">
        <div class="row">
          <div class="col-3 __text__">
            <h3>Website  Galang Dana #1 di Indonesia</h3>
            <p>Cerita mereka yang sukses menggalang dana</p>
            <a href="javascript:void(0)" class="btn btn-primary btn-lg">Mulai Galang Dana</a>
          </div>
          <div class="col-9 __content__">
            <div class="row">
              <div class="col-6 __item">
                <img src="https://s3-ap-southeast-1.amazonaws.com/assets-kitabisa-cc/images/banners/banner__slider-desktop-1.jpg" class="img-responsive" alt="" />
                <p>Orangtua Al Fattieh berhasil menggalang Rp 61 juta dari 222 #OrangBaik untuk biaya pengobatan bayi Al Fattieh.</p>
              </div>
              <div class="col-6 __item">
                <img src="https://s3-ap-southeast-1.amazonaws.com/assets-kitabisa-cc/images/banners/banner__slider-desktop-1.jpg" class="img-responsive" alt="" />
                <p>Orangtua Al Fattieh berhasil menggalang Rp 61 juta dari 222 #OrangBaik untuk biaya pengobatan bayi Al Fattieh.</p>
                </div>  
            </div>  
          </div>  
        </div>
      </div>
    </section>

    <section class="_background_white">
      <div class="container-fluid">
        <div class="_section_heading">
          <h3>Siap memberi bantuan?</h3>
          <p>Halo #OrangBaik, pilih campaign yang ingin Anda bantu</p>    
        </div>
        <div class="_section_body">
          <div class="container">
            <div class="row">
              <div class="col-4 __item mb-4">
                <div class="card">
                    <img src="https://s3-ap-southeast-1.amazonaws.com/assets-kitabisa-cc/images/banners/banner__slider-desktop-1.jpg" class="img-responsive" alt="" />
                    <h4>Bantu Susi Melawan Kanker Payudara Stadium IV</h4>
                </div>
              </div>

              <div class="col-4 __item mb-4">
                <div class="card">
                    <img src="https://s3-ap-southeast-1.amazonaws.com/assets-kitabisa-cc/images/banners/banner__slider-desktop-1.jpg" class="img-responsive" alt="" />
                    <h4>Bantu Susi Melawan Kanker Payudara Stadium IV</h4>
                </div>
              </div>

              <div class="col-4 __item mb-4">
                <div class="card">
                  <img src="https://s3-ap-southeast-1.amazonaws.com/assets-kitabisa-cc/images/banners/banner__slider-desktop-1.jpg" class="img-responsive" alt="" />
                  <h4>Bantu Susi Melawan Kanker Payudara Stadium IV</h4>
                </div>
              </div>

              <div class="col-4 __item mb-4">
                <div class="card">
                  <img src="https://s3-ap-southeast-1.amazonaws.com/assets-kitabisa-cc/images/banners/banner__slider-desktop-1.jpg" class="img-responsive" alt="" />
                  <h4>Bantu Susi Melawan Kanker Payudara Stadium IV</h4>
                </div>
              </div>  

              <div class="col-4 __item mb-4">
                <div class="card">
                    <img src="https://s3-ap-southeast-1.amazonaws.com/assets-kitabisa-cc/images/banners/banner__slider-desktop-1.jpg" class="img-responsive" alt="" />
                    <h4>Bantu Susi Melawan Kanker Payudara Stadium IV</h4>
                </div>
              </div>

              <div class="col-4 __item mb-4">
                <div class="card">
                    <img src="https://s3-ap-southeast-1.amazonaws.com/assets-kitabisa-cc/images/banners/banner__slider-desktop-1.jpg" class="img-responsive" alt="" />
                    <h4>Bantu Susi Melawan Kanker Payudara Stadium IV</h4>
                </div>
              </div>
            </div>    
            <a href="javascript:void(0)" class="btn btn-primary">Lihat Semua</a>
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