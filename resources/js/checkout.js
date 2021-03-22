require('./bootstrap');
import Vue from 'vue';
var dropin = require('braintree-web-drop-in');
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
      var form = document.querySelector('#payment-form');
      var nonce = document.querySelector('#nonce');
      var self = this;
      dropin.create({
        authorization: 'sandbox_5r6c6ymm_ffhwsdzry36sq5tt',
        container: '#dropin-container',
        locale: 'it_IT'
      }, function(err, instance) {
        if (err) {
          console.log(err);
          return
        }
        form.addEventListener('submit', function(e) {
          e.preventDefault();
          instance.requestPaymentMethod((err, payload) => {
            if (err) {
              console.log(err);
              return;
            }
            nonce.value = payload.nonce;
            cart.value = JSON.stringify(self.cart);
            form.submit();
          })
        })
      }
    );
    }
  }
);
