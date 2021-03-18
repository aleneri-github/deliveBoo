@extends('layouts.app')

@section('content')

<section id="dashboard">
  {{-- pannello admin --}}
  <div id="admin-menu">
    <div class="logo-nav">
      <a href="">
        <img src="{{ asset('img/deliverYou-logo.svg') }}" alt="">
      </a>
    </div>
    <div class="side-menu">
      <nav class="admin-menu">
        <ul>
          <li>
            <i class="fas fa-cubes"></i>
            <a href="#">Dashboard</a> 
          </li>
          <li>
            <i class="fas fa-hamburger"></i>
            <a href="#">Menu</a>
          </li>
          <li>
            <i class="fas fa-chart-line"></i>
            <a href="">Statistiche</a>
          </li>
          <li>
            <i class="fas fa-utensils"></i>
            <a href="">Ordini</a>
          </li>
        </ul>
  
      </nav>
  
    </div>
  </div>
  {{-- main --}}
  <main id="admin-show">
    <h1>Ciao Peppe</h1>

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

  <div class="info-side">
    <div class="card-restaurant">
      <img src="https://www.mymi.it/wp-content/uploads/2017/07/Ceresio-7-terrazza-ok-min.jpg" alt="">
      <h4>Ceresio 7</h4>
      <p>info@ceresio.com</p>
      <span class="badge badge-dark">Italiano</span>
      <span class="badge badge-dark">Vegetariano</span>
    </div>
  </div>
    
</div>
</section> 

@endsection
