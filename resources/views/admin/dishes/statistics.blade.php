@extends('layouts.app')


@section('content')
    <div style="width: 760px; height: 380px;">
        <canvas id="myChart"></canvas>
    </div>
<script src="{{ asset('js/statistics.js') }}" defer></script>
@endsection