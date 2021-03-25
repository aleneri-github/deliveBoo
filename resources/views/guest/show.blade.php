@extends('layouts.guest')

@section('content')

<div id="detail">
  <transition name="fade" mode="out-in">

    {{-- vista di caricamento --}}
    <div key=1 v-if="loader == true" class="loading_page">
      <h1>Solo un attimo...</h1>
      <img src="{{ asset('img/jumb-2.svg') }}" alt="">
    </div>

    {{-- view show --}}
    <div key=2 v-else>

      {{-- JUMBOTRON --}}
      <div id="jumbotron_rest" style="background-image: url('{{ asset('storage/' . $restaurant->image) }}')">
        <div class="dark_layer">
          <h1>{{ $restaurant->name }}</h1>
        </div>
      </div>

      {{-- CONTENUTO --}}
      <div class="d-flex">

        {{-- CARD PIATTI --}}
        <div id="cards">
          {{-- @dd($restaurant->dishes); --}}
          @foreach ($restaurant->dishes as $dish)
          <div class="{{ $dish->visible == 0 ? 'card_dish not_available' : 'card_dish'}}">

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
                <button {{ $dish->visible == 0 ? 'disabled' : '' }} class="deliveboo_button" @click="addOne({{ $dish }})">
                  <i class="fas fa-plus"></i>
                </button>
                {{-- REMOVE --}}
                <button {{ $dish->visible == 0 ? 'disabled' : '' }} :disabled="isInCart({{ $dish }})" class="deliveboo_button" @click="removeOne({{ $dish }})">
                  <i class="fas fa-minus"></i>
                </button>
              </div>
            </div>

          </div>
          @endforeach
        </div>

        {{-- CARRELLO --}}
        <div id="cart">
          <h3 class="mb-3">Carrello</h3>
          <ul>
            <li v-cloak v-for="item in cart">
              <span><strong>@{{ item.name }}</strong></span>
              <div class="cart_buttons">
                <span>@{{ item.quantity }}x - € @{{ item.total.toFixed(2) }}</span>
                <div class="buttons">
                  {{-- ADD --}}
                  <button class="deliveboo_button" @click="addItem(item)">
                    <i class="fas fa-plus"></i>
                  </button>
                  {{-- REMOVE --}}
                  <button class="deliveboo_button" @click="removeItem(item)">
                    <i class="fas fa-minus"></i>
                  </button>
                </div>
              </div>
            </li>
          </ul>
          {{-- totale --}}
          <div id="total" class="mt-4 d-flex justify-content-between">
            <h4>Totale</h4>
            <h4 v-cloak>€ @{{ cartTotal().toFixed(2) }}</h4>
          </div>
          {{-- button di checkout --}}
          <a href="{{ route('guest.checkout.index') }}" class="deliveboo_button_cart">Checkout</a>
        </div>

      </div>
    </div>

  </transition>
</div>

  <script src="{{ asset('js/detail.js') }}" defer></script>

@endsection
