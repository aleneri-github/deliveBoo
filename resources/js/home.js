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
      loader: true,
      restAnim: ''

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

      },
      createElem(id) {
        let elem = document.getElementById(id);
        let rect = elem.getBoundingClientRect();
        return [elem, rect]
      }
    },
    mounted: function () {
      axios.get(`http://localhost:8000/api/restaurants?type=all`).then(response => {
        this.restaurants = response.data;
        axios.get(`http://localhost:8000/api/restaurant/carousel`).then(response => {
          this.carousel = response.data;
          axios.get(`http://localhost:8000/api/restaurant/dishes`).then(response => {
            this.foods = response.data;
            this.loader = false
          });
        });
      });
      window.addEventListener('scroll', () => {
        const restDiv = this.createElem("restaurants");
        if (restDiv[1].top <= window.innerHeight) {
          this.restAnim = 'rest_anim';
        }
      });
    },
    created: function () {
      const timer = setInterval(() => {
        this.forward();
      }, 5000);
    },
    destroyed: function() {
      window.removeEventListener('scroll', this.scrollOnRest);
    }
  },
);
