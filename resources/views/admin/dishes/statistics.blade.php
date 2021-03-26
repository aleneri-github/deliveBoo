@extends('layouts.app')


@section('content')
    <div id="statistics">
      <div v-if="loader == true" class="spinner">
        <i class="fas fa-spinner fa-pulse"></i>
      </div>

      <div :class="visibility">
        <div class="chart_container_lg" v-cloak>
            <canvas id="myChart"></canvas>
        </div>

        <div class="chart_container_lg" v-cloak>
            <canvas id="myChartTwo"></canvas>
        </div>

        <div class="chart_container_md" v-cloak>
            <h6>Ordini</h6>
            <canvas id="myChartThree"></canvas>
        </div>

        <div class="chart_container_md" v-cloak>
            <h6>Entrate</h6>
            <canvas id="myChartFour"></canvas>
        </div>
        <div id="top_bot_dish">
          <p v-cloak>Piatto più venduto: <br> <span class="dish_name">@{{ topDish }}</span></p>
          <p v-cloak>Piatto meno venduto: <br> <span class="dish_name">@{{ bottDish }}</span></p>
        </div>
      </div>

    </div>

<script src="{{ asset('js/statistics.js') }}" defer></script>
<script>
  window.token = "{{ $token }}";
</script>
@endsection
