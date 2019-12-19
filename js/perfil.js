$(document).ready(function() {
    $("#btn-guardar-perfil").click(function(event) {
        event.preventDefault();
        registrar();
    });
});

function registrar() {
    var nombre = $("#nombre").val();
    var apellido = $("#apellido").val();
    var telefono = $("#telefono").val();
    var correo = $("#correo").val();
    var direccion = $("#direccion").val();
    var estado = $("#estado").val();
    var ciudad = $("#ciudad").val();
    var nacimiento = $("#nacimiento").val();
    var codigopostal = $("#cp").val();

    let datos = {
        name: nombre,
        last_name: apellido,
        phone: telefono,
        email: correo,
        address: direccion,
        state: estado,
        city: ciudad,
        date: nacimiento,
        cp: codigopostal
    }
    
    console.log(datos);

    $.ajax({
        url: 'ajax/perfil.php',
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
                    $("#edit_button").click();
                }, 5000);
                Swal.fire({
                    icon: 'success',
                    title: 'Éxito',
                    text: json_mensaje.mensaje
                }) 
                .then((ok) => {
                    if (ok) {
                    $("#edit_button").click();
                    }
                });
            }
        },

        error: function(er) {

            var json_mensaje = JSON.parse(er.responseText);
            console.log(json_mensaje);

            wal.fire({
                icon: 'error',
                title: 'Oops...',
                text: json_mensaje.mensaje
            }); 
        }
    });
}
