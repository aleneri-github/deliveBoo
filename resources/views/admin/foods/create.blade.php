@extends('layouts.app')

@section('content')
    <div class="container">
        <h1>Crea un nuovo piatto</h1>

        @if ($errors->any())
            <div class="alert alert-danger">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        <form action="{{ route('admin.foods.store') }}" method="POST" enctype="multipart/form-data">
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
                <label for="image">Testo</label>
                <input class="form-control" type="file" name="image" id="image" accept="image/*">
            </div>

            <div class="form-group">
                <h4>Questo piatto è disponibile?</h4>
                <div class="custom-control custom-radio">
                    <input type="radio" id="visible_true" name="visible" class="custom-control-input" value="true">
                    <label class="custom-control-label" for="visible_true">Si</label>
                </div>

                <div class="custom-control custom-radio">
                    <input type="radio" id="visible_false" name="visible" class="custom-control-input" value="false">
                    <label class="custom-control-label" for="visible_false">No</label>
                </div>
            </div>

            <div class="form-group">
                <h4>Questo piatto è vegetariano?</h4>
                <div class="custom-control custom-radio">
                    <input type="radio" id="vegetarian_true" name="vegetarian" class="custom-control-input" value="true">
                    <label class="custom-control-label" for="vegetarian_true">Si</label>
                </div>

                <div class="custom-control custom-radio">
                    <input type="radio" id="vegetarian_false" name="vegetarian" class="custom-control-input" value="false">
                    <label class="custom-control-label" for="vegetarian_false">No</label>
                </div>
            </div>

            

            <input class="btn btn-primary" type="submit" value="Crea">
        </form>
    </div>
@endsection