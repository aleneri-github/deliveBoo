@extends('layouts.guest')

@section('content')

  <main id="home">
    <transition name="fade" mode="out-in">
    <div key=1 v-if="loader == true" class="loading_page">
      <h1>Solo un attimo...</h1>
      <img src="{{ asset('img/jumb-2.svg') }}" alt="">
    </div>
    <div key=2 v-else>
    <section id="jumbotron_main">
      <div class="layover"></div>
      <div class="container d-flex">
        <div class="title">
          <h1 class="font-weight-bold">Hai fame?
            <br>
            Sei nel posto giusto</h1>
        </div>
        <div class="jumb-img animate__animated animate__backInRight animate__delay-1s">
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
      <div class="slider-wrapper">

              <div class="container_food">
                <h2 class="text-center">Le nostre novità in zona</h2>
                <div v-for="(food, index) in foods" class="images" :class="(index == indexOfImage) ? active : ''">
                    <img :src="'http://127.0.0.1:8000/storage' + '/' + food.image">
                    <div class="name_container">
                      <h3>@{{ food.name }}</h3>
                    </div>
                </div>
              </div>

          </div>
    </section>


    <section id="carousel-type">
      <div class="types">
        <div v-for="(card, index) in carousel" @click='filter(card.type); typeIndex = index' :class="index == typeIndex ? 'typeActive' : ''">
          <img :src="card.image" alt="sales">
          <h5 :class="index == typeIndex ? 'titleActive' : ''"> @{{ card.type }}</h5>
        </div>
      </div class="types">
    </section>

    {{-- RESTAURANTS --}}
    <section id="restaurants">
      <h1 class="text-center">I nostri ristoranti</h1>
      <div class="v-if-container" v-if="restaurants != 0">
        <div :style="{backgroundImage: 'url(' + 'http://127.0.0.1:8000/storage' + '/' + restaurant.image + ')'}" style="background-repeat: no-repeat; background-size: cover;" class="card_rest" :class="restAnim" v-for="restaurant in restaurants">
          <a :href="'restaurants' + '/' + restaurant.slug + '/show'" @click="clearCart" id="rest_a">
            <div class="layover">
              <h3>@{{ restaurant.name }}</h3>
              <p class="card-address"><i class="fas fa-map-marker-alt"></i>  @{{ restaurant.address }}</p>
              <span><i class="fas fa-phone"></i> @{{ restaurant.phone_number }}</span>
            </div>
          </a>
        </div>
      </div>
        <div v-if="restaurants == 0" class="no-restaurants animate__animated animate__fadeIn animate__delay-1s	" style="width:100%; display:flex; justify-content:center;">
          <h2>Non ci sono ristoranti disponibili in questa categoria</h2>
        </div>
      </div>
    </section>
  </div>
  </transition>
  </main>

  {{-- <script src="{{ asset('js/home.js') }}"></script> --}}
@endsection
