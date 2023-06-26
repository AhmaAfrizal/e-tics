<!doctype html>
<html lang="eng">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>E-tics | {{$title}}</title>

    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}" defer></script>

    <!-- Favicon -->
    <link rel="shortcut icon" href="{{asset('img/svg/logo.svg')}}" type="image/x-icon">

    {{-- font awesome --}}
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">
    <script src="https://kit.fontawesome.com/yourcode.js" crossorigin="anonymous"></script>

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">

    <!-- Styles -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
</head>
<body style="font-family:poppins;">
    <div id="app">
        {{-- <nav class="navbar navbar-expand-md navbar-light bg-white shadow-sm">
            <div class="container">
                <a class="navbar-brand" href="{{ url('/') }}">
                    {{ config('app.name', 'Laravel') }}
                </a>
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="{{ __('Toggle navigation') }}">
                    <span class="navbar-toggler-icon"></span>
                </button>

                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <!-- Left Side Of Navbar -->
                    <ul class="navbar-nav me-auto">

                    </ul>

                    <!-- Right Side Of Navbar -->
                    <ul class="navbar-nav ms-auto">
                        <!-- Authentication Links -->
                        @guest
                            @if (Route::has('login'))
                                <li class="nav-item">
                                    <a class="nav-link" href="{{ route('login') }}">{{ __('Login') }}</a>
                                </li>
                            @endif

                            @if (Route::has('register'))
                                <li class="nav-item">
                                    <a class="nav-link" href="{{ route('register') }}">{{ __('Register') }}</a>
                                </li>
                            @endif
                        @else
                            <li class="nav-item dropdown">
                                <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                                    {{ Auth::user()->name }}
                                </a>

                                <div class="dropdown-menu dropdown-menu-end" aria-labelledby="navbarDropdown">
                                    <a class="dropdown-item" href="{{ route('logout') }}"
                                       onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                        {{ __('Logout') }}
                                    </a>

                                    <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                                        @csrf
                                    </form>
                                </div>
                            </li>
                        @endguest
                    </ul>
                </div>
            </div>
        </nav> --}}

        <style>
            nav .navbar-brand{
                font-weight: 800;
                margin-left: 60px;
                font-size: 22px;
            }
            nav .menu{
                margin-right: 60px;
            }
            nav .menu .nav-item{
                font-weight: 700;
            }
            nav .menu .nav-item .nav-link:hover{
                transition: 300ms;
                color: #7848f4;
            }
            nav .menu .nav-item .btn{
                border: 0;
                font-weight: 700;
                background-color: #f1ebfd;
                color: #7848f4;
            }
            nav .menu .nav-item .btn:hover{
                background-color: #7848f4;
                color: #f1ebfd;
                transition: 500ms;
            }
            .active{
                padding-bottom: 4;
                border-bottom: 2px solid #7848f4;
            }
        </style>

        <nav class="navbar navbar-expand-lg navbar-light bg-light shadow" style="height:80px;">
            <div class="container">
              <a class="navbar-brand" href="/">E-ti<span style="color: #7848f4">cs</span></a>
              <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
              </button>
              <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <ul class="navbar-nav menu ms-auto mb-2 mb-lg-0">
                  <li class="nav-item mx-1">
                    <a class="nav-link {{($title=='beranda')?'active':''}}" aria-current="page" href="/">Home</a>
                  </li>
                  <li class="nav-item mx-1">
                    <a class="nav-link {{($title=='about')?'active':''}}" href="/about">About</a>
                  </li>
                  <li class="nav-item mx-1">
                    <a class="nav-link {{($title=='contact')?'active':''}}" href="/contact">Contact</a>
                  </li>
                    @guest
                    <li class="nav-item ms-1 my-auto">
                        <a href="/login" class="btn btn-success p-1" style="width:100px; border-radius:10px;">Login</a>
                    </li>
					@else
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                            <img
                            style="border: 1px solid gray"
                            src="{{asset('img/avatar/avatar-illustrated-02.webp')}}"
                            class="rounded-circle"
                            height="28"
                            alt="avatar"
                            loading="lazy"
                            />
                        </a>
                        <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
                            <a class="dropdown-item" href="#"><strong>{{ Auth::user()->name }}</strong></a>
                            <div class="dropdown-divider"></div>
                            @guest
                            @else
                            @if(auth()->user()->is_superadmin == 1)
                                <a class="dropdown-item" href="{{ route('superadmin.home') }}"><i class="fa-solid fa-gauge-high"></i>	{{ __('Dashboard') }}</a>
                            @elseif(auth()->user()->is_admin == 1)
                                <a class="dropdown-item" href="{{ route('admin.home') }}"><i class="fa-solid fa-gauge-high"></i>	{{ __('Dashboard') }}</a>
                            @endif
                            @endguest
                            <a class="dropdown-item" href="{{ route('home') }}"><i class="fa-solid fa-user me-1"></i>	{{ __('Akun') }}</a>
                            <a class="dropdown-item" href="/pesanans"><i class="fa-sharp fa-solid fa-ticket me-1"></i>	{{ __('Transaksi') }}</a>
                            <div class="dropdown-divider"></div>
                            <a class="dropdown-item" href="{{ route('logout') }}" onclick="event.preventDefault();document.getElementById('logout-form').submit();">
                            {{ __('Logout') }}	<i class="fa-solid fa-right-from-bracket"></i>
                            </a>
    
                            <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                                @csrf
                            </form>
                        </ul>
                      </li>
						@endguest
                </ul>
                </div>
            </div>
        </nav>

        <main class="py-2">
            @yield('content')
        </main>
        @include('layouts.footer')
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
</body>
</html>
