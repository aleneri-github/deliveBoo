@extends('layouts.guest')

@section('content')

  @dump($restaurant->dishes);
  <h1>view show</h1>

  <p>{{ $restaurant->name }}</p>
  <img src="{{ asset('storage/' . $restaurant->image) }}" alt="">
    
@endsection