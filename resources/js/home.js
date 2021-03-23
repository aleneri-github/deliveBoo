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
    },
    methods: {
      filter(type) {
        this.restaurants = [];
        axios.get(`http://localhost:8000/api/restaurants?type=${type}`).then(response => {
          this.restaurants = response.data;
        });
      },
      forward() {
        this.indexOfImage++;
        if (this.indexOfImage == this.foods.lenght) {
          this.indexOfImage = 0;
        }
      },
      backward() {
        if (this.indexOfImage == 0) {
          this.indexOfImage = this.foods.length -1;
        } else {
          this.indexOfImage--;
        }
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