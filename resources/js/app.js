require('./bootstrap');
import Vue from 'vue';

$(document).ready(function() {
  $('#image').on('change', function(){
    var fileName = $(this).val().split('\\').pop();
    $('.custom-file-label').html(fileName);
  });
});

axios.get(`http://localhost:8000/api/orders?api_token=` + token).then(response => {
  window.dataOrders = response.data.values.reverse();
  window.dataTotals = response.data.total.reverse();
  window.labels = response.data.months.reverse();
  window.orders = dataOrders.reduce(function(tot, num) {
    return tot + num;
  })
  window.revenue = dataTotals.reduce(function(tot, num) {
    return tot + num;
  })

  document.getElementById('orders_total_dash').innerHTML = window.orders;
  document.getElementById('revenue_total_dash').innerHTML = window.revenue.toFixed(2);
  document.getElementById('orders_total_stat').innerHTML = window.orders;
  document.getElementById('revenue_total_stat').innerHTML = window.revenue.toFixed(2);
});


window.onpageshow = function(event) {
if (event.persisted) {
    window.location.reload()
}
};
