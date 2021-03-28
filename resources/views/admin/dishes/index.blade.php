@extends('layouts.app')

@section('content')
{{-- sezione ristorante --}}
<div id="indexMenu" class="container">

    <div class="d-flex justify-content-between p-3">
        <div>
            <h2><strong>I tuoi piatti</strong></h2>
        </div>

        <div class="icon">
            <a href="{{ route('admin.dishes.create')}}">
                <i class="fas fa-plus-circle"></i>
            </a>
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

        <div class="row-info">
            <div class="tab tab-10">
                Ordinati
            </div>
            <div class="tab tab-big">
                Nome
            </div>
            <div class="tab tab-10">
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

        <div class="{{ $dish->visible == 0 ? 'row-food d-flex row-visible' : 'row-food d-flex'}}">
            <div class="left-side">
                <div class="tab tab-10 tab-id">
                    {{ $dish->totOrdini }}
                </div>
                <div class="tab tab-big">
                    <span>{{ $dish->name }}</span>
                </div>
                <div class="tab tab-10">
                    <img src="{{ asset('storage/' . $dish->image) }}" alt="">
                </div>
            </div>
            <div class="right-side">
                <div class="tab">
                    {{-- EDIT --}}
                    <a href="{{ route('admin.dishes.edit', $dish->id) }}" class="btn-outline">
                        <i class="fas fa-pencil-alt"></i>
                    </a>
                </div>
                <div class="tab">
                     {{-- DESTROY --}}
                     <form action="{{ route('admin.dishes.destroy', $dish->id) }}" method="POST" class="d-inline" onSubmit="return confirm ('Sei sicuro di voler cancellare questo piatto?')">
                        @csrf
                        @method('DELETE')
                        <button class="btn">
                            <i class="fas fa-trash-alt"></i>
                        </button>
                    </form>
                </div>
                <div class="tab">
                     {{-- SHOW --}}
                    <button class="btn">
                        <a href="{{ route('admin.dishes.show', $dish->slug) }}" class="btn-outline">
                            <i class="fas fa-search-plus"></i>
                        </a>
                    </button>
                </div>
            </div>
        </div>
        @endforeach
    </div>
</div>
<script src="{{ asset('js/dashboard.js') }}" defer></script>

@endsection
