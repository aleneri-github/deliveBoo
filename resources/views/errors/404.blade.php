@extends('layouts.guest')

@section('content')
<div id="page-404" >
    <div class="container">
        <h1>Ops!!</h1>
        <h3>Ci dispiace ma nemmeno Adamo ha trovato il tuo piatto</h3>
        <img src="{{ asset('img/404.png') }}" alt="" srcset="">
    </div>
</div>
@endsection