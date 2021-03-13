@extends('layouts.app')

@section('content')
    
    @foreach ($foods as $food)
        <div class="card m-3" style="width: 20rem;">
        <img class="card-img-top" src="{{-- $food->image --}}" alt="{{-- $food->title --}}">
        <div class="card-body">
            <h3 class="card-title">{{-- $food->title --}}</h3>
            <p class="card-text">{{-- substr($food->ingredients, 0, 100) . " ..." --}}</p>
            <p class="card-text"><strong>{{-- $food->author --}}</strong></p>
        </div>

        <div class="card-footer">

            {{-- SHOW --}}
            <a href="{{-- route('articles.show', $article->slug) --}}" class="btn btn-outline-primary">Leggi di più</a>

            {{-- EDIT --}}
            <a href="{{-- route('articles.edit', $article->id) --}}" class="btn btn-outline-primary">
            <i class="fas fa-pencil-alt"></i>
            </a>
            
            {{-- DESTROY --}}
            <form action="{{-- route('articles.destroy', $article->id) --}}" method="POST" class="d-inline">
            @csrf
            @method('DELETE')
            <button class="btn btn-outline-danger">
                <i class="fas fa-trash-alt"></i>
            </button>
            </form>

        </div>

    </div>
    @endforeach

@endsection