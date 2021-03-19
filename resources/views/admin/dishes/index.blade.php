@extends('layouts.app')

@section('content')
{{-- sezione ristorante --}}
<div class="container">
    <div class="d-flex justify-content-between p-3">
        <div>
            <h2><strong>{{ $restaurant->name }}</strong></h2>
            <ul>
                @foreach ($restaurant->types as $type)
                    <li class="badge badge-success p-2">{{ $type->name }}</li>
                @endforeach
            </ul>
        </div>

        <div>
            <a href="{{ route('admin.dishes.create')}}" class="btn btn-primary">Crea un nuovo piatto</a>
        </div>
    </div>


</div>

<div class="container">


    {{-- sezione messaggi --}}
    @if (session('message'))
        <div class="message-success my-4 p-2">
            <div class="alert-success mx-4 p-2">
                {{ session('message') }}
            </div>
        </div>
    @endif

    {{-- CARDS --}}
    <div class="container d-flex flex-wrap">
        @foreach ($dishes as $dish)

            <div class="card shadow" style="width: calc(100% / 3 - 20px); margin: 10px;">

                {{-- <div class="card-header bg-info">
                    <h3 class="card-title">{{ $dish->name }}</h3>
                </div> --}}

                <img style="height:40%" class="card-img-top" src="{{ asset('storage/' . $dish->image) }}" alt="{{ $dish->name }}">
                <div class="card-body">
                    <h3 class="card-title">{{ $dish->name }}</h3>
                    <p class="card-text">{{ substr($dish->description, 0, 60) . " ..." }}</p>
                    <p class="{{ $dish->vegetarian == 1 ? 'btn btn-success' : 'btn btn-success disabled' }}">vegetariano</p>
                    <p class="{{ $dish->visible == 1 ? 'btn btn-success' : 'btn btn-success disabled' }}">disponibile</p>
                </div>

                <div class="card-footer">

                    {{-- SHOW --}}
                    <a href="{{ route('admin.dishes.show', $dish->slug) }}" class="btn btn-outline-primary">Leggi di più</a>

                    {{-- EDIT --}}
                    <a href="{{ route('admin.dishes.edit', $dish->id) }}" class="btn btn-outline-primary">
                    <i class="fas fa-pencil-alt"></i>
                    </a>

                    {{-- DESTROY --}}
                    <form action="{{ route('admin.dishes.destroy', $dish->id) }}" method="POST" class="d-inline" onSubmit="return confirm ('Sei sicuro di voler cancellare questo piatto?')">
                    @csrf
                    @method('DELETE')
                    <button class="btn btn-outline-danger">
                        <i class="fas fa-trash-alt"></i>
                    </button>
                    </form>

                </div>
            </div>

        @endforeach

    </div>

</div>

@endsection
