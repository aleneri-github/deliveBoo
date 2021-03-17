require('./bootstrap');
import Vue from 'vue';

var detail = new Vue(
  {
    el: "#detail",
    data: {
      dishes: [],
      cart: [],
    },
    methods: {
      // PROVA
      // prova(elem) {
      //   console.log(elem);
      // },
      // PROVA
      addOne(elem) {
        if(!this.cart.some(item => item.name == elem.name)) {
          elem.quantity = 1;
          elem.total = elem.price;
          this.cart.push(elem);
        } else {
          this.cart.map((e) => {
            if(e.name == elem.name) {
              e.quantity++;
              e.total += elem.price;
            }
          })
          this.$forceUpdate();
        }
        this.saveCart();
      },
      removeOne(elem) {
        if(this.cart.some(item => item.name == elem.name)) {
            this.cart.map((e) => {
              if(e.name == elem.name) {
                if (e.quantity != 1) {
                  e.quantity--;
                  e.total -= elem.price;
                } else {
                  let index = this.cart.indexOf(e);
                  this.cart.splice(index,1);
                }
              }
            })
            this.$forceUpdate();
        } else {
          return
        }
        this.saveCart();
      },
      saveCart() {
        const parsed = JSON.stringify(this.cart);
        localStorage.setItem('cart', parsed);
      },
      cartTotal: function() {
        let partials = this.cart.map((e) => {
          return parseFloat(e.total);
        })
        console.log(partials)
        return partials.reduce(function(a,b) {
          return a + b;
        }, 0);
      }
    },
    mounted: function() {
      axios.get(`http://localhost:8000/api/restaurant/dishes`).then(response => {
        this.dishes = response.data;
      });
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
