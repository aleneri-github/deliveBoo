@extends('layouts.guest')

@section('content')

  <main id="home">

    <section id="jumbotron_main">
      <div class="layover"></div>
      <div class="container d-flex">
        <div class="title">
          <h1 class="font-weight-bold">Hai fame?
            <br>
            Sei nel posto giusto</h1>
        </div>
        <div class="jumb-img animate__animated animate__backInRight">
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
              <div class="prev">
                  <i class="fas fa-angle-left" @click="stopAuto(), backward()"></i>
              </div>

              <div class="container_food">
                <h2 class="text-center">Le nostre novità in zona</h2>
                <div v-for="(image, index) in images" class="images animate__animated" :class="(index == indexOfImage) ? active : ''">
                    <img :src="image">
                    <h3>PROVA</h3>
                    <!-- <img :src="images[indexOfImage]" alt=""> -->
                    {{-- <div class="image_block" v-for="(food,i) in images" :class="(i == indexOfImage) ? active : ''" alt="">
                      <h3>PROVA</h3>
                      <img :src="food">
                    </div> --}}
                </div>
              </div>

              <div class="next">
                  <i class="fas fa-angle-right" @click="stopAuto(),forward()"></i>
              </div>
          </div>
      {{-- <h1 class="text-center">Le novità</h1>
      <div class="box-cards container text-center">
        <div class="card_food" v-for="food in foods">
          <img :src="'{{ asset('/storage') }}' + '/' + food.image" alt="sales" v-on:mouseover="stopRotation"
          v-on:mouseout="startRotation">
          <h5>@{{ food.name }}</h5>
          <p>@{{ food.description }}</p>
        </div>
      </div> --}}
    </section>

    <section id="carousel-type">
      <div class="types">
        <div v-for="card in carousel" @click='filter(card.type)'>
          <img :src="card.image" alt="sales">
          <h5> @{{ card.type }}</h5>
        </div>
      </div class="types">
    </section>

    {{-- RESTAURANTS --}}
    <section id="restaurants">
      <h1 class="text-center">I nostri ristoranti</h1>
        <div :style="{backgroundImage: 'url(' + 'http://127.0.0.1:8000/storage' + '/' + restaurant.image + ')'}" style="background-repeat: no-repeat; background-size: cover;" class="card_rest animate__animated animate__fadeInLeft" v-for="restaurant in restaurants">
          <a href="#">
            <div class="layover">
              <h3>@{{ restaurant.name }}</h3>
            </div>
            <div class="overlay">
              <h2><strong>@{{ restaurant.name }}</strong></h2>
              <p>@{{ restaurant.address }}</p>
              <p>@{{ restaurant.phone_number }}</p>
            </div>
          </a>

        </div>
      </div>
    </section>

  </main>

  <script src="{{ asset('js/home.js') }}"></script>
@endsection
