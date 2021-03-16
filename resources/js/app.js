require('./bootstrap');
import Vue from 'vue';

var app = new Vue(
  {
    el: "#root",
    data: {
      types: []
    },
    methods: {

    },
    mounted: function () {
      axios.get('http://localhost:8000/api/restaurants/types').then(response => {
        console.log(response.data);
          this.types = response.data;
          console.log(this.types);
        });
    }
  }
);


$(document).ready(function() {
  $('#image').on('change', function(){
    var fileName = $(this).val().split('\\').pop();
    $('.custom-file-label').html(fileName);
  });
});
