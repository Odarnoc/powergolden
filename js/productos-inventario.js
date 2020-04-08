$(document).ready(function() {
    $("#but-inventario").click(function(event) {
        event.preventDefault();
        registrar();
    });
});

function registrar() {
    var producto = $("#prod").val();
    var sucursal = $("#sucursal").val();
    var minimo = $("#minimo").val();

    let datos = {
        producto: producto,
        sucursal: sucursal,
        minimo: minimo
    }
    
    console.log(datos);

    $.ajax({
        url: 'ajax/productos-inventario.php',
        data: datos,
        type: 'POST',
        success: function(respuesta) {
            var json_mensaje = JSON.parse(respuesta);
            console.log(respuesta);
        if (json_mensaje.error != undefined) {
            Swal.fire({
                icon: 'error',
                title: 'Oops...',
                text: json_mensaje.mensaje
            }); 
        } else {
            setTimeout(function(){
                    location.reload();
            }, 5000);
            Swal.fire({
                icon: 'success',
                title: 'Éxito',
                text: json_mensaje.mensaje
            }) 
            .then((ok) => {
                if (ok) {
                    location.reload();
                }
            });
        }
        },

        error: function(er) {

            var json_mensaje = JSON.parse(er.responseText);
            console.log(json_mensaje);

            Swal.fire({
                icon: 'error',
                title: 'Oops...',
                text: json_mensaje.mensaje
            }); 
        }
    });
}