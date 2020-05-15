var server = "";
var username = "";
var userid = "";
var cuenta = 0;
var contador = 0;
var productos = 0;
var cantidades = 0;
var gratis = 0;
var type = 0;
var descuento = 0;
var arreglo = [];
var gratuito = [];
var arreglo2 = [];
var p_arre = [];
var paquetes = null;
var total_a = 0;
var kits = [];
var pagos = [];
var clientes = [];
var promociones = [];
var conta_kits = 0;
var deviceSessionId = "";
var tipo_clientes = 0;
var total_google = 0;
var select_gratis = false;
var moneda = "";
$(document).ready(function () {
  get_products_list();
  get_paquetes_info();
  get_clientes_info();
  get_promociones_info();
  get_data_chart();
  OpenPay.setId("mcy7r4mints0e7y1nbko");
  OpenPay.setApiKey("pk_380557a00f6c4aae820e6b03ddabd20d");
  OpenPay.setSandboxMode(true);
  //Se genera el id de dispositivo
  deviceSessionId = OpenPay.deviceData.setup(
    "card_payment",
    "deviceIdHiddenFieldName"
  );
  //newFactura('OIAL890916QC6','LUIS EDGAR OLIVA','luis.edgar89@gmail.com','privada degollado','451','chapala','jalisco','Mexico','Compra de Kit 1, Kit 2, Kit 1, zuleyka','5000','1','5000','5800','800');
});
function initialize_charts() {
  $("#mv").easyPieChart({
    size: 80,
    barColor: "#49B7F3",
    trackColor: "#F4F4F4",
    lineWidth: 2,
    lineCap: "circle",
    animate: 2000,
    onStep: function (from, to, percent) {
      $(this.el).find(".percent").text(Math.round(percent));
    },
  });
  $("#mvm").easyPieChart({
    size: 80,
    barColor: "#CA9F21",
    trackColor: "#F4F4F4",
    lineWidth: 2,
    lineCap: "circle",
    animate: 2000,
    onStep: function (from, to, percent) {
      $(this.el).find(".percent").text(Math.round(percent));
    },
  });
  $("#ili").easyPieChart({
    size: 80,
    barColor: "#CA9F21",
    trackColor: "#F4F4F4",
    lineWidth: 2,
    lineCap: "circle",
    animate: 2000,
    onStep: function (from, to, percent) {
      $(this.el).find(".percent").text(Math.round(percent));
    },
  });
}
function get_data_chart() {
  $.ajax({
    url: server + "webserviceapp/get_info_chart_sales.php",
    type: "POST",
    dataType: "json",
    beforeSend: function () {},
    success: function (data) {
      $("#ventas_chart")
        .empty()
        .append(
          '<div class="d-item-chart-pie-nav">\
      <div class="d-chart-pie">\
          <span class="chart" id="mv" data-percent="' +
            parseFloat((data.mes_ven / data.mesd) * 100) +
            '">\
              <span class="percent"></span>\
          </span>\
      </div>\
      <p class="t1">VM/MM</p>\
      <p class="t2">' +
            data.mes_ven +
            "/" +
            data.mesd +
            "</p>\
  </div>"
        );
      $("#ventas_m_chart")
        .empty()
        .append(
          '<div class="d-item-chart-pie-nav">\
      <div class="d-chart-pie">\
          <span class="chart" id="mvm" data-percent="' +
            parseFloat((data.hoy / data.mes) * 100) +
            '">\
              <span class="percent"></span>\
          </span>\
      </div>\
      <p class="t1">VD/MD</p>\
      <p class="t2">' +
            data.hoy +
            "/" +
            data.mes +
            "</p>\
  </div>"
        );
      $("#meta").empty().append(data.mes);
      $("#venta").empty().append(data.hoy);
      $("#cantidad").empty().append(data.inventario);
      var porcentaje = 0;
      if (data.inventario != 0) {
        if (data.limite == 0) {
          data.limite = 1;
        }
        porcentaje = parseFloat((data.inventario / data.limite) * 100);
      }
      $("#inv_chart")
        .empty()
        .append(
          '<div class="d-item-chart-pie-nav">\
      <div class="d-chart-pie">\
          <span class="chart" id="ili" data-percent="' +
            porcentaje +
            '">\
              <span class="percent"></span>\
          </span>\
      </div>\
      <p class="t1">I/LI</p>\
      <p class="t2">' +
            data.inventario +
            "/" +
            data.limite +
            "</p>\
  </div>"
        );
      initialize_charts();
    },
  });
}
function construct_table_kits() {
  var tabla = "";
  kits.forEach(function (element, index) {
    if (element != null) {
      tabla +=
        "<tr><td>" +
        paquetes[element].nombre +
        "</td><td>" +
        "$" +
        addCommas(parseFloat(paquetes[element].precio).toFixed(2)) +
        '</td><td>\
    <button type="button" onclick="quitar_kit(\'' +
        index +
        '\')" class="btn btn-eliminar-pos"><i class="fas fa-times"></i></button></td></tr>';
    }
  });
  $("#tablakits tbody").empty().append(tabla);
}
function quita_kits() {
  construct_table_kits();
  $("#modalDeleteKits").modal("toggle");
}
function quitar_kit(element) {
  kits[element] = null;
  show_total();
  construct_table_kits();
}
function cambio_tipo_venta() {
  if ($("#tipo_venta").val() != "1") {
    $("#row_add_kits").hide();
    $("#normal").show();
    $("#independiente").hide();
    $(".precios_mostrar")
      .empty()
      .append("$" + parseFloat(300).toFixed(2));
    $(".cantidadPago").empty().append(parseFloat(300));
    tipo_clientes = 0;
  } else {
    $("#row_add_kits").show();
    $("#normal").hide();
    $("#independiente").show();
    tipo_clientes = 1;
    $(".precios_mostrar")
      .empty()
      .append("$" + parseFloat(0).toFixed(2));
    $(".cantidadPago").empty().append(parseFloat(0));
  }
  get_clientes_info();
  if (cantidades != 0) {
    show_total();
  }
}
function agregar_kit() {
  if ($("#tipo_kit").val() != "") {
    kits[conta_kits] = $("#tipo_kit").val();

    show_total();
  } else {
    kits[conta_kits] = null;
  }
}
function get_clientes_info() {
  $.ajax({
    url: server + "webserviceapp/get_clientes.php",
    type: "POST",
    data: { tipo: tipo_clientes },
    dataType: "json",
    beforeSend: function () {},
    success: function (data) {
      clientes = data.arreglo;
      //console.log(data.arreglo[2]);
      $("#sector").empty().append(data.list);
      $(".selectpicker").selectpicker("refresh");
    },
  });
}
function get_paquetes_info() {
  $.ajax({
    url: server + "webserviceapp/get_paquetes.php",
    type: "POST",
    dataType: "json",
    beforeSend: function () {},
    success: function (data) {
      paquetes = data.arreglo;
      if (data.pais == "eua") {
        moneda = "USD";
      } else {
        moneda = "MXN";
      }
      $("#frase").empty().append(data.frase);
      console.log(data.arreglo[2]);
      $("#tipo_kit").append(data.list);
    },
  });
}
function get_promociones_info() {
  $.ajax({
    url: server + "webserviceapp/get_promociones.php",
    type: "POST",
    dataType: "json",
    beforeSend: function () {},
    success: function (data) {
      promociones = data.arreglo;
    },
  });
}
function change_category(category) {
  type = category;
  get_products_list();
}
function get_products_list() {
  var search = $("#buscar").val();
  $.ajax({
    url: server + "webserviceapp/get_products.php",
    type: "POST",
    data: { product: search, category: type },
    dataType: "json",
    beforeSend: function () {
      swal({
        title: "Cargando...",
        showConfirmButton: false,
        imageUrl: "resources/loader.gif",
      });
    },
    success: function (data) {
      swal.close();
      p_arre = data.arreglo;
      $("#rowproductos").empty().append(data.list);
    },
  });
}
$("#buscar").change(function (event) {
  get_products_list();
});
function cleanSale() {
  $("#tipo_venta").val(0);
  contador = 0;
  total_a = 0;
  cuenta = 0;
  productos = 0;
  cantidades = 0;
  arreglo = [];
  gratuito = [];
  arreglo2 = [];
  $("#input-descuento").val("");
  $("#sector").val("0");
  $("#tablacarrito > tbody").empty();
  conta_kits = 0;
  kits = [];
  pagos = [];
  $("#sector").val("0");
  $(".selectpicker").selectpicker("refresh");
  $(".dropdown-select").trigger("keydown");
  $("#tipo_kit").val("");
  gratis = 0;
  select_gratis = false;
  cambio_tipo_venta();
  show_total();
}
function agregarProducto(name, price_out, id, posible) {
  ////console.log("Aqui ando");
  if (posible != 0) {
    if (arreglo2[id] != 1) {
      $("#tablacarrito > tbody").append(
        ' <tr id="' +
          contador +
          '">\
		<td style="display:none">' +
          id +
          '</td>\
		<td style="display:none" class="cantidadPago">' +
          price_out +
          '</td>\
		<td class="td-producto-pos">' +
          name +
          ' </td>\
		<td class="td-cantidad-pos"><input type="number" id="' +
          contador +
          'input" onchange="cambiar_cantidad(\'' +
          contador +
          "','" +
          price_out +
          '\')" class="form-control input-cant-pos" value="1" min="1" max="500" step="1" /></td>\
		<td class="td-precio-pos precios_mostrar" >$' +
          parseFloat(price_out).toFixed(2) +
          '</td>\
		<td class="td-eliminar-pos"><button type="button" onclick="eliminar_carrito(\'' +
          id +
          "','" +
          contador +
          "','" +
          price_out +
          '\')" class="btn btn-eliminar-pos"><i class="fas fa-times"></i></button></td>\
		</tr>'
      );

      arreglo[contador] = 1;
      arreglo2[id] = 1;

      if (!select_gratis) {
        cuenta += parseFloat(price_out);

        cantidades++;
      } else {
        arreglo[contador] = 0;
        gratuito[contador] = 1;
        gratis++;
      }
      contador++;
      productos++;
      show_total();
    } else {
      swal(
        "Este producto ya esta agregado al carrito. Si deseas cambiar la cantidad por favor teclea el numero deseado en la lista.",
        "",
        "info"
      );
    }
  } else {
    swal("Este producto no cuenta con inventario suficiente.", "", "error");
  }
}
$("#input-descuento").change(function () {
  $("#alerta").hide();
  if ($("#input-descuento").val() != "") {
    if ($("#input-descuento").val() > 100 || $("#input-descuento").val() < 0) {
      $("#input-descuento").val("");
      $("#alerta").show();
    } else {
      descuento = $("#input-descuento").val();
    }
  } else {
    descuento = 0;
  }
  show_total();
});
function get_total_kits(tipo = "") {
  var total = 0;
  if (tipo == "") {
    kits.forEach(function (element, index) {
      if (element != null) {
        total += parseFloat(paquetes[element].precio);
      }
    });
  } else {
    kits.forEach(function (element, index) {
      if (element != null) {
        total += parseFloat(paquetes[element].productos);
      }
    });
  }
  return total;
}
function show_total() {
  var tipo_venta = $("#tipo_venta").val();
  if (tipo_venta != "" && tipo_venta != "0") {
    var total = get_total_kits();
    if ($("#tipo_kit").val() != "") {
      $(".precios_mostrar")
        .empty()
        .append(
          "$" +
            parseFloat(
              paquetes[$("#tipo_kit").val()].precio /
                paquetes[$("#tipo_kit").val()].productos
            ).toFixed(2)
        );
      $(".cantidadPago")
        .empty()
        .append(
          parseFloat(
            paquetes[$("#tipo_kit").val()].precio /
              paquetes[$("#tipo_kit").val()].productos
          )
        );
    }
    $("#totalcarrito")
      .empty()
      .append("$" + parseFloat((total * (100 - descuento)) / 100).toFixed(2));
    $("#subtotalcarrito")
      .empty()
      .append(
        "$" + parseFloat(((total * (100 - descuento)) / 100) * 0.84).toFixed(2)
      );
    $("#totaliva")
      .empty()
      .append(
        "$" + parseFloat(((total * (100 - descuento)) / 100) * 0.16).toFixed(2)
      );
  } else {
    $("#totalcarrito")
      .empty()
      .append("$" + parseFloat((cuenta * (100 - descuento)) / 100).toFixed(2));
    $("#subtotalcarrito")
      .empty()
      .append(
        "$" + parseFloat(((cuenta * (100 - descuento)) / 100) * 0.84).toFixed(2)
      );
    $("#totaliva")
      .empty()
      .append(
        "$" + parseFloat(((cuenta * (100 - descuento)) / 100) * 0.16).toFixed(2)
      );
  }
  $("#totalproductos").empty().append(cantidades);
  $("#totalgratis").empty().append(gratis);
}
function cambiar_cantidad(id, price_out) {
  var anterior = arreglo[id];
  if (p_arre[id].existencia >= parseInt($("#" + id + "input").val())) {
    arreglo[id] = $("#" + id + "input").val();
    if (select_gratis && parseFloat(anterior) < parseFloat(arreglo[id])) {
      gratuito[id] = parseFloat(arreglo[id]) - parseFloat(anterior);
      if (anterior == 0) {
        anterior = 1;
      }
      gratis += parseFloat(arreglo[id]) - parseFloat(anterior);
    } else {
      cuenta -= price_out * anterior;
      cantidades =
        parseFloat(cantidades) - parseFloat(anterior) + parseFloat(arreglo[id]);
      cuenta += parseFloat(price_out * arreglo[id]);
    }
    show_total();
  } else {
    swal("Este producto no cuenta con inventario suficiente.", "", "error");
    $("#" + id + "input").val(anterior);
  }
}
function eliminar_carrito(elemento, id, price_out) {
  arreglo2[elemento] = 0;
  $("#" + id).remove();
  cuenta -= parseFloat(price_out);
  cantidades -= arreglo[id];
  productos--;
  show_total();
}
function get_actual_date() {
  var today = new Date();
  var dd = today.getDate();

  var mm = today.getMonth() + 1;
  var yyyy = today.getFullYear();
  if (dd < 10) {
    dd = "0" + dd;
  }

  if (mm < 10) {
    mm = "0" + mm;
  }
  var time =
    today.getHours() + ":" + today.getMinutes() + ":" + today.getSeconds();
  today = dd + "/" + mm + "/" + yyyy;
  return today + " " + time;
}
function create_ticket(
  folio,
  cliente,
  total,
  recibido,
  cambio,
  tabla,
  referencia = null,
  pagos_text
) {
  $("#fecha_ticket").empty().append(get_actual_date());
  $("#folio_ticket").empty().append(folio);
  console.log(referencia);
  if (referencia == null) {
    $("#referencia_ticket").hide();
  } else {
    $("#referencia_ticket").show();
    $("#referencia_cliente").empty().append(referencia);
  }
  if (cliente == null) {
    $("#cliente_ticket").hide();
  } else {
    $("#cliente_ticket").show();
    $("#nombre_cliente").empty().append(cliente.nombre);
    $("#telefono_cliente").empty().append(cliente.telefono);
  }
  $("#productos_ticket").empty().append(cantidades);
  if (gratis != 0) {
    $("#pro_div_tick").addClass("col-md-3");
    $("#sub_div_tick").addClass("col-md-3");
    $("#iva_div_tick").addClass("col-md-3");
    $("#pro_div_tick").removeClass("col-md-4");
    $("#sub_div_tick").removeClass("col-md-4");
    $("#iva_div_tick").removeClass("col-md-4");
    $("#gra_div_tick").show();
    $("#gratis_ticket").empty().append(gratis);
  } else {
    $("#pro_div_tick").removeClass("col-md-3");
    $("#sub_div_tick").removeClass("col-md-3");
    $("#iva_div_tick").removeClass("col-md-3");
    $("#pro_div_tick").addClass("col-md-4");
    $("#sub_div_tick").addClass("col-md-4");
    $("#iva_div_tick").addClass("col-md-4");
    $("#gra_div_tick").hide();
  }

  $("#subtotal_ticket")
    .empty()
    .append("$" + addCommas(parseFloat(total * 0.84).toFixed(2)));
  $("#iva_ticket")
    .empty()
    .append("$" + addCommas(parseFloat(total * 0.16).toFixed(2)));
  $("#total_ticket")
    .empty()
    .append("$" + addCommas(parseFloat(total).toFixed(2)));
  $("#recibido_ticket")
    .empty()
    .append("$" + addCommas(parseFloat(recibido).toFixed(2)));
  $("#cambio_ticket")
    .empty()
    .append("$" + addCommas(parseFloat(cambio).toFixed(2)));
  $("#tabla_ticket > tbody").empty().append(tabla);
  $("#tabla_pagos > tbody").empty().append(pagos_text);

  $("#row_precio_table").show();
  $("#row_total_table").show();

  $("#sec-ticket").show();
  var htmlsource = $("#sec-ticket")[0];
  html2canvas(htmlsource, {
    onrendered: function (canvas) {
      var img = canvas.toDataURL("image/png");
      var doc = new jsPDF();
      doc.addImage(img, "JPEG", -45, -10);

      //doc.save('web.pdf');
      if (cliente != null) {
        var pdf = doc.output("blob");
        var data = new FormData();
        data.append("data", pdf);

        data.append("correo", cliente.correo);
        data.append("nombre", cliente.nombre + " " + cliente.apellidos);
        data.append("folio", folio);
        $.ajax({
          url: server + "webserviceapp/send_email.php",
          type: "post",
          data: data,
          contentType: false,
          processData: false,
          cache: false,

          success(data) {},
        });
      } else {
        doc.save("Nota de Venta - " + folio + ".pdf");
      }
      $("#sec-ticket").hide();
    },
  });
  if (cliente != null) {
    if (cliente.facturacion==1) {
      newFactura(
        cliente.rfc,
        cliente.nombrecomercial,
        "odvillagrana@gmail.com",
        cliente.direccion,
        cliente.numeroexterior,
        cliente.municipio,
        cliente.estado,
        cliente.pais,
        $("#tipo_kit option:selected").html(),
        parseFloat(total * 0.84),
        "1",
        parseFloat(total * 0.84),
        parseFloat(total),
        parseFloat(total * 0.16)
      );
    }
  }
}
$("#payment_reference").submit(function (event) {
  event.preventDefault();
  var cliente = clientes[$("#sector").val()];
  $.ajax({
    url: server + "webserviceapp/validate_reference.php",
    type: "post",
    data: { referencia: $("#n_referencia").val() },
    dataType: "json",
    beforeSend() {
      swal({
        title: "Cargando...",
        showConfirmButton: false,
        imageUrl: "pos/resources/loader.gif",
      });
    },
    success(data) {
      console.log(data);
      if (data.resultado != 0) {
        swal.close();
        $("#modalGenerarReferencia").modal("hide");
        $("#modalPagar").modal("toggle");
        $("#payment_reference")[0].reset();
        console.log(data.cantidad);
        check_quantities(
          "Referencia: " + data.referencia,
          data.cantidad,
          "",
          data.id,
          data.referencia,
          data.tipo
        );
      } else {
        swal(
          "<p id='pswalerror'> Error </p>",
          "<p id='psswalerror'>" + data.mensaje + "</p> ",
          "error"
        );
      }
    },
    error(error) {
      swal(
        "<p id='pswalerror'> Error </p>",
        "<p id='psswalerror'>La referencia de pago no ha podido ser procesada. Intente de nuevo, por favor.</p> ",
        "error"
      );
    },
  });
});
function sale_modal() {
  $("#paypal-button-container").empty();
  var countrows = $("#tablacarrito tr").length;
  var rows = countrows - 1;

  if (rows == 0) {
    swal(
      "<p id='pswalerror'>Atención</p>",
      "<p id='psswalerror'>Para realizar una venta primero debe agregar productos al carrito, por favor vuelva a intentarlo.</p>",
      "info"
    );
  } else {
    var tipo_venta = $("#tipo_venta").val();
    var valid = true;
    var mensaje = "";
    if (tipo_venta != "" && tipo_venta != "0") {
      var cantidad_productos = get_total_kits("p");
      if (cantidades != cantidad_productos) {
        console.log($("#tipo_kit").val());
        if ($("#tipo_kit").val() == "") {
          mensaje +=
            "Para la venta a Empresario Independiente debes seleccionar un KIT.";
        } else {
          mensaje +=
            "La cantidad de productos seleccionadas debe ser igual a la cantidad que ofrece el  " +
            $("#tipo_kit option:selected").html() +
            " " +
            " (" +
            cantidad_productos +
            ").";
        }

        valid = false;
      }
      if ($("#sector").val() == "0") {
        if (mensaje != "") {
          mensaje += "<br>";
        }
        mensaje +=
          "Para la venta de KITS debes seleccionar a un Empresario Independiente.";
        valid = false;
      } else {
        var productos_descuento = 0;
        for (promo in promociones) {
          if (
            promociones[promo].tipo == 1 &&
            promociones[promo].paquete_id == $("#tipo_kit").val()
          ) {
            cliente = null;
            cliente_sel = $("#sector").val();
            if (cliente_sel != "") {
              cliente = clientes[cliente_sel];
            }
            if (promociones[promo].primera == 1 || cliente.compras >= 1) {
              productos_descuento = promociones[promo].cantidad;
            }
          }
        }
        if (productos_descuento != gratis) {
          if (mensaje == "") {
            select_gratis = true;
          }
          mensaje +=
            "El cliente tiene (" + productos_descuento + ") productos gratis.";
          valid = false;
        }
      }
    } else {
      var productos_descuento = 0;
      for (promo in promociones) {
        if (promociones[promo].tipo == 2) {
          if (cantidades / promociones[promo].desde >= 1) {
            productos_descuento =
              parseInt(cantidades / promociones[promo].desde) *
              promociones[promo].cantidad;
          }
        }
      }

      if ($("#sector").val() == "0") {
        mensaje +=
          "Para la venta de productos debes seleccionar a un Cliente Temporal.";
        valid = false;
        productos_descuento = 0;
      } else if (productos_descuento != gratis) {
        if (mensaje == "") {
          select_gratis = true;
        }
        mensaje +=
          "El cliente tiene (" + productos_descuento + ") productos gratis.";
        valid = false;
      }
    }
    if (valid) {
      var auxiliar = $("#totalcarrito").html();
      auxiliar = auxiliar.replace("$", "");
      auxiliar = auxiliar.replace(",", "");
      var total = parseFloat(auxiliar);
      total_a = 0;
      $("#total_metodo_pago")
        .empty()
        .append("$" + addCommas(parseFloat(total).toFixed(2)));
      $("#total_a_metodo_pago")
        .empty()
        .append("$" + addCommas(parseFloat(total_a).toFixed(2)));
      $("#div_pago").hide();
      $("#tabla_metodos > tbody").empty();
      $("#modalPagar").modal("toggle");
      //efective_pay();
      total_google = total;
      transaccion_google = {
        countryCode: "MX",
        currencyCode: "MXN",
        totalPriceStatus: "FINAL",
        totalPrice: parseFloat(total).toFixed(2),
        totalPriceLabel: "Total",
      };
      paypal
        .Buttons({
          locale: "es-MX",
          style: {
            shape: "rect",
            color: "gold",
            layout: "vertical",
            label: "paypal",
          },
          createOrder: function (data, actions) {
            return actions.order.create({
              purchase_units: [
                {
                  amount: {
                    value: total,
                  },
                },
              ],
            });
          },
          onApprove: function (data, actions) {
            return actions.order.capture().then(function (details) {
              //alert('Se ha completado la transacción ' + details.payer.name.given_name + '!');
              check_quantities("Paypal", total);
            });
          },
        })
        .render("#paypal-button-container");
    } else {
      var tipo_swal = "error";
      var text_swal = "Error";
      if (productos_descuento != 0) {
        tipo_swal = "info";
        text_swal = "Productos gratis";
      }
      swal(
        "<p id='pswalerror'> " + text_swal + " </p>",
        "<p id='psswalerror'>" + mensaje + "</p> ",
        tipo_swal
      );
    }
  }
}
function check_quantities(
  tipo,
  cantidad_pago,
  tarjeta = "",
  referencia_id = null,
  referencia = null,
  tipo_referencia = null
) {
  total_a += parseFloat(cantidad_pago);
  var auxiliar = $("#totalcarrito").html();
  auxiliar = auxiliar.replace("$", "");
  auxiliar = auxiliar.replace(",", "");
  var total = parseFloat(auxiliar);
  if (total <= total_a) {
    $("#div_pago").show();
  } else {
    $("#div_pago").hide();
  }
  $("#total_a_metodo_pago")
    .empty()
    .append("$" + addCommas(parseFloat(total_a).toFixed(2)));
  $("#tabla_metodos > tbody").append(
    "<tr><td>" +
      tipo +
      "</td><td>" +
      "$" +
      addCommas(parseFloat(cantidad_pago).toFixed(2)) +
      "</td><td>" +
      tarjeta +
      "</td></tr>"
  );
  pagos.push({
    tipo_pago: tipo,
    cantidad_pago: cantidad_pago,
    referencia_id: referencia_id,
    referencia: referencia,
    tipo_referencia: tipo_referencia,
  });
}
function efective_pay() {
  $("#modalPagar").modal("hide");
  swal({
    type: "info",
    title: "<p id='prealizarventa'>Realizar Cobro en Efectivo</i>",
    html: "<p id='psswal'>¿Cantidad recibida?</p>",
    input: "number",
    confirmButtonText: "Aceptar",
    showCancelButton: true,
    cancelButtonText: "Cancelar",
  }).then((result) => {
    $("#modalPagar").modal("toggle");
    if (result.value) {
      var inputValue = result.value;

      check_quantities("Efectivo", inputValue);
    }
  });
}
function card_pay() {
  $("#modalPagar").modal("hide");
  $("#modalGenerarPagoTarjeta").modal("toggle");
}
function transfer_pay() {
  $("#modalPagar").modal("hide");
  $("#modalGenerarPagoTransfer").modal("toggle");
}
function deposito_pay() {
  $("#modalPagar").modal("hide");
  $("#modalGenerarPagoDeposito").modal("toggle");
}
$("#add_clients_form").submit(function (event) {
  event.preventDefault();
  var data = $("#add_clients_form").serializeArray();
  $.ajax({
    url: server + "webserviceapp/registrar_cliente.php",
    type: "post",
    data: data,
    dataType: "json",
    beforeSend() {
      swal({
        title: "Cargando...",
        showConfirmButton: false,
        imageUrl: "resources/loader.gif",
      });
    },
    success(data) {
      if (data.result) {
        swal(
          "<p id='pswal'> Exito </p>",
          "<p id='psswalerror'>" + data.mensaje + ".</p> ",
          "success"
        );
        $("#exampleModalCenter").modal("hide");
        $("#add_clients_form")[0].reset();
        get_clientes_info();
      } else {
        swal(
          "<p id='pswalerror'> Error </p>",
          "<p id='psswalerror'>" + data.mensaje + ".</p> ",
          "error"
        );
      }
    },
    error(error) {},
  });
});
$("#pago_tarjeta").submit(function (event) {
  event.preventDefault();
  check_quantities("Tarjeta", $("#cantidad_tarjetas").val());
  $("#modalGenerarPagoTarjeta").modal("hide");
  $("#modalPagar").modal("toggle");
  $("#pago_tarjeta")[0].reset();
});
$("#pago_deposito").submit(function (event) {
  event.preventDefault();
  check_quantities("Deposito", $("#cantidad_deposito").val());
  $("#modalGenerarPagoDeposito").modal("hide");
  $("#modalPagar").modal("toggle");
  $("#pago_deposito")[0].reset();
});
$("#pago_transfer").submit(function (event) {
  event.preventDefault();
  check_quantities("Transferencia", $("#cantidad_transfer").val());
  $("#modalGenerarPagoTransfer").modal("hide");
  $("#modalPagar").modal("toggle");
  $("#pago_transfer")[0].reset();
});
$("#card_payment").submit(function (event) {
  event.preventDefault();
  cantidad_tarjeta = $("#cantidad_tarjeta").val();
  numero_tarjeta = $("#numero_tarjeta").val();
  numero_tarjeta = numero_tarjeta.substr(-4);
  OpenPay.token.extractFormAndCreate(
    "card_payment",
    sucess_callbak,
    error_callbak
  );
});
var sucess_callbak = function (response) {
  var token_id = response.data.id;
  $("#token_id").val(token_id);
  $.ajax({
    url: server + "webserviceapp/process_pay.php",
    type: "post",
    data: {
      nombre: $("#nombre_tarjeta").val(),
      token_id: token_id,
      amount: cantidad_tarjeta,
      description: "Esta es solo prueba",
      deviceIdHiddenFieldName: deviceSessionId,
    },
    dataType: "html",
    beforeSend() {
      swal({
        title: "Cargando...",
        showConfirmButton: false,
        imageUrl: "resources/loader.gif",
      });
    },
    success(data) {
      swal.close();
      check_quantities(
        "Terminal Electronica",
        cantidad_tarjeta,
        numero_tarjeta
      );
      $("#card_payment")[0].reset();
      $("#modalTarjeta").modal("hide");
    },
    error(error) {
      swal(
        "<p id='pswalerror'> Error </p>",
        "<p id='psswalerror'>El pago no ha podido ser procesado. Intente de nuevo, por favor.</p> ",
        "error"
      );
    },
  });
};

