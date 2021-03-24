require('./bootstrap');
import Vue from 'vue';
var home = new Vue(
  {
    el: "#home",
    data: {
      types: ['all'],
      restaurants: [],
      carousel: [],
      foods: [],
      indexOfImage: 0,
      active: "active",
      border: false,
      typeIndex: 0,


    },
    methods: {
      filter(type) {
        this.restaurants = [];
        axios.get(`http://localhost:8000/api/restaurants?type=${type}`).then(response => {
          this.restaurants = response.data;
        });
      },
      forward() {
        if (this.indexOfImage == this.foods.length-1) {
          this.indexOfImage = 0;
          return
        }
        this.indexOfImage++;
      },
      borderActive() {
        this.border = !this.border;

      }

    },
    mounted: function () {
      axios.get(`http://localhost:8000/api/restaurants?type=all`).then(response => {
        this.restaurants = response.data;
      });
      axios.get(`http://localhost:8000/api/restaurant/carousel`).then(response => {
        this.carousel = response.data;
      });
      axios.get(`http://localhost:8000/api/restaurant/dishes`).then(response => {
        this.foods = response.data;
      });
    },
    created: function () {
      const timer = setInterval(() => {
        this.forward();
      }, 5000);
    }
  },
);
