@extends('layouts.guest')

@section('content')

  <main class="container back-color">

    <h1>pagina index di guest - prima pagina del sito</h1>

    <div id="jumbotron" class="bg-info p-4">
      <h3>Jumbotron - slider con i ristoranti piu votati</h3>
    </div>

    <div id="types" class="bg-warning p-4">
      <h3>Types - Navbar con le tipologie di ristorante</h3>
    </div>

    <div id="restaurants" class="bg-success p-4">
      <h3>Restaurants - Elenco dei ristoranti</h3>
    </div>

  </main>

@endsection