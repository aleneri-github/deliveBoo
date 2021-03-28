require('./bootstrap');
import Vue from 'vue';
import Chart from 'chart.js';

let prova = require('./orders.json');

var statistics = new Vue(
    {
        el: "#statistics",
        data: {
            colorsArray: ['rgba(165, 97, 228, 1)',
            'rgba(208, 222, 9, 1)',
            'rgba(183, 22, 6, 1)',
            'rgba(175, 97, 31, 1)',
            'rgba(174, 217, 243, 1)',
            'rgba(48, 96, 226, 1)',
            'rgba(240, 252, 193, 1)',
            'rgba(57, 52, 254, 1)',
            'rgba(96, 16, 171, 1)',
            'rgba(7, 57, 71, 1)',
            'rgba(62, 203, 134, 1)',
            'rgba(185, 232, 113, 1)'],
            orders: [],
            labels: [],
            dataOrders: [],
            dataTotals: [],
            topDish: '',
            bottDish: '',
            loader: true,
            visibility: 'hidden',
            months: 4,
            pieOrders: '',
            pieRevenues: '',
            orders: '',
            revenues: ''
        },
        methods: {
            createChart() {

                let myChart = document.getElementById('myChart').getContext('2d');
                let myChartTwo = document.getElementById('myChartTwo').getContext('2d');
                let myChartThree = document.getElementById('myChartThree').getContext('2d');
                let myChartFour = document.getElementById('myChartFour').getContext('2d');


                this.pieOrders = new Chart(myChartThree, {
                    type: 'pie',
                    data: {
                        labels: this.labels,
                        datasets: [{
                            data: this.dataOrders,
                            backgroundColor: this.colorsArray,
                            borderColor: 'rbg(0,0,0)',
                            borderWidth: 1
                        }]
                    },
                    options: {
                      legend: {
                        display: false
                      }
                    }
                });

                this.pieRevenues = new Chart(myChartFour, {
                    type: 'pie',
                    data: {
                        labels: this.labels,
                        datasets: [{
                            data: this.dataTotals,
                            backgroundColor: this.colorsArray,
                            borderColor: 'rbg(0,0,0)',
                            borderWidth: 1
                        }]
                    },
                    options: {
                      legend: {
                        display: false
                      }
                    }
                });

                this.orders = new Chart(myChart, {
                    type: 'bar',
                    data: {
                        labels: this.labels,
                        datasets: [{
                            label: 'Ordini',
                            data: this.dataOrders,
                            backgroundColor: this.colorsArray,
                            borderColor: 'rbg(0,0,0)',
                            borderWidth: 2
                        }]
                    },
                    options: {
                      scales: {
                        yAxes: [{
                          ticks: {
                            beginAtZero: true
                          }
                        }]
                      }
                    }
                });

                this.revenues = new Chart(myChartTwo, {
                    type: 'line',
                    data: {
                        labels: this.labels,
                        datasets: [{
                            label: 'Entrate Mensili',
                            data: this.dataTotals,
                            backgroundColor: this.colorsArray,
                            borderColor: 'rbg(0,0,0)',
                            borderWidth: 2
                        }]
                    },
                    options: {
                      scales: {
                        yAxes: [{
                          ticks: {
                            beginAtZero: true
                          }
                        }]
                      }
                    }
                });

                this.$forceUpdate();

            },
            filterMonths() {
              axios.get(`http://localhost:8000/api/orders?api_token=` + token + '&months=' + this.months).then(response => {
                this.dataOrders = response.data.values.reverse();
                this.dataTotals = response.data.total.reverse();
                this.labels = response.data.months.reverse();
                this.pieOrders.destroy();
                this.pieOrders = new Chart(myChartThree, {
                      type: 'pie',
                      data: {
                          labels: this.labels,
                          datasets: [{
                              data: this.dataOrders,
                              backgroundColor: this.colorsArray,
                              borderColor: 'rbg(0,0,0)',
                              borderWidth: 1
                          }]
                      },
                      options: {
                        legend: {
                          display: false
                        }
                      }
                  });
                this.pieRevenues.destroy();
                this.pieRevenues = new Chart(myChartFour, {
                      type: 'pie',
                      data: {
                          labels: this.labels,
                          datasets: [{
                              data: this.dataTotals,
                              backgroundColor: this.colorsArray,
                              borderColor: 'rbg(0,0,0)',
                              borderWidth: 1
                          }]
                      },
                      options: {
                        legend: {
                          display: false
                        }
                      }
                  });
                this.orders.destroy();
                this.orders = new Chart(myChart, {
                      type: 'bar',
                      data: {
                          labels: this.labels,
                          datasets: [{
                              label: 'Ordini',
                              data: this.dataOrders,
                              backgroundColor: this.colorsArray,
                              borderColor: 'rbg(0,0,0)',
                              borderWidth: 2
                          }]
                      },
                      options: {
                        scales: {
                          yAxes: [{
                            ticks: {
                              beginAtZero: true
                            }
                          }]
                        }
                      }
                  });
                this.revenues.destroy();
                this.revenues = new Chart(myChartTwo, {
                      type: 'line',
                      data: {
                          labels: this.labels,
                          datasets: [{
                              label: 'Entrate Mensili',
                              data: this.dataTotals,
                              backgroundColor: this.colorsArray,
                              borderColor: 'rbg(0,0,0)',
                              borderWidth: 2
                          }]
                      },
                      options: {
                        scales: {
                          yAxes: [{
                            ticks: {
                              beginAtZero: true
                            }
                          }]
                        }
                      }
                  });
              });
            }
        },
        mounted() {
          axios.get(`http://localhost:8000/api/stat/top-dish?api_token=` + token).then(response => {
            this.topDish = response.data[0].name;
            axios.get(`http://localhost:8000/api/stat/bott-dish?api_token=` + token).then(response => {
              this.bottDish = response.data[0].name;
            })
            this.labels = window.labels;
            this.dataOrders = window.dataOrders;
            this.dataTotals = window.dataTotals;
            this.createChart();
            this.visibility = 'visible';
            this.loader = false;
          })
        },
    }
);
