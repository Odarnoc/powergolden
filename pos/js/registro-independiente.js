$(document).ready(function () {
    get_clientes_info_inde();
});

$("#form-folleto").submit(function(e) {
    e.preventDefault();
    var formData = new FormData(this);
    $.ajax({
        url: '../ajax/registro-independiente.php',
        type: 'POST',
        data: formData,
        success: function(respuesta) {
            $("#modalIndependientes").modal("hide");
            $("#form-folleto")[0].reset();
            $('#image-upload').attr("style", "background-image: url(../images/bg-image-upload.jpg?>);");
                    $('#image-upload').removeClass("overlay-image-upload");
                    $('#image-upload2').attr("style", "background-image: url(../images/bg-image-upload.jpg?>);");
                    $('#image-upload2').removeClass("overlay-image-upload");
                    get_clientes_info_inde();
                    get_clientes_info();

        },

        error: function(er) {

            var json_mensaje = JSON.parse(er.responseText);
            console.log(json_mensaje);

            Swal.fire({
                icon: 'error',
                title: 'Oops...',
                text: json_mensaje.mensaje
            }); 
        },

        cache: false,
        contentType: false,
        processData: false
    });
});

function get_clientes_info_inde() {
    $.ajax({
      url: "webserviceapp/get_clientes.php",
      type: "POST",
      data:{'tipo':1},
      dataType: "json",
      beforeSend: function() {},
      success: function(data) {
        clientes = data.arreglo;
        console.log(clientes);
        
        //console.log(data.arreglo[2]);
        $("#clienteInde")
          .empty()
          .append(data.list);
        $(".selectpicker").selectpicker("refresh");
      }
    });
  }