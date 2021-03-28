require('./bootstrap');
import Vue from 'vue';
var dropin = require('braintree-web-drop-in');
var checkout = new Vue(
  {
    el: "#checkout",
    data: {
      cart: [],
      loader: true,
      prova: 'd-none'
    },
    methods: {
      cartTotal() {
        let partials = this.cart.map((e) => {
          return parseFloat(e.total);
        })

        return partials.reduce(function(a,b) {
          return a + b;
        }, 0);
      },
      saveCart() {
        const parsed = JSON.stringify(this.cart);
        localStorage.setItem('cart', parsed);
      },
      paymentBox() {
        let form = document.querySelector('#payment-form');
        let token = document.querySelector('#token');
        let self = this;
        dropin.create({
          authorization: token.value,
          container: '#dropin-container',
          locale: 'it_IT'
        }, function(err, instance) {
          if (err) {
            console.error(err);
            self.prova = 'd-none';
            self.loader = true;
            console.log('prova')
            return
          }
          form.addEventListener('submit', function(e) {
            e.preventDefault();
            // self.loader = true;
            // self.prova = 'd-block';
            instance.requestPaymentMethod().then(function(payload) {
              self.loader = true;
              self.prova = 'd-block';
              nonce.value = payload.nonce;
              cart.value = JSON.stringify(self.cart);
              total.value = self.cartTotal();
              form.submit();
            }).catch(function(err) {
              console.error(err);
              self.prova = 'd-none';
              self.loader = true;
            });
          })
        }
      );
      },
      addItem(item) {
        item.quantity++;
        item.total += item.price;
        this.$forceUpdate();
        this.saveCart();
      },
      removeItem(item) {
        if (item.quantity == 1) {
          let index = this.cart.indexOf(item);
          this.cart.splice(index,1);
          return
        }
        item.quantity--;
        item.total -= item.price;
        this.$forceUpdate();
        this.saveCart();
      },
      scrollToTop() {
        window.scrollTo(0, 0);
      }
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
      this.paymentBox();
    },
    created() {
      this.loader = false;
    }
  }
);

window.onpageshow = function(event) {
if (event.persisted) {
    window.location.reload()
}
};

window.onbeforeunload = function () {
    window.scrollTo(0,0);
};
