require('./bootstrap');
import Vue from 'vue';

var indexMenu = new Vue(
  {
    el: "#indexMenu",
    data: {
      show: false,
      indexOfList: -1,
      isActive: false
    },

    methods: {

    },
    mounted() {
      console.log('creato');
      document.querySelectorAll('.row-food').forEach(item => {
        item.addEventListener('click', event => {
          console.log($(item).index());
          if (indexOfList == index) {
            this.isActive = !this.isActive;
          }
        })
      })
    }

  }
);
