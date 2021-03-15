@extends('layouts.app')

@section('content')
{{-- sezione ristorante --}}
<div class="container">
    <div class="d-flex justify-content-between p-3">
        <h2><strong>{{ $restaurant->name }}</strong></h2>
        <a href="{{ route('admin.dishes.create')}}" class="btn btn-primary">Crea un nuovo piatto</a>
    </div>
</div>

<div class="container">


    {{-- sezione messaggi --}}
    @if (session('message'))
            <div class="message-success my-4">
            <div class="alert-success mx-4">
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

                <img class="card-img-top" src="{{ asset('storage/' . $dish->image) }}" alt="{{ $dish->name }}">
                <div class="card-body">
                    <h3 class="card-title">{{ $dish->name }}</h3>
                    <p class="card-text">{{ substr($dish->description, 0, 60) . " ..." }}</p>
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

    </div>

</div>

@endsection