@extends('layouts.app')

@section('content')
    
    <div class="container my-4">
        <h2 class="display-4">{{ $dish->name}}</h2>
        @if ($dish->visible == 0) 
          <span class="badge badge-danger mb-2" style="font-size: 120%;"> Non Disponibile </span>     
        @endif
        @if ($dish->vegetarian == 1) 
          <span class="badge badge-success mb-2" style="font-size: 120%;"> Vegetarian </span>     
        @endif
        <div>
            <img src="{{ asset('storage/' . $dish->image) }}" alt="{{ $dish->name}}" style="width: 100%;  border: 10px solid #F0F0F1">
        </div>
        <table class="table table-light table-striped table-bordered">
            <tr>                
                <td style="width: 150px">
                    <strong>Ingredienti: </strong>
                </td>
                <td>
                    {{ $dish->ingredients }}
                </td>
            <tr>
                <td style="width: 150px">
                    <strong>Descrizione: </strong> 
                </td>
                <td>
                    {{ $dish->description }}
                </td>     
            </tr>
            <tr>
                <td style="width: 150px">
                    <strong>Prezzo: </strong> 
                </td>
                <td>
                    {{ number_format($dish->price, 2) }} &euro; 
                </td>     
            </tr>
            <tr>
                <td style="width: 150px">
                    <strong>Creato il: </strong> 
                </td>
                <td>
                    {{ date('j F, Y', strtotime($dish->created_at)) }} 
                </td>     
            </tr>        
        </table>
        <a href="{{ route('admin.dishes.index') }}" class="btn btn-lg btn-dark">Torna alla home</a>
    </div>

@endsection