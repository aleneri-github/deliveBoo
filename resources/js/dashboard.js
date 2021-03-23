require('./bootstrap');
import Vue from 'vue';

var showFood = new Vue(
  {
    el: "#index-Menu",
    data: {
      show: false,
      indexOfList: -1,
      isActive: true
    },
  
    methods: {
  
      fadeMe: function(index) {
        if (this.indexOfList == -1) {
          this.indexOfList = index;
        } else {
          this.indexOfList = -1;
        }
        //  if (this.show == true) {
        //    this.show = false
        //   } else {
        //    this.show = true
        //   }
      }
    }

  }
);