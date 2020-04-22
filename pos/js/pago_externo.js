var server = "";
function get_externos(){
  var data = {
    inicio: $("#inicio").val(),
    fin: $("#fin").val()
  };
  $.ajax({
    url: server + "webserviceapp/get_info_externos.php",
    type: "POST",
    data:data,
    dataType: "json",
    beforeSend: function() {},
    success: function(data) {
        $("#externos > tbody").empty().append(data);

    }
});
}
$(document).ready(function() {
  get_externos();
  
});
$("#pago_externo").submit(function(event) {
    event.preventDefault();
    var data=$("#pago_externo").serializeArray();
    $.ajax({
      url: server + "webserviceapp/add_external_reference.php",
      type: "post",
      data: data,
      dataType: "json",
      beforeSend() {
        swal({
          title: "Cargando...",
          showConfirmButton: false,
          imageUrl: "pos/resources/loader.gif"
        });
      },
      success(data) {
        swal({
            type: "info",
            title:  "<p id='pswal'>Venta con pago externo</p>",
            html:  "<p id='psswal'> Por favor has extensiva la siguiente url con tu cliente para continuar con el proceso de pago:<br>\
        <a href='https://powergolden.com.mx/pos/external_payment.php?venta="+data+"'>https://powergolden.com.mx/pos/external_payment.php?venta="+data+"</a></p>",
            confirmButtonText: "Aceptar",
            showCancelButton: false,
            cancelButtonText: "Cancelar"
          }).then(result => {
           
          });
      },
      error(error) {
        swal(
          "<p id='pswalerror'> Error </p>",
          "<p id='psswalerror'>La referencia de pago no ha podido ser procesada. Intente de nuevo, por favor.</p> ",
          "error"
        );
      }
    });
  });