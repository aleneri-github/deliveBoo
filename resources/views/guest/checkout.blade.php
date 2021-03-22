@extends('layouts.guest')

@section('content')

<div id="checkout" class="container d-flex pt-5 pb-5">

  {{-- DATI DI CHECKOUT --}}
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
      <input class="deliveboo_button p-3" type="submit" value="Compra"></input>
      <input type="hidden" id="nonce" name="nonce"></input>
      <input type="hidden" id="cart" name="cart"></input>
    </form>

  </div>

  {{-- CARRELLO --}}
  <div id="checkout_cart">
    <ul>
      <li v-for="item in cart">
        <h5><strong>@{{ item.name }}</strong></h5>
        <span>@{{ item.quantity }}x - € @{{ item.total.toFixed(2) }}</span>
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
      <h4 class="float-right mt-4">€ @{{ cartTotal().toFixed(2) }}</h4>
    </ul>
  </div>

</div>

  <script src="{{ asset('js/checkout.js') }}" defer></script>
    
@endsection