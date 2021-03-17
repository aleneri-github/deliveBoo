@extends('layouts.guest')

@section('content')

  <main>

    <div class="jumbotron" id="jumbotron">
      <div class="title">
        <h1 class="font-weight-bold">Hai fame? Sei nel posto giusto</h1>
      </div>

      <marquee onmouseover="this.stop();" onmouseout="this.start();">
        <div>
            <img src="https://co-restaurants.roocdn.com/images/d05b2324186373d2859cabdbe28bf6fb25ab8542/shortcut/offers.png?width=250&height=130&fit=crop&bg-color=fe9364&auto=webp&format=png" alt="sales">
            <small>Offerte</small>
        </div>

        <div>
            <img src="https://co-restaurants.roocdn.com/images/d05b2324186373d2859cabdbe28bf6fb25ab8542/shortcut/burgers-1.png?width=250&height=130&fit=crop&bg-color=00ccbc&auto=webp&format=png" alt="">
        </div>

        <div>
            <img src="https://co-restaurants.roocdn.com/images/d05b2324186373d2859cabdbe28bf6fb25ab8542/shortcut/grocery.png?width=250&height=130&fit=crop&bg-color=007e8a&auto=webp&format=png" alt="">
        </div>

        <div>
            <img src="https://co-restaurants.roocdn.com/images/d05b2324186373d2859cabdbe28bf6fb25ab8542/shortcut/sushi-1.png?width=250&height=130&fit=crop&bg-color=440063&auto=webp&format=png" alt="">
        </div>

        <div>
            <img src="https://co-restaurants.roocdn.com/images/d05b2324186373d2859cabdbe28bf6fb25ab8542/shortcut/dessert.png?width=250&height=130&fit=crop&bg-color=fb5058&auto=webp&format=png" alt="">
        </div>

        <div>
            <img src="https://co-restaurants.roocdn.com/images/d05b2324186373d2859cabdbe28bf6fb25ab8542/shortcut/poke.png?width=250&height=130&fit=crop&bg-color=fabe00&auto=webp&format=png" alt="">
        </div>

        <div>
            <img src="https://co-restaurants.roocdn.com/images/d05b2324186373d2859cabdbe28bf6fb25ab8542/shortcut/organic.png?width=250&height=130&fit=crop&bg-color=9c006d&auto=webp&format=png" alt="">
        </div>

        <div>
            <img src="https://co-restaurants.roocdn.com/images/d05b2324186373d2859cabdbe28bf6fb25ab8542/shortcut/ice-cream.png?width=250&height=130&fit=crop&bg-color=007e8a&auto=webp&format=png" alt="">
        </div>
      </marquee>
    </div>

    <div id="types" class="p-4">
      <h3>Types - Navbar con le tipologie di ristorante</h3>
    </div>

    <div id="restaurants" class="p-4">
      <h3>Restaurants - Elenco dei ristoranti</h3>
    </div>


  </main>
@endsection
