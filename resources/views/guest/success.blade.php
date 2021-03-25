@extends('layouts.guest')

@section('content')

{{-- <transition name="fade" mode="out-in">
    
    <div key=1 v-if="loader == true" class="loading_page">
        <h1>Solo un attimo...</h1>
        <img src="{{ asset('img/jumb-2.svg') }}" alt="">
    </div>

    <div key=2 v-else> --}}

        <div id="confirmation" >
            <div class="container">
                <h1>Grazie</h1>
                <img src="{{ asset('img/tenor.gif') }}" alt="" srcset="">
                <h5>Ordine effettuato correttamente</h5>
            </div>
        </div>

    {{-- </div>

</transition> --}}
<script src="{{ asset('js/success.js') }}"></script>
@endsection