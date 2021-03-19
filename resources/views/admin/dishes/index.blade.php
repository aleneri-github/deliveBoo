@extends('layouts.app')

@section('content')
{{-- sezione ristorante --}}
<div id="index-Menu" class="container">
    <div >
        <div class="d-flex justify-content-between p-3">
            <div>
                <h2><strong>I tuoi piatti</strong></h2>
            </div>
    
            <div>
                <a href="{{ route('admin.dishes.create')}}" class="btn btn-primary">Crea un nuovo piatto</a>
            </div>
        </div>
    </div>
    
    <div class="box-menu">
    
    
        {{-- sezione messaggi --}}
        @if (session('message'))
            <div class="message-success my-4 p-2">
                <div class="alert-success mx-4 p-2">
                    {{ session('message') }}
                </div>
            </div>
        @endif

        @foreach ($dishes as $dish)
        <div class="row-food d-flex">
            <div class="tab tab-10">
                {{ $dish->id }}
            </div>
            <div class="tab tab-big">
                {{ $dish->name }}
            </div>
            <div class="tab tab-10">
                {{ number_format($dish->price, 2) }} €
            </div>
            <div class="tab tab-10">
                <img src="{{ asset('storage/' . $dish->image) }}" alt="">
            </div>
            <div class="tab tab-10">
                {{-- EDIT --}}
                <a href="{{ route('admin.dishes.edit', $dish->id) }}" class="btn-outline">
                    <i class="fas fa-pencil-alt"></i>
                </a>                
            </div>
            <div class="tab tab-10">
                 {{-- DESTROY --}}
                 <form action="{{ route('admin.dishes.destroy', $dish->id) }}" method="POST" class="d-inline" onSubmit="return confirm ('Sei sicuro di voler cancellare questo piatto?')">
                    @csrf
                    @method('DELETE')
                    <button class="btn">
                        <i class="fas fa-trash-alt"></i>
                    </button>
                </form>
            </div>
            <div class="tab tab-10">
                 {{-- SHOW --}}
                <button v-on:click="fadeMe" class="btn">
                    <i class="fas fa-chevron-down"></i>
                </button>
            </div>
        </div>
        @endforeach
        
    
        {{-- CARDS --}}

        {{-- <div class="container d-flex flex-wrap">
            @foreach ($dishes as $dish)
    
                <div class="card shadow" style="width: calc(100% / 3 - 20px); margin: 10px;">
    
                    <img style="height:40%" class="card-img-top" src="{{ asset('storage/' . $dish->image) }}" alt="{{ $dish->name }}">
                    <div class="card-body">
                        <h3 class="card-title">{{ $dish->name }}</h3>
                        <p class="card-text">{{ substr($dish->description, 0, 60) . " ..." }}</p>
                        <p class="{{ $dish->vegetarian == 1 ? 'btn btn-success' : 'btn btn-success disabled' }}">vegetariano</p>
                        <p class="{{ $dish->visible == 1 ? 'btn btn-success' : 'btn btn-success disabled' }}">disponibile</p>
                    </div>
    
                    <div class="card-footer">
    
                        <a href="{{ route('admin.dishes.show', $dish->slug) }}" class="btn btn-outline-primary">Leggi di più</a>
    
                        <a href="{{ route('admin.dishes.edit', $dish->id) }}" class="btn btn-outline-primary">
                        <i class="fas fa-pencil-alt"></i>
                        </a>
    
                     
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
    
        </div> --}}
    
    </div>
</div>

@endsection
