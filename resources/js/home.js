require('./bootstrap');
import Vue from 'vue';

var home = new Vue(
  {
    el: "#home",
    data: {
      types: ['all'],
      restaurants: []
    },
    methods: {
      filter(type) {
        this.restaurants = [];
        axios.get(`http://localhost:8000/api/restaurants?type=${type}`).then(response => {
          this.restaurants = response.data;
        });
      },

    },
    mounted: function () {
      axios.get('http://localhost:8000/api/restaurants/types').then(response => {
        this.types.push(...response.data);
      });

      axios.get(`http://localhost:8000/api/restaurants?type=all`).then(response => {
        this.restaurants = response.data;
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
