@extends('layouts.auth.app')

@section('content')
  <div class="container" style="margin-top: 70px;">
    <div class="row justify-content-center">
      <div class="col-md-5">
        <div class="card _auth_card">
          <div class="card-body">
            <h3 class="__title__" style="margin-bottom: 40px;">Masuk ke akun Anda</h3>  
              <form method="POST" action="{{ route('login') }}">
                @csrf

                <div class="form-group row">
                  <div class="col-md-12">
                    <input
                      id="email"
                      placeholder="Email Anda"
                      type="email"
                      class="form-control @error('email') is-invalid @enderror"
                      name="email"
                      value="{{ old('email') }}"
                      required autocomplete="email" autofocus />

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
                      name="password" required autocomplete="current-password" />

                      @error('password')
                        <span class="invalid-feedback" role="alert">
                          <strong>{{ $message }}</strong>
                        </span>
                      @enderror
                  </div>
                </div>

                <div class="form-group row">
                  <div class="col-md-6">
                    <div class="form-check">
                      <input class="form-check-input" type="checkbox" name="remember" id="remember" {{ old('remember') ? 'checked' : '' }}>
                      <label class="form-check-label" for="remember">
                        Ingat Saya
                      </label>
                    </div>
                  </div>
                  <div class="col-md-6 text-right">
                    @if (Route::has('password.request'))
                      <a class="btn btn-link" href="{{ route('password.request') }}">
                        Lupa Password?
                      </a>
                    @endif
                  </div>
                </div>

                <div class="form-group row">
                  <div class="col-md-12">
                    <button type="submit" class="btn btn-primary" style="width:100%; padding: 10px 0px;">
                      MASUK
                    </button>
                  </div>
                </div>

                <div class="form-group row">
                  <div class="col-md-12 text-center">
                    <p>Belum punya akun Kitabisa? <a href="{{ route('register') }}">Daftar</a></p>
                  </div>
                </div>
              </form>
          </div>
        </div>
      </div>
    </div>
  </div>
@endsection
