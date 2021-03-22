@extends('layouts.guest')

@section('content')

<div id="checkout">
  <div class="container">
    <div id="mycart" v-cloak>
      {{-- [v-cloak] {
            display: none;
      }  --}}
      <ul>
        <li v-for="item in cart">
          @{{ item.quantity }}x <strong>@{{ item.name }}</strong> - € @{{ item.total.toFixed(2) }}
          <hr>
        </li>
      </ul>
      <h3>€ @{{ cartTotal().toFixed(2) }}</h3>
    </div>
    <form id="payment-form" action="{{ route('guest.checkout.store') }}" method="post">
      @csrf
      <div id="dropin-container"></div>
      <input type="submit" value="Compra"></input>
      <input type="hidden" id="token" name="token" value='{{ $token }}'/>
      <input type="hidden" id="nonce" name="nonce"></input>
      <input type="hidden" id="cart" name="cart"></input>
      <input type="hidden" id="total" name="total"></input>
    </form>
  </div>
</div>
<script src="{{ asset('js/checkout.js') }}" defer></script>
@endsection
