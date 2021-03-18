require('./bootstrap');
import Vue from 'vue';

var checkout = new Vue(
  {
    el: "#checkout",
    data: {
      cart: []
    },
    methods: {

    },
    mounted() {
      if (localStorage.getItem('cart')) {
        try {
          this.cart = JSON.parse(localStorage.getItem('cart'));
        } catch(error) {
          console.log(error);
          localStorage.removeItem('cart');
        }
      }
    }
  }
);
