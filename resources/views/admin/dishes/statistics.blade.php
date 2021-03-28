@extends('layouts.app')


@section('content')
    <div id="statistics">
      <div v-if="loader == true" class="spinner">
        <i class="fas fa-spinner fa-pulse"></i>
      </div>

      <div :class="visibility">

        <div class="input-group mb-3" style="width: 180px;">
          <div class="input-group-prepend">
            <label class="input-group-text" for="inputGroupSelect01">Mensilità</label>
          </div>
          <select class="custom-select" id="inputGroupSelect01" v-model="months" @change="filterMonths()">
            <option value="4" selected>4 Mesi</option>
            <option value="8">8 Mesi</option>
            <option value="12">12 Mesi</option>
          </select>
        </div>

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
        <div id="stat_data_container">
          <div id="top_bot_dish">
            <p v-cloak>Piatto più venduto: <br> <span class="dish_name">@{{ topDish }}</span></p>
            <p v-cloak>Piatto meno venduto: <br> <span class="dish_name">@{{ bottDish }}</span></p>
          </div>
          <div class="data">
            <div class="data-top">
                <div class="box">
                  <span id="orders_total_stat"><i class="fas fa-circle-notch fa-pulse"></i></span>
                  <p>Ordini</p>
                </div>
                <div class="box">
                  <span>{{ count($restaurant->dishes) }}</span>
                  <p>Food</p>
                </div>
                <div class="box">
                  <span id="revenue_total_stat"><i class="fas fa-circle-notch fa-pulse"></i></span>
                  <p>Incasso</p>
                </div>
            </div>
          </div>
        </div>
      </div>

    </div>

<script src="{{ asset('js/statistics.js') }}" defer></script>

@endsection
