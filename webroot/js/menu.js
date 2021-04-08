window.onload = (e) => {
  var date = new Date();
  
  $("#date").append("Menu du "+date.toLocaleDateString('fr-FR',{weekday: 'long', year: 'numeric', month: 'long', day: 'numeric'}));
}



setInterval(() => {
  var d = new Date();
  if (d.getHours() == 12 || d.getHours() == 0) {
    location.reload();
  }
}, 18000000);

//3600000
