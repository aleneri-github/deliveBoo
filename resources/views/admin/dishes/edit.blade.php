@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="header-admin d-flex justify-content-between">
            <h1>Modifica il tuo piatto</h1>
            <div class="icon">
                <a href="{{ route('admin.dishes.index') }}">
                    <i class="fas fa-chevron-circle-left"></i>
                </a>
            </div>
        </div>

        @if ($errors->any())
            <div class="alert alert-danger">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        <form action="{{ route('admin.dishes.update', $dish->id) }}" method="POST" enctype="multipart/form-data">
            @csrf
            @method('PUT')

            <div class="form-group">
                    <label for="name">Nome del piatto</label>
                    <input class="form-control" maxlength="50" type="text" id="name" name="name" value="{{ $dish->name }}">
                </div>

                <div class="form-group">
                    <label for="ingredients">Ingredienti</label>
                    <textarea class="form-control" maxlength="500" id="ingredients" name="ingredients" rows="4" cols="50">{{ $dish->ingredients }}</textarea>
                </div>

                <div class="form-group">
                    <label for="description">Descrivi il tuo piatto</label>
                    <textarea class="form-control" maxlength="500" id="description" name="description" rows="4" cols="50">{{ $dish->description }}</textarea>
                </div>

                <div class="form-group">
                    <label for="name">Prezzo</label>
                    <input class="form-control" type="number" min="0" max="99" step=".01" id="price" name="price" value="{{ $dish->price }}">
                </div>

                <div class="form-group">
                    <label for="image">Immagine del prodotto</label>
                    @if(!empty($dish->image))
                        <img class="img-fluid d-block" src="{{ asset('storage/' . $dish->image) }}" alt="{{ $dish->name }}">
                    @endif
                    <p class="mt-2">Modifica l'immagine precedentemente caricata</p>
                    <input type="file" class="form-control" id="image" name="image" accept="image/*">
                </div>


                <div class="form-group">
                    <div class="form-check">
                        <input class="form-check-input" type="checkbox" name="vegetarian" id="vegetarian"
                        @if ($dish->vegetarian == 1) checked @endif value="1">
                        <label class="form-check-label" for="vegetarian">Vegetariano</label>
                    </div>
                </div>

                <div class="form-group">
                    <div class="form-group">
                        <div class="form-check">
                            <input class="form-check-input" type="checkbox" name="visible" id="visible"
                            @if ($dish->visible == 1) checked @endif value="1">
                            <label class="form-check-label" for="visible">Disponibile</label>
                        </div>
                    </div>
                </div>

            <button type="submit" class="btn btn-dark">Salva le modifiche</button>

        </form>
    </div>
    <script src="{{ asset('js/dashboard.js') }}" defer></script>
@endsection
