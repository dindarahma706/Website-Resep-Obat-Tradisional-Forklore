<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title> Resep Obat - @yield('title') </title>

    <!-- Styles -->
    <link href="{{ asset('frontend/css/bootstrap.min.css') }}" rel="stylesheet">
    <link href="{{ asset('frontend/css/jquery.multiselect.css') }}" rel="stylesheet">    
    <link href="{{ asset('frontend/css/custom.css') }}" rel="stylesheet">
    <link href="//cdn.datatables.net/1.11.3/css/jquery.dataTables.min.css" rel="stylesheet" type="text/css">

    @yield('css')

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.bunny.net/css?family=Nunito" rel="stylesheet">

    <!-- Scripts -->
    <script src="https://code.jquery.com/jquery-3.6.0.min.js" integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>
    {{-- <script src="{{ asset('frontend/js/jquery.js') }}" defer></script> --}}
    <script src="{{ asset('frontend/js/bootstrap.min.js') }}" defer></script>
    <script src="{{ asset('frontend/js/bootstrap.bundle.min.js') }}" defer></script>
    <script src="//cdn.datatables.net/1.11.3/js/jquery.dataTables.min.js" type="text/javascript"></script>


</head>
<body class="antialiased">
    <div>
        <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
            <div class="container">
              <a class="navbar-brand" href="{{ url('/') }}">Resep Obat</a>

              <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <ul class="navbar-nav ms-auto">
                  <li class="nav-item">
                    <a class="nav-link {{ Request::is('/')?'active':''}} " href="{{ url('/') }}">Home</a>
                  </li>
                  
                  @guest
                      @if (Route::has('login'))
                        <li class="nav-item">
                          <a class="nav-link {{ Request::is('login')?'active':''}}" href="{{ url('login') }}">{{ __('Login') }}</a>
                        </li>
                        
                      @endif
                      @if (Route::has('register'))
                        <li class="nav-item">
                          <a class="nav-link {{ Request::is('register')?'active':''}}" href="{{ url('register') }}">{{ __('Register') }}</a>
                        </li>
                      @endif
                  @else

                  {{-- <li class="nav-item">
                    <a class="nav-link {{ Request::is('/history')?'active':''}} " href="{{ url('/history') }}">History</a>
                  </li> --}}
                  <li class="nav-item dropdown">
                    @if (Auth::user()->status='1')
                    <li>
                      <a href="{{ route('home') }}" class="dropdown-item">Tambah Resep</a>
                    </li> 
                    <li>
                      <a href="{{ route('get.resep') }}" class="dropdown-item">Lihat Resep</a>
                    </li> 
                    @endif
                    <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                      {{ Auth::user()->name }}
                    </a>
                    <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
                      @if (Auth::user()->role_as == '1')
                      <li>
                        <a href="{{ url('/add-resep') }}" class="dropdown-item">Tambahkan Bahan</a>
                      </li>  
                      <li>
                        <a href="{{ url('/users') }}" class="dropdown-item">Acc User</a>
                      </li>
                      @endif

                      <li>
                        <a href="{{ route('logout') }}" onclick="event.preventDefault();document.getElementById('logout-form').submit();" class="dropdown-item">{{ __('Logout') }}</a>
                        <form action="{{ route('logout') }}" method="POST" id="logout-form" class="d-none">@csrf</form>
                      </li> 
                    </ul>
                  </li>
                  
                  @endguest
                </ul>
              </div>
            </div>
          </nav>
        <div class="content">
            @yield('content')
        </div>

        
    </div>
    
</body>
@yield('layout_script')
</html>
