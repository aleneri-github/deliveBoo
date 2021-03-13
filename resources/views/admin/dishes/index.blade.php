@extends('layouts.app')

@section('content')
    
<div class="d-flex flex-wrap p-5 container">
    @foreach ($dishes as $dish)

        <div class="card m-3" style="width: 20rem;">
            <img class="card-img-top" src="{{ $dish->image }}" alt="{{ $dish->name }}">
            <div class="card-body">
                <h3 class="card-title">{{ $dish->name }}</h3>
                <p class="card-text">{{ substr($dish->ingredients, 0, 100) . " ..." }}</p>
                {{-- <p class="card-text"><strong>{{ $dish->author }}</strong></p> --}}
            </div>

            <div class="card-footer">

                {{-- SHOW --}}
                <a href="{{ route('admin.dishes.show', $dish->slug) }}" class="btn btn-outline-primary">Leggi di più</a>

                {{-- EDIT --}}
                <a href="{{ route('admin.dishes.edit', $dish->id) }}" class="btn btn-outline-primary">
                <i class="fas fa-pencil-alt"></i>
                </a>
                
                {{-- DESTROY --}}
                <form action="{{ route('admin.dishes.destroy', $dish->id) }}" method="POST" class="d-inline">
                @csrf
                @method('DELETE')
                <button class="btn btn-outline-danger">
                    <i class="fas fa-trash-alt"></i>
                </button>
                </form>

            </div>
        </div>

    @endforeach

    {{-- Bottone per crare un nuovo piatto --}}
    <div>
        <a href="{{ route('admin.dishes.create')}}" class="btn btn-primary">Crea un nuovo piatto</a>
    </div>
</div>

@endsection