@extends('layouts.app')


@section('content')
    <div id="statistics">
        <div class="chart_container">
            <canvas id="myChart"></canvas>
        </div>

        <div class="chart_container">
            <canvas id="myChartTwo"></canvas>
        </div>
    </div>

<script src="{{ asset('js/statistics.js') }}" defer></script>
<script>
  window.token = "{{ $token }}";
</script>
@endsection
