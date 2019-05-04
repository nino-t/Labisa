<nav class="navbar navbar-expand-md navbar-light navbar-laravel _navbar {{ $theme }}">
  <div class="container-fluid">
    <a class="navbar-brand" href="{{ url('/') }}">
      @if ($theme === 'navbar-blue')
        <img src="https://assets.kitabisa.com/images/logo__ktbs.svg" alt="logo-web" />
      @else
      <img src="https://assets.kitabisa.com/images/logo__ktbs__blue.svg" alt="logo-web" />
      @endif
    </a>

    <form class="form-inline _search">
      <input class="form-control" type="search" placeholder="Cari judul, nama, atau isi campaign" aria-label="Search" />
    </form>

    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="{{ __('Toggle navigation') }}">
      <span class="navbar-toggler-icon"></span>
    </button>

    <div class="collapse navbar-collapse" id="navbarSupportedContent">
      <ul class="navbar-nav ml-auto">
        @guest
          <li class="nav-item">
            <a class="nav-link" href="{{ route('login') }}">Masuk</a>
          </li>
          @if (Route::has('register'))
            <li class="nav-item">
              <a class="nav-link" href="{{ route('register') }}">Daftar</a>
            </li>
          @endif
          @else
          <li class="nav-item dropdown">
            <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
              {{ Auth::user()->name }} <span class="caret"></span>
            </a>

            <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
              <a href="" class="dropdown-item">Galangan Anda</a>
              <a href="" class="dropdown-item">Account</a>
              <a class="dropdown-item" href="{{ route('logout') }}" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                {{ __('Logout') }}
              </a>

              <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                @csrf
              </form>
            </div>
          </li>
        @endguest
      </ul>
    </div>
  </div>
</nav>
