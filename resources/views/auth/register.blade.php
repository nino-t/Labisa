@extends('layouts.auth.app')

@section('content')
  <div class="container" style="margin-top: 70px;">
    <div class="row">
      <div class="col-md-7">
        <div class="row justify-content-center">
          <div class="col-md-6" style="padding-top: 100px;">
            <h3>Hai #OrangBaik!</h3>
            <p>Selamat bergabung di Kitabisa, komunitas orang baik terbesar di Indonesia.</p>        
          </div>
        </div>
      </div>
      <div class="col-md-5">
        <div class="card _auth_card">
          <div class="card-body">
            <h3 class="__title__" style="margin-bottom: 40px;">Daftar akun baru</h3>  
              <form method="POST" action="{{ route('register') }}">
                @csrf

                <div class="form-group row">
                  <div class="col-md-12">
                    <input
                      id="name"
                      placeholder="Nama Lengkap Anda"
                      type="text"
                      class="form-control @error('name') is-invalid @enderror"
                      name="name" value="{{ old('name') }}" required autocomplete="name" autofocus />

                      @error('name')
                        <span class="invalid-feedback" role="alert">
                          <strong>{{ $message }}</strong>
                        </span>
                      @enderror
                  </div>
                </div>

                <div class="form-group row">
                  <div class="col-md-12">
                    <input
                      id="email"
                      placeholder="Email Anda"
                      type="email"
                      class="form-control @error('email') is-invalid @enderror"
                      name="email" value="{{ old('email') }}" required autocomplete="email" />

                      @error('email')
                        <span class="invalid-feedback" role="alert">
                          <strong>{{ $message }}</strong>
                        </span>
                      @enderror
                  </div>
                </div>

                <div class="form-group row">
                  <div class="col-md-12">
                    <input
                      id="password"
                      placeholder="Password"
                      type="password"
                      class="form-control @error('password') is-invalid @enderror"
                      name="password" required autocomplete="new-password" />

                      @error('password')
                        <span class="invalid-feedback" role="alert">
                          <strong>{{ $message }}</strong>
                        </span>
                      @enderror
                  </div>
                </div>

                <div class="form-group row">
                  <div class="col-md-12">
                    <input
                      id="password-confirm"
                      placeholder="Ulangi Password"
                      type="password"
                      class="form-control"
                      name="password_confirmation" required autocomplete="new-password" />
                  </div>
                </div>

                <div class="form-group row">
                  <div class="col-md-12">
                    <button type="submit" class="btn btn-primary" style="width:100%; padding: 10px 0px;">
                      DAFTAR
                    </button>
                  </div>
                </div>

                <div class="form-group row">
                  <div class="col-md-12 text-center">
                    <p>Sudah punya akun Kitabisa? <a href="{{ route('login') }}">Masuk</a></p>
                  </div>
                </div>
              </form>
          </div>
        </div>
      </div>
    </div>
  </div>
@endsection
