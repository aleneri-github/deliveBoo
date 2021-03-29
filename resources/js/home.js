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
      restAnim: '',
      counter: 0

    },
    methods: {
      filter(type) {
        this.restaurants = [];
        this.restAnim = '';
        axios.get(`http://localhost:8000/api/restaurants?type=${type}`).then(response => {
          this.restaurants = response.data;
          setTimeout(() => {
            this.restAnim = 'rest_anim';
          }, 500)
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
        if (!elem) {
          return
        }
        let rect = elem.getBoundingClientRect();
        return [elem, rect]
      },
      clearCart() {
        localStorage.clear();
      }
    },
    mounted: function () {
      axios.get(`http://localhost:8000/api/restaurants?type=all`).then(response => {
        this.restaurants = response.data;
        axios.get(`http://localhost:8000/api/restaurant/carousel`).then(response => {
          this.carousel.push({
            name: 'all',
            image: 'https://co-restaurants.roocdn.com/images/d05b2324186373d2859cabdbe28bf6fb25ab8542/shortcut/offers.png?width=250&height=130&fit=crop&bg-color=fe9364&auto=webp&format=png'
          })
          this.carousel.push(...response.data);
          axios.get(`http://localhost:8000/api/restaurant/dishes`).then(response => {
            this.foods = response.data;
            this.loader = false
          });
        });
      });
      window.addEventListener('scroll', () => {
        const restDiv = this.createElem("restaurants");
        if (!restDiv) {
          return
        }
        if (restDiv[1].top <= window.innerHeight && this.counter == 0) {
          this.restAnim = 'rest_anim';
          this.counter += 1;
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

$(document).ready(function() {
  $('#image').on('change', function(){
    var fileName = $(this).val().split('\\').pop();
    $('.custom-file-label').html(fileName);
  });
});

window.onpageshow = function(event) {
if (event.persisted) {
    window.location.reload()
}
};

window.onbeforeunload = function () {
    window.scrollTo(0,0);
};
