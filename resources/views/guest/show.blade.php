@extends('layouts.guest')

@section('content')

  {{-- JUMBOTRON --}}
  <div id="jumbotron" style="background-image: url('{{ asset('storage/' . $restaurant->image) }}')">
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
          <img src="{{ asset('storage/' . $dish->image) }}" alt="{{ $dish->name }}">
          <h5><strong>{{ $dish->name }}</strong></h5>
        </div>

        <div class="card-body">
          <p class="card-text">€ {{ $dish->price }}</p>
          {{-- ADD --}}
          <button class="btn btn-outline-success" @click="addOne({{ $dish }})">
            <i class="fas fa-plus"></i>
          </button>
          {{-- REMOVE --}}
          <button class="btn btn-outline-danger" @click="removeOne({{ $dish }})">
            <i class="fas fa-minus"></i>
          </button>
        </div>
      </div>
      @endforeach
    </div>

    {{-- CARRELLO --}}
    <div id="cart">
      <ul>
        <li v-for="item in cart">
          @{{ item.quantity }}x <strong>@{{ item.name }}</strong> - € @{{ item.total }}
          <hr>
        </li>
      </ul>
      <h3>€ @{{ cartTotal() }}</h3>
    </div>

  </div>

  <script src="{{ asset('js/detail.js') }}" defer></script>
    
@endsection