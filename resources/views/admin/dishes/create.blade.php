@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="header-admin d-flex justify-content-between">
            <h1>Crea un nuovo piatto</h1>
            <div class="icon">
                <a href="{{ route('admin.dishes.index') }}">
                    <i class="fas fa-chevron-circle-left"></i>
                </a>
            </div> 
        </div>

        @if (session('message'))
            <div class="alert-danger my-4 p-2">
                <div class="alert-danger mx-4 p-2">
                    {{ session('message') }}
                </div>
            </div>
         @endif

        @if ($errors->any())
            <div class="alert alert-danger">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        <form action="{{ route('admin.dishes.store') }}" method="POST" enctype="multipart/form-data">
            @csrf
            @method('POST')

            <div class="form-group">
                <label for="name">Nome del piatto</label>
                <input class="form-control" type="text" id="name" name="name" value="{{ old('name') }}">
            </div>

            <div class="form-group">
                <label for="ingredients">Ingredienti</label>
                <textarea class="form-control" id="ingredients" name="ingredients" rows="4" cols="50" value="{{ old('ingredients') }}"></textarea>
            </div>

            <div class="form-group">
                <label for="description">Descrivi il tuo piatto</label>
                <textarea class="form-control" id="description" name="description" rows="4" cols="50" value="{{ old('description') }}"></textarea>
            </div>

            <div class="form-group">
                <label for="name">Prezzo</label>
                <input class="form-control" type="text" id="price" name="price" value="{{ old('price') }}">
            </div>

            <div class="form-group">
                <label for="image">Inserisci una immagine del prodotto</label>
                <input class="form-control" type="file" name="image" id="image" accept="image/*">
            </div>


            <div class="form-group">
                <div class="form-check">
                    <input class="form-check-input" type="checkbox" name="vegetarian" id="vegetarian"
                    @if (old('vegetarian') == 1) checked @endif value="1">
                    <label class="form-check-label" for="vegetarian">Vegetariano</label>
                </div>
            </div>

             <div class="form-group">
                <div class="form-group">
                    <div class="form-check">
                        <input class="form-check-input" type="checkbox" name="visible" id="visible"
                        @if (old('vegetarian') == 1) checked @endif value="1">
                        <label class="form-check-label" for="visible">Disponibile</label>
                    </div>
                </div>
            </div>

            <input class="btn btn-dark" type="submit" value="Crea">
        </form>
    </div>
    <script src="{{ asset('js/dashboard.js') }}" defer></script>
@endsection
