@extends('layouts.main')

@section('header')
    <h1 class="mt-5">Modifica la tua Birra fatta in casa</h1>
@endsection

@section('content')
    @if ($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form action="{{ route('beers.update', $beer->id) }}" method="POST">
        @csrf
        @method('PUT')
        <div class="form-group">
            <label for="name">Nome della Birra</label>
            <input type="text" class="form-control" name="name"  id="name" placeholder="Nome della Birra" value="{{ $beer->name }}">
        </div>
        <div class="form-group">
            <label for="brand">La tua marca</label>
            <input type="text" class="form-control" name="brand" id="brand" placeholder="La tua marca" value="{{ $beer->brand }}">
        </div>
        <div class="form-group">
            <label for="price">Prezzo</label>
            <input type="text" class="form-control" name="price" id="price" placeholder="Prezzo" value="{{ $beer->price }}">
        </div>
        <div class="form-group">
            <label for="content">Grado alcolico</label>
            <input type="text" class="form-control" name="content"  id="content" placeholder="Grado alcolico" value="{{ $beer->content }}">
        </div>
        
        <button type="submit" class="btn btn-primary">Salva</button>
        <a href="{{ route('beers.index') }}" class="btn btn-secondary">Indietro</a>
    </form>
@endsection