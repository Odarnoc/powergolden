var server = "";
var username = "";
var userid = "";
var cuenta = 0;
var contador = 0;
var productos = 0;
var cantidades = 0;
var type = 0;
var descuento = 0;
var arreglo = [];
var arreglo2 = [];
var paquetes = null;
var total_a = 0;
var kits = [];
var clientes = [];
var conta_kits = 0;
var deviceSessionId = "";
var total_ventas = 0;
var actual=2;
$(document).ready(function() {
  get_clientes_info();
  get_sales();
  get_productos();
});
function corte_de_caja() {
  $("#modalCorte").modal("toggle");
}
function get_clientes() {
  var data = {
    buscar: $("#buscar_c").val()
  };
  $.ajax({
    url: server + "webserviceapp/get_table_clientes.php",
    type: "POST",
    data: data,
    dataType: "json",
    beforeSend: function() {},
    success: function(data) {
      $("#tabla_clientes tbody")
        .empty()
        .append(data.tabla);
    }
  });
}
function show_modal(tipo){
  if(tipo==1 && actual!=1){
    $("#productos").hide();
    $("#ventas").show();
    $("#clientes").hide();
    get_sales();
    actual=1;
  }else if(tipo==2 && actual!=2){
    $("#productos").show();
    $("#ventas").hide();
    $("#clientes").hide();
    actual=2;
    get_productos();
  }
  else if(tipo==3 && actual!=3){
    $("#productos").hide();
    $("#ventas").hide();
    $("#clientes").show();
    actual=3;
    get_clientes();
  }
}
function corte_parcial() {
  var total_parcial = 0;
  $.ajax({
    url: server + "webserviceapp/get_total_parcial.php",
    type: "POST",
    dataType: "json",
    async: false,
    success: function(data) {
      total_parcial = data.total;
    }
  });

  event.preventDefault();
  swal({
    title: "<p id='pswalerror'>Corte de caja</p>",
    html: "<p id='psswalerror'>Deseas realizar el corte de caja?</p>",
    type: "warning",
    showCancelButton: true,
    confirmButtonColor: "#0066D1",
    cancelButtonColor: "#d33",
    confirmButtonText: "Aceptar",
    cancelButtonText: "Cancelar"
  }).then(result => {
    if (result.value) {
      if (total_parcial == 0) {
        swal(
          "<p id='pswalerror'>Atención</p>",
          "<p id='psswalerror'>Para realizar un corte de caja primero debes realizar una venta.</p>",
          "info"
        );
      } else {
        $.ajax({
          url: server + "webserviceapp/corte.php",
          type: "POST",

          dataType: "json",
          success: function(data) {
            swal(
              "<p id='pswal'>Corte Realizado</p>",
              "<p id='psswal'> La cantidad total vendida es de: <br> <b id='psbswal'>$" +
                parseFloat(data.total).toFixed(2) +
                "</b></p>",
              "success"
            );
            create_ticket(data.nombre,data.total,data.tarjeta,data.efectivo,data.referencia,data.tabla);
            $("#modalCorte").modal("hide");
          }
        });
      }
    }
  });
}
$("#corte_parcial").submit(function(event) {

});
function corte_diario() {
  $("#modalCorte").modal("hide");
  swal({
    title: "<p id='pswalerror'>Corte de caja</p>",
    html: "<p id='psswalerror'>Deseas realizar el corte de caja?</p>",
    type: "warning",
    showCancelButton: true,
    confirmButtonColor: "#0066D1",
    cancelButtonColor: "#d33",
    confirmButtonText: "Aceptar",
    cancelButtonText: "Cancelar"
  }).then(result => {
    if (result.value) {
      if (total_ventas == 0) {
        swal(
          "<p id='pswalerror'>Atención</p>",
          "<p id='psswalerror'>Para realizar un corte de caja primero debes realizar una venta.</p>",
          "info"
        );
      } else {
        $.ajax({
          url: server + "webserviceapp/corte.php",
          type: "POST",
          dataType: "json",
          success: function(data) {
            swal(
              "<p id='pswal'>Corte Realizado</p>",
              "<p id='psswal'> La cantidad total vendida es de: <br> <b id='psbswal'>$" +
                parseFloat(data.total).toFixed(2) +
                "</b></p>",
              "success"
            );
            create_ticket(data.nombre,data.total,data.tarjeta,data.efectivo,data.referencia,data.tabla);
          }
        });
      }
    }
  });
}
function get_actual_date() {
  var today = new Date();
  var dd = today.getDate();

  var mm = today.getMonth() + 1;
  var yyyy = today.getFullYear();
  var minutos=today.getMinutes();
  if (dd < 10) {
    dd = "0" + dd;
  }
  if (minutos < 10) {
    minutos = "0" + minutos;
  }

  if (mm < 10) {
    mm = "0" + mm;
  }
  var time =
    today.getHours() + ":" + minutos + ":" + today.getSeconds();
  today = dd + "/" + mm + "/" + yyyy;
  return today + " " + time;
}
function create_ticket(sucursal,total,tarjeta,efectivo,referencia, tabla,horas="") {
  $("#fecha_ticket")
    .empty()
    .append(get_actual_date());

  $("#sucursal")
    .empty()
    .append(sucursal);
    if(horas==""){
      $("#horas_div").hide();
    }else{
      $("#horas_div").show();
      $("#horas").empty().append(horas);
    }

  $("#total_ticket")
    .empty()
    .append("$" + addCommas(parseFloat(total).toFixed(2)));
  $("#tarjeta_ticket")
    .empty()
    .append("$" + addCommas(parseFloat(tarjeta).toFixed(2)));
  $("#efectivo_ticket")
    .empty()
    .append("$" + addCommas(parseFloat(efectivo).toFixed(2)));
    $("#referencia_ticket")
    .empty()
    .append("$" + addCommas(parseFloat(referencia).toFixed(2)));
  $("#tabla_ticket > tbody")
    .empty()
    .append(tabla);
  $("#sec-ticket").show();
  var htmlsource = $("#sec-ticket")[0];
  html2canvas(htmlsource, {
    onrendered: function(canvas) {
      var img = canvas.toDataURL("image/png");
      var doc = new jsPDF();
      doc.addImage(img, "JPEG", -35, -10);
      var pdf = doc.save("Corte de caja.pdf");
      $("#sec-ticket").hide();
    }
  });
}
$("#buscar").change(function(event) {
  get_productos();
});
$("#buscar_c").change(function(event) {
  get_clientes();
});
function get_productos() {
  var data = {
    buscar: $("#buscar").val()
  };
  $.ajax({
    url: server + "webserviceapp/get_inventario.php",
    type: "POST",
    data: data,
    dataType: "json",
    beforeSend: function() {},
    success: function(data) {
      $("#tabla_productos tbody")
        .empty()
        .append(data.tabla);
    }
  });
}
function get_sales() {
  var data = {
    inicio: $("#inicio").val(),
    fin: $("#fin").val(),
    cliente: $("#sector").val()
  };
  $.ajax({
    url: server + "webserviceapp/get_sales.php",
    type: "POST",
    data: data,
    dataType: "json",
    beforeSend: function() {},
    success: function(data) {
      $("#total")
        .empty()
        .append("$" + addCommas(parseFloat(data.total).toFixed(2)));
        $("#popular")
        .empty()
        .append(data.popular);
      $("#tabla_ventas tbody")
        .empty()
        .append(data.tabla);
      total_ventas = data.hoy;
    }
  });
}
function get_clientes_info() {
  $.ajax({
    url: server + "webserviceapp/get_clientes.php",
    type: "POST",
    dataType: "json",
    beforeSend: function() {},
    success: function(data) {
      $("#sector")
        .empty()
        .append(data.list);
      $(".selectpicker").selectpicker("refresh");
    }
  });
}

$(".swal2-input").on("input", function() {
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
