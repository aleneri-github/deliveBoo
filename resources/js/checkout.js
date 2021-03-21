require('./bootstrap');
import Vue from 'vue';
var braintree = require('braintree-web');
var dropin = require('braintree-web-drop-in');
// var button = document.querySelector('#submit-button');

var checkout = new Vue(
  {
    el: "#checkout",
    data: {
      cart: [],
    },
    methods: {
      cartTotal() {
        let partials = this.cart.map((e) => {
          return parseFloat(e.total);
        })
        console.log(partials)
        return partials.reduce(function(a,b) {
          return a + b;
        }, 0);
      },
      saveCart() {
        const parsed = JSON.stringify(this.cart);
        localStorage.setItem('cart', parsed);
      },
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
      dropin.create({
      authorization: 'sandbox_q7gbgtzq_wjc3tmmcjzkgjqtj',
      container: '#dropin-container',
      card: {
        cardholderName: true,
      }
      }, function (createErr, instance) {
      $('#submit-button').click(function () {
        instance.requestPaymentMethod(function (err, payload) {
          if (err) {

          } else {
            axios.post('http://127.0.0.1:8000/checkout', { payload })
            .then(function(response) {
              // window.location = "/home"
              console.log(response.data);
            })
          }
        });
      });
    });
    }
  }
);
