<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">
    {{-- favicon --}}
    <link rel="icon" type="image/png" sizes="16x16" href="{{ asset('img/favicon-16x16.png') }}">

    <title>DeliveBoo</title>

    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}" defer></script>

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/4.1.1/animate.min.css"/>

    <link rel="stylesheet" href="https://unpkg.com/flickity@2/dist/flickity.min.css">

    <script src="https://unpkg.com/flickity@2/dist/flickity.pkgd.min.js"></script>

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">

    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    <link href="{{ asset('css/style.css') }}" rel="stylesheet">

    {{-- Font Awesome --}}
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.2/css/all.css" integrity="sha512-9iWaz7iMchMkQOKA8K4Qpz6bpQRbhedFJB+MSdmJ5Nf4qIN1+5wOVnzg5BQs/mYH3sKtzY+DOgxiwMz8ZtMCsw==" crossorigin="anonymous" />
    <script src="{{ asset('js/dashboard.js') }}" defer></script>
</head>
<body>
    <div id="app">
        <section id="dashboard">
            {{-- pannello admin --}}
            <div id="admin-menu">
              <div class="logo-nav">
                <a href="{{ route('guest.index')}}">
                  <img src="{{ asset('img/deliverYou-logo.svg') }}" alt="">
                </a>
              </div>
              <div class="side-menu">
                <nav class="admin-menu">
                  <ul>
                    <li>
                      <a href="{{ route('admin.dishes.index')}}">
                        <i class="fas fa-hamburger"></i>
                        <span>Menu</span>
                      </a>
                    </li>
                    <li>
                      <a href="{{ route('admin.dishes.statistics')}}">
                      <i class="fas fa-chart-line"></i>
                        <span>Statistiche</span>
                      </a>
                    </li>
                    {{-- <li>
                      <a href="">
                        <i class="fas fa-utensils"></i>
                        <span>Ordini</span>
                      </a>
                    </li> --}}
                  </ul>

                </nav>

              </div>
            </div>
            {{-- main --}}
            <main id="admin-show">

              <h1></h1>
              @yield('content')


            </main>
            {{-- pannello logout --}}
            <div id="admin-info">
              <div class="top">
                <!-- Right Side Of Navbar -->
                <ul class="navbar-nav ml-auto">
                  <!-- Authentication Links -->
                  @guest
                      <li class="nav-item">
                          <a class="nav-link" href="{{ route('login') }}">{{ __('Login') }}</a>
                      </li>
                      @if (Route::has('register'))
                          <li class="nav-item">
                              <a class="nav-link" href="{{ route('register') }}">{{ __('Register') }}</a>
                          </li>
                      @endif
                  @else
                      <li class="nav-item dropdown">
                          <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                              {{ Auth::user()->name }}
                          </a>

                          <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
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
              {{-- info restaurant --}}
              {{-- @dd($restaurant->name) --}}
              <div class="info-side">
                <div class="card-restaurant">
                  <img src="{{ asset('storage/' . $restaurant->image) }}" alt="">
                  <h4>{{ $restaurant->name }}</h4>
                  <p>{{ $restaurant->email_rest }}</p>
                  @foreach ($restaurant->types as $type)
                    <span class="badge badge-dark">{{ ucfirst($type->name) }}</span>
                  @endforeach
                  {{-- <span class="badge badge-dark">Italiano</span>
                  <span class="badge badge-dark">Vegetariano</span> --}}
                </div>
              </div>
              {{-- dati restaurant --}}
              <div class="data">
                <div class="data-top">
                    <div class="box">
                      <span id="orders_total_dash"><i class="fas fa-circle-notch fa-pulse"></i></span>
                      <p>Ordini</p>
                    </div>
                    <div class="box">
                      <span>{{ count($restaurant->dishes) }}</span>
                      <p>Food</p>
                    </div>
                    <div class="box">
                      <span id="revenue_total_dash"><i class="fas fa-circle-notch fa-pulse"></i></span>
                      <p>Incasso</p>
                    </div>
                </div>
              </div>

            </div>
        </section>
    </div>
    <script>
      window.token = "{{ $token }}";
    </script>
</body>
</html>
