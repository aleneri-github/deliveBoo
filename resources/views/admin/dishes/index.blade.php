@extends('layouts.app')

@section('content')
{{-- sezione ristorante --}}
<div id="index-Menu" class="container">
    
    <div class="d-flex justify-content-between p-3">
        <div>
            <h2><strong>I tuoi piatti</strong></h2>
        </div>

        <div>
            <a href="{{ route('admin.dishes.create')}}" class="btn btn-dark">Crea un nuovo piatto</a>
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

        <div class="row-food row-info d-flex">
            <div class="tab tab-10">
                ID
            </div>
            <div class="tab tab-big">
                Nome
            </div>
            <div class="tab tab-10">
                {{-- EDIT --}}               
            </div>
            <div class="tab tab-10">
                 {{-- DESTROY --}}
            </div>
            <div class="tab tab-10">
                 {{-- SHOW --}}
            </div>
        </div>

        @foreach ($dishes as $key => $dish)
        <div class="row-food d-flex" 
        :class="{{ $key }} == indexOfList ? 'row-active' : '' "
        >
        
            <div class="tab tab-10">
                {{ $dish->id }}
            </div>
            <div class="tab tab-big">
                {{ $dish->name }}
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
                <button v-on:click="fadeMe({{ $key }}); isActive = !isActive" class="btn">
                    <i v-if="show == false" class="fas fa-chevron-down"></i>
                    <i v-if="show == true" class="fas fa-chevron-up"></i>
                </button>
            </div>
        </div>
        <transition name="fade">
            <div class="dish-show" :class="{{ $key }} == indexOfList ? 'dish-active' : 'dish-show' ">
                <div class="img-show">
                    <img src="{{ asset('storage/' . $dish->image) }}" alt="">
                </div>
                <div class="info-show">
                    {{-- <div class="img-info">
                        <img src="{{ asset('img/foglia.svg') }}" alt="">
                    </div> --}}
                    <p><span>Ingredienti:</span>  {{ $dish->ingredients }}</p>
                    <p><span>Descrizione:</span>  {{ $dish->description }}</p>
                    <p><span>Prezzo:</span>  {{ number_format($dish->price, 2) }} €</p>
                </div>
            </div>
        </transition>
        @endforeach
    </div>
</div>
<script src="{{ asset('js/dashboard.js') }}" defer></script>

@endsection
