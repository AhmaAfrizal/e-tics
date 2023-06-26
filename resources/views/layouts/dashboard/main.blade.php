<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>E-tics | {{$title}}</title>
  {{-- font awesome --}}
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">
  <script src="https://kit.fontawesome.com/yourcode.js" crossorigin="anonymous"></script>
  <!-- Favicon -->
  <link rel="shortcut icon" href="{{asset('img/svg/logo.svg')}}" type="image/x-icon">
  <!-- Custom styles -->
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
  <script src="https://cdn.ckeditor.com/ckeditor5/36.0.1/classic/ckeditor.js"></script>
  <link rel="stylesheet" href="{{asset('css/style.min.css')}}">
</head>

<body style="font-family: rubik;">
  <div class="layer"></div>
<!-- ! Body -->
<a class="skip-link sr-only" href="#skip-target">Skip to content</a>
<div class="page-flex">
  <!-- ! Sidebar -->
  <aside class="sidebar">
    <div class="sidebar-start">
        <div class="sidebar-head">
            <a href="/" class="logo-wrapper" title="Home">
                <span class="sr-only">Home</span>
                <span class="icon logo" aria-hidden="true"></span>
                <div class="logo-text">
                    <span class="logo-title">E-tics</span>
                    <span class="logo-subtitle">Dashboard</span>
                </div>

            </a>
            <button class="sidebar-toggle transparent-btn" title="Menu" type="button">
                <span class="sr-only">Toggle menu</span>
                <span class="icon menu-toggle" aria-hidden="true"></span>
            </button>
        </div>
        <div class="sidebar-body">
            <ul class="sidebar-body-menu">
                @guest
                    @else
                    @if (auth()->user()->is_superadmin == 1)
                    <li>
                        <a class="{{($title=="dashboard")?'active':''}}" href="home">
                            {{-- <span class="icon home" aria-hidden="true"></span> --}}
                            <h5 class="icon fa-solid fa-gauge"></h5>
                            Dashboard
                        </a>
                    </li>
                    <li>
                      <a class="show-cat-btn {{($title=="event")?'active':''}} {{($title=="allacara")?'active':''}}" href="##">
                        <h5 class="icon fa-solid fa-list"></h5>Event
                          <span class="category__btn transparent-btn" title="Open list">
                              <span class="sr-only">Open list</span>
                              <span class="icon arrow-down" aria-hidden="true"></span>
                          </span>
                      </a>
                      <ul class="cat-sub-menu">
                          <li>
                              <a href="acara">Tambah acara</a>
                          </li>
                          <li>
                              <a href="allacara">Semua acara</a>
                          </li>
                      </ul>
                    </li>
                    {{-- <li>
                      <a href="acara" class="{{($title=="event")?'active':''}}"><h5 class="icon fa-solid fa-list"></h5>Event</a>
                    </li> --}}
                    <li>
                      <a href="venue" class="{{($title=="venue")?'active':''}}"><h5 class="icon fa-solid fa-bars-staggered"></h5>Jenis tiket</a>
                    </li>
                    <li>
                        <a class="show-cat-btn {{($title=="tiket")?'active':''}}{{($title=="transaksi")?'active':''}}{{($title=="alltiket")?'active':''}}" href="##">
                            <h5 class="icon fa-solid fa-ticket"></h5>Tiket
                            <span class="category__btn transparent-btn" title="Open list">
                                <span class="sr-only">Open list</span>
                                <span class="icon arrow-down" aria-hidden="true"></span>
                            </span>
                        </a>
                        <ul class="cat-sub-menu">
                            <li>
                                <a href="tiket">Tambah tiket</a>
                            </li>
                            <li>
                                <a href="alltiket">Semua tiket</a>
                            </li>
                            <li>
                                <a href="transaksi">Transaksi</a>
                            </li>
                        </ul>
                    </li>
                    <li>
                        <a class="{{($title=='admin')?'active':''}} {{($title=='users')?'active':''}} show-cat-btn" href="">
                            <span class="icon user-3" aria-hidden="true"></span>Users
                            <span class="category__btn transparent-btn" title="Open list">
                                <span class="sr-only">Open list</span>
                                <span class="icon arrow-down" aria-hidden="true"></span>
                            </span>
                        </a>
                        <ul class="cat-sub-menu">
                            <li>
                                <a href="admin">Admin</a>
                            </li>
                            <li>
                                <a href="user">Pengguna</a>
                            </li>
                        </ul>
                    </li>
                    <li>
                      <a href="contact" class="{{($title=='contact')?'active':''}}">
                          <span class="icon message" aria-hidden="true"></span>
                          Contact
                      </a>
                  </li>
                    @elseif (auth()->user()->is_admin == 1)
                    <li>
                        <a class="{{($title=='dashboard')?'active':''}}" href="home">
                            {{-- <span class="icon home" aria-hidden="true"></span> --}}
                            <h5 class="icon fa-solid fa-gauge"></h5>
                            Dashboard
                        </a>
                    </li>
                    <li>
                      <a class="{{($title=='acara')?'active':''}}" href="acaraa"><h5 class="icon fa-solid fa-list"></h5>Event</a>
                    </li>
                    <li>
                      <a class="{{($title=='tiket')?'active':''}}" href="tiketa"><h5 class="icon fa-solid fa-ticket"></h5>Tiket</a>
                    </li>
                    @endif
                @endguest
            </ul>
            <span class="system-menu__title">Lainnya</span>
            <ul class="sidebar-body-menu">
                <li>
                    <a href="/"><span class="icon home" aria-hidden="true"></span>Home page</a>
                </li>
                <li>
                    <a href="{{ route('logout') }}" onclick="event.preventDefault();document.getElementById('logout-form').submit();">
                        <h5 class="icon fa-solid fa-right-from-bracket"></h5>Log out
                    </a>
                    <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                    @csrf
                    </form>
                </li>
            </ul>
        </div>
    </div>
    <div class="sidebar-footer">
        <a href="##" class="sidebar-user">
            <span class="sidebar-user-img">
                <picture>
                  @auth
                      @if (auth()->user()->is_superadmin == 1)
                        <source srcset="{{asset('img/avatar/avatar-illustrated-02.webp')}}" type="image/webp"><img src="./img/avatar/avatar-illustrated-01.png" alt="User name">
                      @else
                        <source srcset="{{asset('img/avatar/avatar-illustrated-01.webp')}}" type="image/webp"><img src="./img/avatar/avatar-illustrated-01.png" alt="User name">
                      @endif
                  @endauth
                </picture>
            </span>
            <div class="sidebar-user-info">
                <span class="sidebar-user__title">{{auth()->user()->name}}</span>
                @auth
                    @if (auth()->user()->is_superadmin == 1)
                        <span class="sidebar-user__subtitle">Superadmin</span>
                        @else
                        <span class="sidebar-user__subtitle">Admin</span>
                    @endif
                @endauth
            </div>
        </a>
    </div>
