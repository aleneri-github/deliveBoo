require('./bootstrap');
// import Vue from 'vue';
import Chart from 'chart.js';


// var statistic = new Vue(
//     {
//         el: "#detail",
//         data: {
//             dishes: [],
//             cart: [],
//         },
//         methods: {

//         }, 
//     }
// );


var myChart = document.getElementById('myChart').getContext('2d');
var myChartTwo = document.getElementById('myChartTwo').getContext('2d');

let ordini = new Chart(myChart, {
    type: 'bar',
    data: {
        labels: ['Gennaio', 'Febbraio', 'Marzo', 'Aprile', 'Maggio', 'Giugno', 'Luglio', 'Agosto', 'Settembre', 'Ottobre', 'Novembre', 'Dicembre'],
        datasets: [{
            label: 'Ordini',
            data: [12, 8, 32, 9, 12, 8, 32, 9, 36, 45 , 25, 14],
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