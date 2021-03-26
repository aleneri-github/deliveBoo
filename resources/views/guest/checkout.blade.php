@extends('layouts.guest')

@section('content')

  <div class="container">
    @if (session('message'))
    <div class="alert-danger my-4 p-2">
      <div class="alert-danger mx-4 p-2">
        {{ session('message') }}
      </div>
    </div>
    @endif
  </div>

  <div id="checkout">

    <transition name="fade" mode="out-in">
      {{-- vista di caricamento --}}
      <div key=1 v-if="loader == true" class="loading_page">
        <h1>Solo un attimo...</h1>
        <img src="{{ asset('img/jumb-2.svg') }}" alt="">
      </div>

      {{-- view checkout --}}
      <div key=2 v-if="loader == false" id="checkout_section" class="container d-flex pt-5 pb-5">

        {{-- DATI DI CHECKOUT --}}
        <div id="checkout_container">
          <h3 class="mb-3">Dati di fatturazione</h3>

          <div id="checkout_data">
            {{-- FORM BRAINTREE --}}
            <form id="payment-form" action="{{ route('guest.checkout.store') }}" method="post">
              @csrf

              {{-- DATI UTENTE --}}
              {{-- nome --}}
              <div class="form-group">
                <label for="name">Nome</label>
                <input required class="form-control" type="text" id="name" name="name" value="{{ old('name') }}">
              </div>
              {{-- cognome --}}
              <div class="form-group">
                <label for="surname">Cognome</label>
                <input required class="form-control" type="text" id="surname" name="surname" value="{{ old('surname') }}">
              </div>
              {{-- indirizzo --}}
              <div class="form-group">
                <label for="buyer_address">Indirizzo di fatturazione</label>
                <input required class="form-control" type="text" id="buyer_address" name="buyer_address" value="{{ old('buyer_address') }}">
              </div>
              {{-- email --}}
              <div class="form-group">
                <label for="buyer_email">Email</label>
                <input required class="form-control" type="email" id="buyer_email" name="buyer_email" value="{{ old('buyer_email') }}">
              </div>

              {{-- DATI PAGAMENTO BRAINTREE --}}
              <div id="dropin-container"></div>
              <div id="data_total" class="mt-4 m-3 justify-content-between">
                <h4>Totale</h4>
                <h4>€ @{{ cartTotal().toFixed(2) }}</h4>
              </div>
              {{-- <a href="#" class="deliveboo_button p-3">Torna indietro</a> --}}
              <input class="deliveboo_button p-3" type="submit" value="Compra"></input>
              <input type="hidden" id="nonce" name="nonce"></input>
              <input type="hidden" id="cart" name="cart"></input>
              <input type="hidden" id="token" name="token" value='{{ $token }}'/>
              <input type="hidden" id="total" name="total"></input>
            </form>
          </div>

        </div>

        {{-- CARRELLO --}}
        <div id="checkout_cart">
          <h3 class="mb-3">Carrello</h3>
          <ul>
            <li v-for="item in cart" v-cloak>
              <h5><strong>@{{ item.name }}</strong></h5>
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
            </li>
            <div class="mt-4 m-3 d-flex justify-content-between">
              <h4>Totale</h4>
              <h4 v-cloak>€ @{{ cartTotal().toFixed(2) }}</h4>
            </div>
          </ul>
        </div>

      </div>

    </transition>
    <div class="loading_page myposition" :class="prova">
      <h1>Solo un attimo...</h1>
      <img src="{{ asset('img/jumb-2.svg') }}" alt="">
    </div>
  </div>

  <script src="{{ asset('js/checkout.js') }}" defer></script>

@endsection
