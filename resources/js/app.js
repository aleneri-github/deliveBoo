require('./bootstrap');
import Vue from 'vue';

$(document).ready(function() {
  $('#image').on('change', function(){
    var fileName = $(this).val().split('\\').pop();
    $('.custom-file-label').html(fileName);
  });
});

window.onpageshow = function(event) {
if (event.persisted) {
    window.location.reload()
}
};
