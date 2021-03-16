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
      prova(elem) {
        console.log(elem);
      },
      // PROVA
      addOne(elem) {
        if(!this.cart.some(item => item.name == elem.name)) {
          elem.quantity = 1;
          elem.total = (elem.quantity * elem.price).toFixed(2);
          this.cart.push(elem);
        } else {
          this.cart.map((e) => {
            if(e.name == elem.name) {
              e.quantity++;
              e.total = (elem.quantity * elem.price).toFixed(2);
            }
          })
          this.$forceUpdate();
        }
      },
      removeOne(elem) {
        if(this.cart.some(item => item.name == elem.name)) {
            this.cart.map((e) => {
              if(e.name == elem.name) {
                if (e.quantity != 1) {
                  e.quantity--;
                  e.total = (Math.round(elem.quantity * elem.price * 100)/100).toFixed(2);
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
    }
  }
);
