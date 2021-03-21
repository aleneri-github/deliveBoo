@extends('layouts.guest')

@section('content')

<div id="checkout">
  <div class="container">
    <div id="cart">
      <ul>
        <li v-for="item in cart">
          @{{ item.quantity }}x <strong>@{{ item.name }}</strong> - € @{{ item.total.toFixed(2) }}
          <hr>
        </li>
      </ul>
      <h3>€ @{{ cartTotal().toFixed(2) }}</h3>
    </div>
    <div id="dropin-container"></div>
    <button id="submit-button">Request payment method</button>
  </div>
</div>
<script src="{{ asset('js/checkout.js') }}" defer></script>
@endsection
