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
    <div id="cards" class="m-2">
      @foreach ($restaurant->dishes as $dish)
      {{-- style="width: 18rem;" --}}
      <div class="card">
        {{-- img --}}
        <img class="card-img-top" src="{{ asset('storage/' . $dish->image) }}" alt="{{ $dish->name }}">
        <div class="card-body">
          {{-- titolo --}}
          <h5 class="card-title">{{ $dish->name }}</h5>
          {{-- prezzo --}}
          <p class="card-text">{{ $dish->price }}</p>
          <a href="#" class="btn btn-primary" @click="prova('{{ $dish->name }}')">Funzione prova</a>
        </div>
      </div>
      @endforeach
    </div>

    {{-- CARRELLO --}}
    <div id="cart" class="m-2">carrello</div>

  </div>

  <script src="{{ asset('js/detail.js') }}" defer></script>
    
@endsection