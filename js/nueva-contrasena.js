$(document).ready(function() {
    $("#enviar").click(function(ev) {
        ev.preventDefault();
        recupera();
    });
});

function recupera() {
    var contra1 = $("#pass1").val();
    var contra2 = $("#pass2").val();
    

    var pins = localStorage.getItem("pin");

    if(contra1 == contra2){

        
        let datos = {
            pass: contra1,
            pin: pins
        }

        $.ajax({
            url: 'ajax/nueva-contrasena.php',
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
                        location.href="contrasena-cambiada.php"
                    }, 5000);
                    Swal.fire({
                        icon: 'success',
                        title: 'Éxito',
                        text: json_mensaje.mensaje
                    }) 
                    .then((ok) => {
                        if (ok) {
                            location.href="contrasena-cambiada.php"
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
    }else{
        Swal.fire({
            icon: 'error',
            title: 'Oops...',
            text: "Las contraseñas no coinciden"
        }); 
    }
}