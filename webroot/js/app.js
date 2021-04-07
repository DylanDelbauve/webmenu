function onChange() {
  var idType = document.getElementById("select_type").value;
  if (idType == "") idType = 0;
  $.ajax({
    url: "/menus/getdishes/" + idType,
    traditional: false,
    type: "GET",
    success: function (response) {
      dishes = response.dishes;
      $("#dishes").empty();
      dishes.forEach((element) => {
        $("#dishes").append(
          "<option value=" + element.id + ">" + element.name +"</option>"
        );
      });
    },
    dataType: "json",
  });
}

function addDish() {
  var idMenu = document.getElementById("idMenu").value;
  var idDish = document.getElementById("dishes").value;
  $.ajax({
    url: "/menus/editdish/",
    traditional: false,
    type: "PUT",
    data: {
      'idMenu' : idMenu,
      'idDish' : idDish
    }, 
    success: function () {
      reload();
    },
    error : function(jqXHR, textStatus, errorThrown){
      console.log(jqXHR, textStatus, errorThrown);
    },
    dataType: "json",
  });
}

function delDish(idDish) {
  var idMenu = document.getElementById("idMenu").value;
  $.ajax({
    url: "/menus/editdish/",
    traditional: false,
    type: "DELETE",
    data: {
      'idMenu' : idMenu,
      'idDish' : idDish
    },
    success: function () {
      reload();
    },
    error : function(jqXHR, textStatus, errorThrown){
      console.log(jqXHR, textStatus, errorThrown);
    },
    dataType: "json",
  });
}

function reload() {
  var idMenu = document.getElementById("idMenu").value;
  $.ajax({
    url: "/menus/view/"+idMenu,
    traditional: false,
    type: "GET",
    success: function (response) {
      $("tbody").empty();
      dishes = response.menu.dishes;
      dishes.forEach((e)=> {
        $("tbody").append('<tr id="'+e.id+'"><td>'+e.name+' <small><i>('+e.dish_type.name+')</i></small></td> <td><button id="'+e.id+'" onclick="delDish(this.id)">Supprimer</button></td></tr>'); 
      })
    },
    error : function(jqXHR, textStatus, errorThrown){
      console.log(jqXHR, textStatus, errorThrown);
    },
    dataType: "json",
  });
}
