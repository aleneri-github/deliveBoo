@extends('layouts.app')

@section('content')
    <div class="container">
        <h1>Modifica il tuo piatto</h1>

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
                    <input class="form-control" type="text" id="name" name="name" value="{{ $dish->name }}">
                </div>

                <div class="form-group">
                    <label for="ingredients">Ingredienti</label>
                    <textarea class="form-control" id="ingredients" name="ingredients" rows="4" cols="50" value="{{ $dish->ingredients }}"></textarea>
                </div>

                <div class="form-group">
                    <label for="description">Descrivi il tuo piatto</label>
                    <textarea class="form-control" id="description" name="description" rows="4" cols="50" value="{{ $dish->description }}"></textarea>
                </div>

                <div class="form-group">
                    <label for="name">Prezzo</label>
                    <input class="form-control" type="text" id="price" name="price" value="{{ $dish->price }}">
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
            
            <button type="submit" class="btn btn-primary">Salva le modifiche</button>

        </form>
        
        <a href="{{ route('admin.dishes.index') }}" class="btn btn-secondary">Indietro</a>
    
    </div>
@endsection