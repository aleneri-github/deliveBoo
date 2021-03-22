@extends('layouts.guest')

@section('content')

  {{-- JUMBOTRON --}}
  <div id="jumbotron_rest" style="background-image: url('{{ asset('storage/' . $restaurant->image) }}')">
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
      <div class="card_dish">

        <div class="img_div">
          <div class="img_layer"></div>
          <img src="{{ asset('storage/' . $dish->image) }}" alt="{{ $dish->name }}">
          <h5><strong>{{ $dish->name }}</strong></h5>
        </div>

        <div class="card_body">
          <div style="height: 100px">
            <p>{{ $dish->ingredients }}</p>
            <p>€ {{ $dish->price }}</p>
          </div>
          {{-- BUTTONS --}}
          <div class="buttons">
          {{-- ADD --}}
          <button class="detail_button" @click="addOne({{ $dish }})">
            <i class="fas fa-plus"></i>
          </button>
          {{-- REMOVE --}}
          <button class="detail_button" @click="removeOne({{ $dish }})">
            <i class="fas fa-minus"></i>
          </button>
          </div>
        </div>

      </div>
      @endforeach
    </div>

    {{-- CARRELLO --}}
    <div id="cart">
      <ul>
        <li v-for="item in cart">
          <span><strong>@{{ item.name }}</strong></span>
          <div class="cart_buttons">
            <span>@{{ item.quantity }}x - € @{{ item.total.toFixed(2) }}</span>
            <div class="buttons">
              {{-- ADD --}}
              <button class="detail_button" @click="addItem(item)">
                <i class="fas fa-plus"></i>
              </button>
              {{-- REMOVE --}}
              <button class="detail_button" @click="removeItem(item)">
                <i class="fas fa-minus"></i>
              </button>
            </div>
          </div>          
        </li>
      </ul>
      <h3>€ @{{ cartTotal().toFixed(2) }}</h3>
    </div>

  </div>

  <script src="{{ asset('js/detail.js') }}" defer></script>
    
@endsection