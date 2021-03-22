@extends('layouts.guest')

@section('content')

<div id="checkout" class="d-flex">

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
      <input type="submit" value="Compra"></input>
      <input type="hidden" id="nonce" name="nonce"></input>
      <input type="hidden" id="cart" name="cart"></input>
    </form>

  </div>

  {{-- CARRELLO --}}
  <div id="checkout_cart">
    <ul>
      <li v-for="">
        carrello
      </li>
    </ul>
  </div>

</div>

  <script src="{{ asset('js/checkout.js') }}" defer></script>
    
@endsection