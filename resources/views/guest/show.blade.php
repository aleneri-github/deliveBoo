@extends('layouts.guest')

@section('content')

  {{-- JUMBOTRON --}}
  <div id="jumbotron" style="background-image: url('{{ asset('storage/' . $restaurant->image) }}')">
    <div class="dark-layer">
      <h1>{{ $restaurant->name }}</h1>
    </div>
  </div>

  {{-- CONTENUTO --}}
  <div id="detail" class="d-flex p-3">

    {{-- CARD PIATTI --}}
    <div id="cards" class="m-2">cards</div>

    {{-- CARRELLO --}}
    <div id="cart" class="m-2">carrello</div>

  </div>
    
@endsection