var error_callbak = function (response) {
  var desc =
    response.data.description != undefined
      ? response.data.description
      : response.message;
  swal(
    "<p id='pswalerror'> Error </p>",
    "<p id='psswalerror'>Los datos de la tarjeta son incorrectos.</p> ",
    "error"
  );
  $("#pay-button").prop("disabled", false);
};

function sale() {
  var auxiliar = $("#totalcarrito").html();
  auxiliar = auxiliar.replace("$", "");
  auxiliar = auxiliar.replace(",", "");
  var total = parseFloat(auxiliar);
  var cambio = parseFloat(total_a) - total;

  var product = "";
  var price_out = "";
  var ticket = "";
  var cualquierCadena = "";
  var regreso = "";
  var tipo_venta = $("#tipo_venta").val();
  var estilo = "";
  if (tipo_venta != "" && tipo_venta != "0") {
    estilo = "";
  }
  var venta_id = 0;
  $.ajax({
    url: server + "webserviceapp/create_sale.php",
    type: "post",
    async: false,
    data: {
      user_id: $("#user_id").val(),
      sucursal_id: $("#sucursal_id").val(),
      total: total,
      cliente_id: $("#sector").val(),
    },
    dataType: "json",
    beforeSend: function () {
      swal({
        title: "Cargando...",
        showConfirmButton: false,
        imageUrl: "resources/loader.gif",
      });
    },
    success: function (data) {
      venta_id = data.id;
    },
  });
  $("#tablacarrito > tbody  > tr").each(function (index) {
    product = $(this).find("td:eq(0)").text();
    product = product.trim();
    cualquierCadena = $(this).find("td:eq(2)").text();
    price_out = $(this).find("td:eq(1)").text();
    price_out = price_out.trim();
    var c_produ = arreglo[this.id];
    var extra = "";
    if (gratuito[this.id]) {
      c_produ = arreglo[this.id] - gratuito[this.id];
      extra =
        "<tr><td>" +
        cualquierCadena.trim() +
        "</td><td>" +
        gratuito[this.id] +
        "</td><td style='" +
        estilo +
        "'>$" +
        addCommas(parseFloat(0).toFixed(2)) +
        "</td><td style='" +
        estilo +
        "'>$" +
        addCommas(parseFloat(gratuito[this.id] * 0).toFixed(2)) +
        "</td></tr>";
    }
    if (c_produ > 0) {
      regreso +=
        "<tr><td>" +
        cualquierCadena.trim() +
        "</td><td>" +
        c_produ +
        "</td><td style='" +
        estilo +
        "'>$" +
        addCommas(parseFloat(price_out).toFixed(2)) +
        "</td><td style='" +
        estilo +
        "'>$" +
        addCommas(parseFloat(c_produ * price_out).toFixed(2)) +
        "</td></tr>";
    }
    regreso += extra;
    $.ajax({
      url: server + "webserviceapp/sale.php",
      type: "post",
      async: false,
      data: {
        product: product,
        cantidad: arreglo[this.id],
        venta: venta_id,
      },
      dataType: "html",
      success() {},
    });
  });
  kits.forEach(function (element, index) {
    $.ajax({
      url: server + "webserviceapp/sale_kits.php",
      type: "post",
      async: false,
      data: {
        paquete: element,
        venta: venta_id,
      },
      dataType: "html",
      success() {},
    });
  });
  var referencias = "";
  var pagos_text = "";
  var cadena = "";
  pagos.forEach(function (element, index) {
    console.log(element);
    if (element.referencia_id != null) {
      if (element.tipo_referencia == 1) {
        referencias += "Pago en tienda " + element.referencia;
        cadena = "Pago en tienda " + element.referencia;
      } else {
        referencias += "Pago en banco " + element.referencia;
        cadena = "Pago en tienda " + element.referencia;
      }
    } else {
      cadena = element.tipo_pago;
    }
    pagos_text +=
      "<tr><td>" +
      cadena +
      "</td><td>$" +
      addCommas(parseFloat(element.cantidad_pago).toFixed(2)) +
      "</td></tr>";

    $.ajax({
      url: server + "webserviceapp/sale_pagos.php",
      type: "post",
      async: false,
      data: {
        tipo_pago: element.tipo_pago,
        cantidad: element.cantidad_pago,
        referencia: element.referencia_id,
        venta: venta_id,
      },
      dataType: "html",
      success() {},
    });
  });
  cliente = null;
  cliente_sel = $("#sector").val();
  if (cliente_sel != "") {
    cliente = clientes[cliente_sel];
  }
  create_ticket(
    venta_id,
    cliente,
    total,
    total_a,
    cambio,
    regreso,
    referencias,
    pagos_text
  );
  ticket += "\n";
  swal({
    type: "success",
    title: "<p id='pswal'>Venta realizada</p>",
    html:
      "<p id='psswal'> El cambio a entregar es de: <br> <b id='psbswal'>$" +
      addCommas(cambio) +
      ".<sup id='supswal'>00</sup></b></p>",
    confirmButtonText: "Aceptar",
    showCancelButton: false,
    cancelButtonText: "Cancelar",
  }).then((result) => {
    $("#modalPagar").modal("hide");
    $("#sector").val("0");
    get_data_chart();
    get_products_list();
    cleanSale();
  });
}
function sale_externo() {
  var auxiliar = $("#totalcarrito").html();
  auxiliar = auxiliar.replace("$", "");
  auxiliar = auxiliar.replace(",", "");
  var total = parseFloat(auxiliar);
  var cambio = parseFloat(total_a) - total;

  var product = "";
  var price_out = "";
  var ticket = "";
  var cualquierCadena = "";
  var regreso = "";
  var tipo_venta = $("#tipo_venta").val();
  var estilo = "";
  if (tipo_venta != "" && tipo_venta != "0") {
    estilo = "display:none;";
  }
  var venta_id = 0;
  $.ajax({
    url: server + "webserviceapp/create_sale.php",
    type: "post",
    async: false,
    data: {
      user_id: $("#user_id").val(),
      sucursal_id: $("#sucursal_id").val(),
      total: total,
      is_payed: 0,
      external_pay: 1,
      cliente_id: $("#sector").val(),
    },
    dataType: "json",
    beforeSend: function () {
      swal({
        title: "Cargando...",
        showConfirmButton: false,
        imageUrl: "resources/loader.gif",
      });
    },
    success: function (data) {
      venta_id = data.id;
    },
  });
  $("#tablacarrito > tbody  > tr").each(function (index) {
    product = $(this).find("td:eq(0)").text();
    product = product.trim();
    cualquierCadena = $(this).find("td:eq(2)").text();
    price_out = $(this).find("td:eq(1)").text();
    price_out = price_out.trim();
    regreso +=
      "<tr><td>" +
      cualquierCadena.trim() +
      "</td><td>" +
      arreglo[this.id] +
      "</td><td style='" +
      estilo +
      "'>$" +
      addCommas(parseFloat(price_out).toFixed(2)) +
      "</td><td style='" +
      estilo +
      "'>" +
      addCommas(parseFloat(arreglo[this.id] * price_out).toFixed(2)) +
      "</td></tr>";
    $.ajax({
      url: server + "webserviceapp/sale.php",
      type: "post",
      async: false,
      data: {
        product: product,
        cantidad: arreglo[this.id],
        venta: venta_id,
      },
      dataType: "html",
      success() {},
    });
  });
  kits.forEach(function (element, index) {
    $.ajax({
      url: server + "webserviceapp/sale_kits.php",
      type: "post",
      async: false,
      data: {
        paquete: element,
        venta: venta_id,
      },
      dataType: "html",
      success() {},
    });
  });
  var referencias = "";
  pagos.forEach(function (element, index) {
    console.log(element);
    if (element.referencia_id != null) {
      if (element.tipo_referencia == 1) {
        referencias += "Pago en tienda " + element.referencia;
      } else {
        referencias += "Pago en banco " + element.referencia;
      }
    }
    $.ajax({
      url: server + "webserviceapp/sale_pagos.php",
      type: "post",
      async: false,
      data: {
        tipo_pago: element.tipo_pago,
        cantidad: element.cantidad_pago,
        referencia: element.referencia_id,
        venta: venta_id,
      },
      dataType: "html",
      success() {},
    });
  });
  cliente = null;
  cliente_sel = $("#sector").val();
  if (cliente_sel != "") {
    cliente = clientes[cliente_sel];
  }
  //create_ticket(venta_id, cliente, total, total_a, cambio,regreso, referencias);
  ticket += "\n";
  swal({
    type: "info",
    title: "<p id='pswal'>Venta con pago externo</p>",
    html:
      "<p id='psswal'> Por favor has extensiva la siguiente url con tu cliente para continuar con el proceso de pago:<br>\
<a href='https://powergolden.com.mx/pos/external_pay.php?venta=" +
      venta_id +
      "'>https://powergolden.com.mx/os/external_pay.php?venta=" +
      venta_id +
      "</a></p>",
    confirmButtonText: "Aceptar",
    showCancelButton: false,
    cancelButtonText: "Cancelar",
  }).then((result) => {
    $("#modalPagar").modal("hide");
    $("#sector").val("0");
    get_data_chart();
    get_products_list();
    cleanSale();
  });
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
function cambio_amount() {
  console.log(moneda);
  if (moneda == "USD") {
    console.log("Aqui");
    $("#transaction_amount").val(total_google * tipo_cambio);
  } else {
    $("#transaction_amount").val(total_google);
  }
}

//Aqui empieza  google
var transaccion_google;
const baseRequest = {
  apiVersion: 2,
  apiVersionMinor: 0,
};

const allowedCardNetworks = [
  "AMEX",
  "DISCOVER",
  "INTERAC",
  "JCB",
  "MASTERCARD",
  "VISA",
];
const allowedCardAuthMethods = ["PAN_ONLY", "CRYPTOGRAM_3DS"];
const tokenizationSpecification = {
  type: "PAYMENT_GATEWAY",
  parameters: {
    gateway: "example",
    gatewayMerchantId: "exampleGatewayMerchantId",
  },
};

const baseCardPaymentMethod = {
  type: "CARD",
  parameters: {
    allowedAuthMethods: allowedCardAuthMethods,
    allowedCardNetworks: allowedCardNetworks,
  },
};

/**
 * Describe your site's support for the CARD payment method including optional
 * fields
 *
 * @see {@link https://developers.google.com/pay/api/web/reference/request-objects#CardParameters|CardParameters}
 */
const cardPaymentMethod = Object.assign({}, baseCardPaymentMethod, {
  tokenizationSpecification: tokenizationSpecification,
});

let paymentsClient = null;

function getGoogleIsReadyToPayRequest() {
  return Object.assign({}, baseRequest, {
    allowedPaymentMethods: [baseCardPaymentMethod],
  });
}
function getGooglePaymentDataRequest() {
  const paymentDataRequest = Object.assign({}, baseRequest);
  paymentDataRequest.allowedPaymentMethods = [cardPaymentMethod];
  paymentDataRequest.transactionInfo = getGoogleTransactionInfo();
  paymentDataRequest.merchantInfo = {
    merchantName: "Productos Power Golden",
  };

  paymentDataRequest.callbackIntents = ["PAYMENT_AUTHORIZATION"];

  return paymentDataRequest;
}
function getGooglePaymentsClient() {
  if (paymentsClient === null) {
    paymentsClient = new google.payments.api.PaymentsClient({
      environment: "TEST",
      paymentDataCallbacks: {
        onPaymentAuthorized: onPaymentAuthorized,
      },
    });
  }
  return paymentsClient;
}

function onPaymentAuthorized(paymentData) {
  return new Promise(function (resolve, reject) {
    // handle the response
    processPayment(paymentData)
      .then(function () {
        resolve({ transactionState: "SUCCESS" });
        console.log("Pedos");
        check_quantities("Google", total_google);
      })
      .catch(function () {
        resolve({
          transactionState: "ERROR",
          error: {
            intent: "PAYMENT_AUTHORIZATION",
            message: "Insufficient funds, try again. Next attempt should work.",
            reason: "PAYMENT_DATA_INVALID",
          },
        });
      });
  });
}

function onGooglePayLoaded() {
  const paymentsClient = getGooglePaymentsClient();
  paymentsClient
    .isReadyToPay(getGoogleIsReadyToPayRequest())
    .then(function (response) {
      if (response.result) {
        addGooglePayButton();
      }
    })
    .catch(function (err) {
      // show error in developer console for debugging
      console.error(err);
    });
}

function addGooglePayButton() {
  const paymentsClient = getGooglePaymentsClient();
  const button = paymentsClient.createButton({
    onClick: onGooglePaymentButtonClicked,
  });
  document.getElementById("container").appendChild(button);
}

function getGoogleTransactionInfo() {
  return transaccion_google;
}

function onGooglePaymentButtonClicked() {
  const paymentDataRequest = getGooglePaymentDataRequest();
  paymentDataRequest.transactionInfo = getGoogleTransactionInfo();

  const paymentsClient = getGooglePaymentsClient();
  paymentsClient.loadPaymentData(paymentDataRequest);
}

let attempts = 0;

function processPayment(paymentData) {
  return new Promise(function (resolve, reject) {
    setTimeout(function () {
      // @todo pass payment token to your gateway to process payment
      paymentToken = paymentData.paymentMethodData.tokenizationData.token;

      if (attempts++ % 2 == 0) {
        reject(new Error("Every other attempt fails, next one should succeed"));
      } else {
        resolve({});
      }
    }, 500);
  });
}
