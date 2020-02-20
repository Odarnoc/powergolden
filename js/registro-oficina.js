$(document).ready(function() {
    $("#registrar_us_ofice").click(function(event) {
        event.preventDefault();
        registrar();
    });
});

function registrar() {
    var nombre = $("#name").val();
    var apellido = $("#last_name").val();
    var telefono = $("#phone").val();
    var correo = $("#email").val();

    let datos = {
        name: nombre,
        last_name: apellido,
        phone: telefono,
        email: correo
    }
    
    console.log(datos);

    $.ajax({
        url: 'ajax/registro-oficina.php',
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
                    //location.reload();
            }, 5000);
            Swal.fire({
                icon: 'success',
                title: 'Éxito',
                text: json_mensaje.mensaje
            }) 
            .then((ok) => {
                if (ok) {
                    //location.reload();
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

    


