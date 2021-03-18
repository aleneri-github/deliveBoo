@extends('layouts.app')

@section('content')

<section id="dashboard">
  <div id="side_bar">
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
  <main>
    <div id="admin-controller">
      <h1>Ciao Peppe</h1>

    </div>
  </main>
</section> 

@endsection
