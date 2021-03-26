setTimeout(function() {
  window.location.replace('http://127.0.0.1:8000/home');
}, 5000);
localStorage.clear();

window.onpageshow = function(event) {
if (event.persisted) {
    window.location.reload()
}
};
