@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="header-admin">
            <div class="icon">
                <a href="{{ route('admin.dishes.index') }}">
                    <i class="fas fa-chevron-circle-left"></i>
                </a>
            </div>
        </div>
        <div class="dish-show">

            <div class="img-show">
                <img src="{{ asset('storage/' . $dish->image) }}" alt="">
            </div>

            <div class="info-show">
                <h4>{{ $dish->name}}</h4>
                <h6>Ingredienti</h6>
                <p>{{ $dish->ingredients }}</p>
                <h6>Descrizione</h6>
                <p><span> {{ $dish->description }}</p>
                <h6>Prezzo</h6>
                <p>{{ number_format($dish->price, 2) }} €</p>
                <h6>Creato</h6>
                <p>{{ date('j F, Y', strtotime($dish->created_at)) }} </p>
                <div class="vegan">
                    @if ($dish->vegetarian == 1)
                    <img src="{{ asset('img/foglia.svg') }}" alt="leaf">
                    @endif
                </div>
            </div>
        </div>
    </div>
<script src="{{ asset('js/dashboard.js') }}" defer></script>


@endsection
