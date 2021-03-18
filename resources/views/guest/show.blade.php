@extends('layouts.guest')

@section('content')

  {{-- JUMBOTRON --}}
  <div id="jumbotron" style="background-image: url('{{ asset('storage/' . $restaurant->image) }}')">
    <div class="dark_layer">
      <h1>{{ $restaurant->name }}</h1>
    </div>
  </div>

  {{-- CONTENUTO --}}
  <div id="detail" class="d-flex">

    {{-- CARD PIATTI --}}
    <div id="cards">
      {{-- @dd($restaurant->dishes); --}}
      @foreach ($restaurant->dishes as $dish)
      <div class="card">
          {{-- img --}}
          <img class="card-img-top" src="{{ asset('storage/' . $dish->image) }}" alt="{{ $dish->name }}">
          <div class="card-body">
            {{-- titolo --}}
            <h5 class="card-title">{{ $dish->name }}</h5>
            {{-- prezzo --}}
            <p class="card-text">€ {{ $dish->price }}</p>
            {{-- ADD --}}
            <button class="btn btn-outline-success" @click="addOne({{ $dish }})">
              <i class="fas fa-plus"></i>
            </button>
            {{-- REMOVE --}}
            <button class="btn btn-outline-danger" @click="removeOne({{ $dish }})">
              <i class="fas fa-minus"></i>
            </button>
          </div>
        
        {{-- sezione con le informazioni --}}
        <div class="card_overlay">
          <h3 class="ingredients">{{ $dish->ingredients }}</h3>
          <h4>{{ $dish->description }}</h4>
        </div>

      </div>
      @endforeach
    </div>

    {{-- CARRELLO --}}
    <div id="cart">
      <ul>
        <li v-for="item in cart">
          @{{ item.quantity }}x <strong>@{{ item.name }}</strong> - € @{{ item.total }}
          <hr>
        </li>
      </ul>
      <h3>€ @{{ cartTotal() }}</h3>
    </div>

  </div>

  <script src="{{ asset('js/detail.js') }}" defer></script>
    
@endsection