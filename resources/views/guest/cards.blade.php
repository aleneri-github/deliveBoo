@extends('layouts.guest')

@section('content')

  <main id="home">

    <h1>CARDS</h1>

    <section id="jumbotron">
      <div class="container d-flex">
        <div class="title">
          <h1 class="font-weight-bold">Hai fame?
            <br>
            Sei nel posto giusto</h1>
        </div>
        <div class="jumb-img">
          <img src="{{asset('img/jumb-2.svg')}}" alt="">
        </div>
      </div>
    </section>

    <section id="service">
      <h1 class="text-center">Consegniamo i tuoi piatti preferiti a casa tua</h1>
      <div class="box-cards container">
        <div class="service-card">
          <div class="img-card">
            <img src="https://res.cloudinary.com/glovoapp/image/fetch///https://glovoapp.com/images/why-glovo/restaurants.svg" alt="" srcset="">
          </div>
          <div class="text-card">
            <h4>1000+ ristoranti</h4>
            <p>Con oltre mille ristoranti puoi ordinare i tuoi piatti preferiti, esplora nuovi ristoranti in zona!</p>
          </div>
        </div>

        <div class="service-card">
          <div class="img-card">
            <img src="https://res.cloudinary.com/glovoapp/image/fetch///https://glovoapp.com/images/why-glovo/delivery.svg" alt="" srcset="">
          </div>
          <div class="text-card">
            <h4>Consegna rapida</h4>
            <p>La rapidità è un nostro punto d'orgoglio. Ordina o invia qualsiasi cosa nella tua città e lo ritireremo e te lo consegneremo nel giro di pochi minuti.</p>
          </div>
        </div>
        <div class="service-card">
          <div class="img-card">
            <img src="https://res.cloudinary.com/glovoapp/image/fetch///https://glovoapp.com/images/why-glovo/groceries.svg" alt="" srcset="">
          </div>
          <div class="text-card">
            <h4>Consegna della spesa</h4>
            <p>Trova tutti i tuoi piatti preferiti direttamente a casa tua, puoi contare su di noi per portartelo.</p>
          </div>
        </div>

      </div>

    </section>

    <section id="food">
      <h1 class="text-center">Le novità</h1>
      <div class="box-cards container text-center">
        <div class="card_food">
          <img src="http://gomoto.like-themes.com/wp-content/uploads/2019/06/item_02-480x480.jpg" alt="" >
          <h5>Cheeseburger with Salad</h5>
          <p>Sed ut perspiciatis unde omnis iste natus error sit voluptatem</p>
        </div>
        <div class="card_food">
          <img src="http://gomoto.like-themes.com/wp-content/uploads/2019/06/item_02-480x480.jpg" alt="" >
          <h5>Cheeseburger with Salad</h5>
          <p>Sed ut perspiciatis unde omnis iste natus error sit voluptatem</p>
        </div>
        <div class="card_food">
          <img src="http://gomoto.like-themes.com/wp-content/uploads/2019/06/item_02-480x480.jpg" alt="" >
          <h5>Cheeseburger with Salad</h5>
          <p>Sed ut perspiciatis unde omnis iste natus error sit voluptatem</p>
        </div>
        <div class="card_food">
          <img src="http://gomoto.like-themes.com/wp-content/uploads/2019/06/item_02-480x480.jpg" alt="" >
          <h5>Cheeseburger with Salad</h5>
          <p>Sed ut perspiciatis unde omnis iste natus error sit voluptatem</p>
        </div>
      </div>
    </section>

    <section id="carousel-type">
      <marquee onmouseover="this.stop();" onmouseout="this.start();"  scrollamount="15">
        <div v-for="card in carousel" @click='filter(card.type)'>
          <img :src="card.image" alt="sales">
          <h5> @{{ card.type }}</h5>
        </div>
      </marquee>
    </section>

    <h1 class="text-center">I nostri ristoranti</h1>
    <section id="restaurants" class="d-flex">

      {{-- <div class="box-cards container">
        <div class="card_rest" v-for="restaurant in restaurants">
          <img :src="'{{ asset('/storage') }}' + '/' + restaurant.image" alt="" >
          <h5> @{{ restaurant.name }}</h5>
        </div>
      </div> --}}

      {{-- :style="backgound-image: url('{{ asset('/storage') }}' + '/' + restaurant.image)" --}}
      <div class="card_" v-for="restaurant in restaurants">
        <img :src="'{{ asset('/storage') }}' + '/' + restaurant.image" alt="">
        <h4>@{{ restaurant.name }}</h4>
        <div class="overlay">
          <h2 class="m-4">Da Peppe</h2>
          <p class="m-4">Cucina Tipica Lucana <br>
          Via Matera 15 <br>
          0856/969871 </p>
        </div>
      </div>

    </section>

  </main>


  <script src="{{ asset('js/home.js') }}"></script>
@endsection
