require('./bootstrap');
import Vue from 'vue';

var showFood = new Vue(
  {
    el: "#index-Menu",
    data: {
      show: false
    },
  
    methods: {
  
      fadeMe: function() {
        this.show = !this.show
      },
  
      enter: function(el, done) {
  
        var that = this;
  
        setTimeout(function() {
          that.show = false;
        }, 3000); // hide the message after 3 seconds
      }
  
    }

  }
);