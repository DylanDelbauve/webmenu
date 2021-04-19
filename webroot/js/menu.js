window.onload = (e) => {
  var date = new Date();
  
  $("#date").append("Menu du "+date.toLocaleDateString('fr-FR',{weekday: 'long', year: 'numeric', month: 'long', day: 'numeric'}));
}



setInterval(() => {
  var d = new Date();
  if (d.getHours() == 11 && d.getMinutes() == 0 && d.getSeconds() == 0) {
    location.reload();
  }
}, 1000);

//3600000
