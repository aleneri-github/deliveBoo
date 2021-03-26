@extends('layouts.guest')

@section('content')
        <div id="confirmation" >
            <div class="container">
                <h1>Grazie</h1>
                <img src="{{ asset('img/tenor.gif') }}" alt="" srcset="">
                <h5>Ordine effettuato correttamente</h5>
                <h5>A breve verrai reindirizzato alla Home...</h5>
            </div>
        </div>

<script src="{{ asset('js/success.js') }}"></script>
@endsection
