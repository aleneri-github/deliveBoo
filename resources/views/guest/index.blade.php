@extends('layouts.guest')

@section('content')

  <main id="home">

    <div id="jumbotron">
      <div class="title">
        <h1 class="font-weight-bold">Hai fame? Sei nel posto giusto</h1>
      </div>

      <marquee onmouseover="this.stop();" onmouseout="this.start();"  scrollamount="15">
        <div v-for="card in carousel">
          <img :src="card.image" alt="sales">
          <h5> @{{ card.type }}</h5>
        </div>
      </marquee>
    </div>

    <div id="restaurants">
      <div class="card_rest" v-for="restaurant in restaurants">
        <img :src="'http://127.0.0.1:8000/storage/' + restaurant.image" alt="" >
        <h5> @{{ restaurant.name }}</h5>
      </div>
    </div>

    

  </main>

  <script src="{{ asset('js/home.js') }}"></script>
@endsection

