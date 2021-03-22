@extends('layouts.guest')

@section('content')

  {{-- DATI DI CHECKOUT --}}
  <div id="checkout_data">
    <p>dati di checkout</p>
  </div>

  {{-- CARRELLO --}}
  <div id="checkout_cart">
    <p>carrello</p>
  </div>

  <script src="{{ asset('js/detail.js') }}" defer></script>
    
@endsection