require('./bootstrap');
import Vue from 'vue';
import Slick from 'vue-slick';
import 'slick-carousel/slick/slick.css';

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
      bool: true,
      images: ["https://images.pexels.com/photos/371633/pexels-photo-371633.jpeg?cs=srgb&dl=clouds-country-daylight-371633.jpg&fm=jpg", "https://static.photocdn.pt/images/articles/2017/04/28/iStock-646511634.jpg", "https://cdn.mos.cms.futurecdn.net/FUE7XiFApEqWZQ85wYcAfM.jpg", "https://static.photocdn.pt/images/articles/2017/04/28/iStock-546424192.jpg"]
    },
    methods: {
      filter(type) {
        this.restaurants = [];
        axios.get(`http://localhost:8000/api/restaurants?type=${type}`).then(response => {
          this.restaurants = response.data;
        });
      },
      forward: function() {
      this.indexOfImage++;
      if (this.indexOfImage == this.images.length) {
        this.indexOfImage = 0;
      }
      },
      backward: function() {
      if (this.indexOfImage == 0) {
        this.indexOfImage = this.images.length -1;
      } else {
        this.indexOfImage--;
      }
      },
      stopAuto: function() {
      this.bool = true
      },
      prova: function (index) {
        this.indexOfImage = index;
      }
    },
    mounted: function () {
      axios.get('http://localhost:8000/api/restaurants/types').then(response => {
        this.types.push(...response.data);
      });

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
  // setInterval(() => {
  //   this.forward();
  // }, 1000);
  //OPPURE, perchè assegno this a self prima di usare setinterval
    const self = this;
    const timer = setInterval(function() {
    if (self.bool == true) {
      console.log("sono qui")
      clearInterval(timer);
    } else {
      self.forward();
      console.log("sono qui")
    }
    }, 1000);
    }
  },
);
