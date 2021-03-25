require('./bootstrap');
import Vue from 'vue';

var boxMenu = new Vue(
  {
    el: "#boxMenu",
    data: {
      active: false
    },

    methods: {
      click() {

      }
    },

  }
);

  // // hover li nel menu header-bottom-end
  // $(document).on('click', '.row-food', function(){
  //   console.log($(this).children());
  //    $(this).parent('.dish-show').toggleClass('dish-active');
  //    console.log($(this).parent('.dish-show'));
  //  }
  // );

