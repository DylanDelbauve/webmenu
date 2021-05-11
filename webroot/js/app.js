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
      console.log(dishes);
      dishes.forEach((element) => {
        $("#dishes").append(
          "<option value=" +
            element.id +
            ">" +
            element.name +
            " <i>(" +
            element.dish_type.name +
            ")</i></option>"
        );
        
        $("#dishes").selectpicker("refresh");
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
      idMenu: idMenu,
      idDish: idDish,
    },
    success: function () {
      reload();
    },
    error: function (jqXHR, textStatus, errorThrown) {
      console.log(jqXHR, textStatus, errorThrown);
    },
    beforeSend: function (xhr) {
      xhr.setRequestHeader("X-CSRF-Token", getCookie("csrfToken"));
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
      idMenu: idMenu,
      idDish: idDish,
    },
    success: function () {
      reload();
    },
    error: function (jqXHR, textStatus, errorThrown) {
      console.log(jqXHR, textStatus, errorThrown);
    },
    beforeSend: function (xhr) {
      xhr.setRequestHeader("X-CSRF-Token", getCookie("csrfToken"));
    },
    dataType: "json",
  });
}

function reload() {
  var idMenu = document.getElementById("idMenu").value;
  $.ajax({
    url: "/menus/view/" + idMenu,
    traditional: false,
    type: "GET",
    success: function (response) {
      $("tbody").empty();
      dishes = response.menu.dishes;
      dishes.forEach((e) => {
        $("tbody").append(
          '<tr id="' +
            e.id +
            '"><td>' +
            e.name +
            ' <span class="badge badge-info">' +
            e.dish_type.name +
            '</span></td> <td><button class="btn btn-danger" id="' +
            e.id +
            '" onclick="delDish(this.id)">Supprimer</button></td></tr>'
        );
      });
    },
    error: function (jqXHR, textStatus, errorThrown) {
      console.log(jqXHR, textStatus, errorThrown);
    },
    dataType: "json",
  });
}

function getCookie(cname) {
  var name = cname + "=";
  var decodedCookie = decodeURIComponent(document.cookie);
  var ca = decodedCookie.split(";");
  for (var i = 0; i < ca.length; i++) {
    var c = ca[i];
    while (c.charAt(0) == " ") {
      c = c.substring(1);
    }
    if (c.indexOf(name) == 0) {
      return c.substring(name.length, c.length);
    }
  }
  return "";
}

/*window.confirm = (msg, callback) => {

  $("#alert .modal-body").text(msg);
  $("#alert").modal('show');
  $("#confirm").on('click', () => {return true;});
  $("#cancel").on('click', () => {return false;});
}*/

document.getElementById("save").addEventListener("click", () => {
  var button = document.getElementById("save");
  button.innerHTML = '<span class="spinner-border spinner-border-sm" role="status" aria-hidden="true"></span> Chargement...';
  button.disabled = true;
  document.getElementById('form').submit();
});