</aside>
  <div class="main-wrapper">
    <!-- ! Main nav -->
    <nav class="main-nav--bg">
  <div class="container main-nav">
    <div class="main-nav-start">
      <div>
        <p style="color: #7b7b7b; font-weight:500; font-size:20px;">selamat datang
          @if (Auth::user()->is_superadmin == 1)
              superadmin
          @elseif (Auth::user()->is_admin == 1)
              admin
          @endif
        </p>
        <p style="color: #7b7b7b; font-weight:500;" class="mt-2">{{auth()->user()->name}}</p>
      </div>
      {{-- <div class="search-wrapper">
        <i data-feather="search" aria-hidden="true"></i>
        <input type="text" placeholder="Enter keywords ..." required>
      </div> --}}
    </div>
    <div class="main-nav-end">
      <button class="sidebar-toggle transparent-btn" title="Menu" type="button">
        <span class="sr-only">Toggle menu</span>
        <span class="icon menu-toggle--gray" aria-hidden="true"></span>
      </button>
      {{-- <div class="lang-switcher-wrapper">
        <button class="lang-switcher transparent-btn" type="button">
          EN
          <i data-feather="chevron-down" aria-hidden="true"></i>
        </button>
        <ul class="lang-menu dropdown">
          <li><a href="##">English</a></li>
          <li><a href="##">Indonesia</a></li>
        </ul>
      </div> --}}
      <!-- <button class="theme-switcher gray-circle-btn" type="button" title="Switch theme">
        <span class="sr-only">Switch theme</span>
        <i class="sun-icon" data-feather="sun" aria-hidden="true"></i>
        <i class="moon-icon" data-feather="moon" aria-hidden="true"></i>
      </button> -->
      {{-- <div class="notification-wrapper">
        <button class="gray-circle-btn dropdown-btn" title="To messages" type="button">
          <span class="sr-only">To messages</span>
          <span class="icon notification active" aria-hidden="true"></span>
        </button>
        <ul class="users-item-dropdown notification-dropdown dropdown">
          <li>
            <a href="##">
              <div class="notification-dropdown-icon info">
                <i data-feather="check"></i>
              </div>
              <div class="notification-dropdown-text">
                <span class="notification-dropdown__title">System just updated</span>
                <span class="notification-dropdown__subtitle">The system has been successfully upgraded. Read more
                  here.</span>
              </div>
            </a>
          </li>
          <li>
            <a href="##">
              <div class="notification-dropdown-icon danger">
                <i data-feather="info" aria-hidden="true"></i>
              </div>
              <div class="notification-dropdown-text">
                <span class="notification-dropdown__title">The cache is full!</span>
                <span class="notification-dropdown__subtitle">Unnecessary caches take up a lot of memory space and
                  interfere ...</span>
              </div>
            </a>
          </li>
          <li>
            <a href="##">
              <div class="notification-dropdown-icon info">
                <i data-feather="check" aria-hidden="true"></i>
              </div>
              <div class="notification-dropdown-text">
                <span class="notification-dropdown__title">New Subscriber here!</span>
                <span class="notification-dropdown__subtitle">A new subscriber has subscribed.</span>
              </div>
            </a>
          </li>
          <li>
            <a class="link-to-page" href="##">Go to Notifications page</a>
          </li>
        </ul>
      </div> --}}
      <div class="nav-user-wrapper">
        <button href="##" class="nav-user-btn dropdown-btn" title="My profile" type="button">
          <span class="sr-only">My profile</span>
          <span class="nav-user-img">
            <picture>
              @auth
                  @if (auth()->user()->is_superadmin == 1)
                    <source srcset="{{asset('img/avatar/avatar-illustrated-02.webp')}}" type="image/webp"><img src="./img/avatar/avatar-illustrated-02.png" alt="User name">
                  @else
                    <source srcset="{{asset('img/avatar/avatar-illustrated-01.webp')}}" type="image/webp"><img src="./img/avatar/avatar-illustrated-02.png" alt="User name">
                  @endif
              @endauth
            </picture>
          </span>
        </button>
        <ul class="users-item-dropdown nav-user-dropdown dropdown">
          <li><a href="../home">
              <i data-feather="user" aria-hidden="true"></i>
              <span>{{auth()->user()->name}}</span>
            </a>
          </li>
          <li>
            <a class="danger" href="{{ route('logout') }}" onclick="event.preventDefault();document.getElementById('logout-form').submit();">
              <i data-feather="log-out" aria-hidden="true"></i>
              <span>Log out</span>
            </a>
            <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                @csrf
            </form>
          </li>
        </ul>
      </div>
    </div>
  </div>
</nav>
    <!-- ! Main -->
    <main class="main users chart-page" id="skip-target">
      <div class="container">
        @yield('content')
      </div>
    </main>
    <!-- ! Footer -->
    <footer class="footer">
      <div class="container">
        <div class="text-center">
          <p>2023 © E-tics Dashboard - <a href="elegant-dashboard.com" target="_blank"
              rel="noopener noreferrer">etics-dashboard.com</a></p>
        </div>
      </div>
  </footer>
  </div>
</div>
<!-- Chart library -->
<script src="{{asset('plugins/chart.min.js')}}"></script>
<!-- Icons library -->
<script src="{{asset('plugins/feather.min.js')}}"></script>
<!-- Custom scripts -->
<script src="{{asset('js/script.js')}}"></script>

<script>
  ClassicEditor
      .create( document.querySelector( '#konten' ) )
      .catch( error => {
          console.error( error );
      } );
</script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
</body>

</html>