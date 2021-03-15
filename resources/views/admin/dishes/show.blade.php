@extends('layouts.app')

@section('content')
    
    <div class="container my-4">
        <h2 class="display-4 text-center">{{ $dish->name}}</h2>
        {{-- <h3 class="text-center mb-4">{{ $dish->ingredients}}</h3> --}}
        <img src="{{ asset('storage/' . $dish->image) }}" alt="{{ $dish->name}}" style="width: 500px">
        </div>
        <p class="mt-4">{{ $dish->ingredients }}</p>
        <p><strong>Ingredienti: </strong>{{ $dish->description }}</p>
        {{-- <p class="mb-4"><strong>Data di pubblicazione: </strong>{{ $dishes->publication_date }}</p> --}}

        <a href="{{ route('admin.dishes.index') }}" class="btn btn-lg btn-outline-primary">Torna alla home</a>
    </div>

@endsection