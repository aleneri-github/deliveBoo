require('./bootstrap');
import Vue from 'vue';
import Chart from 'chart.js';

let prova = require('./orders.json');

var statistics = new Vue(
    {
        el: "#statistics",
        data: {
            orders: [],
            labels: [],
            dataOrders: [],
        },
        methods: {
            createChart() {
                let myChart = document.getElementById('myChart').getContext('2d');
                let myChartTwo = document.getElementById('myChartTwo').getContext('2d');

                let ordini = new Chart(myChart, {
                    type: 'bar',
                    data: {
                        labels: this.labels.reverse(),
                        datasets: [{
                            label: 'Ordini',
                            data: this.dataOrders.reverse(),
                            backgroundColor: [
                                'rgba(255, 99, 132, 0.2)',
                                'rgba(54, 162, 235, 0.2)',
                                'rgba(255, 206, 86, 0.2)',
                                'rgba(75, 192, 192, 0.2)',
                            ],
                            borderColor: [
                                'rgba(255, 99, 132, 1)',
                                'rgba(54, 162, 235, 1)',
                                'rgba(255, 206, 86, 1)',
                                'rgba(75, 192, 192, 1)',
                            ],
                            borderWidth: 1
                        }]
                    },
                    options: {

                    }
                });

                let entrate = new Chart(myChartTwo, {
                    type: 'line',
                    data: {
                        labels: ['Gennaio', 'Febbraio', 'Marzo', 'Aprile'],
                        datasets: [{
                            label: 'Entrate Mensili',
                            data: [12, 8, 32, 9],
                            backgroundColor: [
                                'rgba(255, 99, 132, 0.2)',
                                'rgba(54, 162, 235, 0.2)',
                                'rgba(255, 206, 86, 0.2)',
                                'rgba(75, 192, 192, 0.2)',
                            ],
                            borderColor: [
                                'rgba(255, 99, 132, 1)',
                                'rgba(54, 162, 235, 1)',
                                'rgba(255, 206, 86, 1)',
                                'rgba(75, 192, 192, 1)',
                            ],
                            borderWidth: 1
                        }]
                    },
                    options: {

                    }
                });
            }
        },
        mounted() {
          axios.get(`http://localhost:8000/api/orders?api_token=` + token).then(response => {
                this.labels = response.data.months
                this.dataOrders = response.data.values
                console.log(this.labels, this.dataOrders);
                this.createChart();
            });
        },
    }
);
