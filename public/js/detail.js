/******/ (() => { // webpackBootstrap
var __webpack_exports__ = {};
/*!********************************!*\
  !*** ./resources/js/detail.js ***!
  \********************************/
var detail = new Vue({
  el: "#detail",
  data: {
    dishes: [],
    cart: []
  },
  methods: {
    addOne: function addOne(elem) {
      if (!this.cart.some(function (item) {
        return item.name == elem.name;
      })) {
        elem.quantity = 1;
        elem.total = (elem.quantity * elem.price).toFixed(2);
        this.cart.push(elem);
      } else {
        this.cart.map(function (e) {
          if (e.name == elem.name) {
            e.quantity++;
            e.total = (elem.quantity * elem.price).toFixed(2);
          }
        });
        this.$forceUpdate();
      }
    },
    removeOne: function removeOne(elem) {
      var _this = this;

      if (this.cart.some(function (item) {
        return item.name == elem.name;
      })) {
        this.cart.map(function (e) {
          if (e.name == elem.name) {
            if (e.quantity != 1) {
              e.quantity--;
              e.total = (Math.round(elem.quantity * elem.price * 100) / 100).toFixed(2);
            } else {
              var index = _this.cart.indexOf(e);

              _this.cart.splice(index, 1);
            }
          }
        });
        this.$forceUpdate();
      } else {
        return;
      }
    },
    cartTotal: function cartTotal() {
      var partials = this.cart.map(function (e) {
        return parseFloat(e.total);
      });
      console.log(partials);
      return partials.reduce(function (a, b) {
        return a + b;
      }, 0);
    }
  },
  mounted: function mounted() {
    var _this2 = this;

    axios.get("http://localhost:8000/api/restaurant/dishes").then(function (response) {
      _this2.dishes = response.data;
    });
  }
});
/******/ })()
;