require('./bootstrap');
import Vue from 'vue';

// var app = new Vue(
//   {
//     el: "#root",
//     data: {
//
//     },
//     methods: {
//
//     }
//   }
// );


$(document).ready(function() {
  $('#image').on('change', function(){
    var fileName = $(this).val().split('\\').pop();
    $('.custom-file-label').html(fileName);
  });
});
