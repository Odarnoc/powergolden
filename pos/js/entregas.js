var server = "";
var id_entrega = "";

$(document).ready(function () {
  get_sales();
});
function get_sales() {
  var data = {
    inicio: $("#inicio").val(),
    fin: $("#fin").val(),
    tipo: $("#tipo").val(),
  };
  $.ajax({
    url: server + "webserviceapp/get_sales_entregas.php",
    type: "POST",
    data: data,
    dataType: "json",
    beforeSend: function () {},
    success: function (data) {
      $("#tabla_ventas tbody").empty().append(data.tabla);
      total_ventas = data.hoy;
    },
  });
}
function gestionar_entrega(){
    var ref=$("#referencia").val();
    $.ajax({
      url: server + "webserviceapp/validate_entrega.php",
      type: "POST",
      data: { id: id_entrega,ref:ref },
      dataType: "json",
      beforeSend: function () {},
      success: function (data) {
        if(data.resultado){
          swal(
            "<p id='pswalerror'> Listo </p>",
            "<p id='psswalerror'>" + data.mensaje + "</p> ",
            "success"
          );
          $("#modalEntregas").modal('hide');
          $("#referencia").val("");
          get_sales();
        }else{
          swal(
            "<p id='pswalerror'> Error </p>",
            "<p id='psswalerror'>" + data.mensaje + "</p> ",
            "error"
          );
        }
      },
    });
}
function abrir_referencia(){
  $("#modalDetalles").modal('hide');
  $("#modalEntregas").modal('toggle');
}
function entregar(id, venta_id) {
  id_entrega = id;
  $.ajax({
    url: server + "webserviceapp/get_sale_detail.php",
    type: "POST",
    data: { id: venta_id },
    dataType: "json",
    beforeSend: function () {},
    success: function (data) {
      $("#detalle_venta tbody").empty().append(data.tabla);
      if (data.inv) {
        $("#boton_entrega").show();
      } else {
        $("#boton_entrega").hide();
      }
      $("#modalDetalles").modal('toggle');
    },
  });
  //$("#modalDetalles").modal('toggle');
}

$(".swal2-input").on("input", function () {
  this.value = this.value.replace(/[^0-9]/g, "");
});

function addCommas(nStr) {
  nStr += "";
  var x = nStr.split(".");
  var x1 = x[0];
  var x2 = x.length > 1 ? "." + x[1] : "";
  var rgx = /(\d+)(\d{3})/;
  while (rgx.test(x1)) {
    x1 = x1.replace(rgx, "$1" + "," + "$2");
  }
  return x1 + x2;
}
function logout() {
  window.location.replace("index.html");
}
function iniciovender() {
  window.location.href =
    "vender.html?id=" + userid + "&name=" + username + "&stock=" + stock;
}
function inicioventas() {
  window.location.href =
    "ventas.html?id=" + userid + "&name=" + username + "&stock=" + stock;
}

function iniciodevoluciones() {
  window.location.href =
    "devoluciones.html?id=" + userid + "&name=" + username + "&stock=" + stock;
}
function inicioinicio() {
  window.location.href =
    "inicio.html?id=" + userid + "&name=" + username + "&stock=" + stock;
}
