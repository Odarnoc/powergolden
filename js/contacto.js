$(document).ready(function() {
    $("#enviar").click(function(event) {
        event.preventDefault();
        send();
    });
});

function send() {
    var nombre = $("#nombre").val();
    var correo= $("#email").val();
    var telefono = $("#telefono").val();
    var mensaje = $("#mensaje").val();

    let datos = {
        name: nombre,
        mail: correo,
        phone: telefono,
        mensaj: mensaje
    }
    
    console.log(datos);

    $.ajax({
        url: 'ajax/contacto.php',
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
                location.href="index.php"
            }, 5000);
            Swal.fire({
                icon: 'success',
                title: 'Éxito',
                text: json_mensaje.mensaje
            }) 
            .then((ok) => {
                if (ok) {
                    location.href="index.php"
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

    


