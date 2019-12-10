$(document).ready(function() {
    $("#confirmar").click(function(ev) {
        ev.preventDefault();
        enviarPin();
    });
});

function enviarPin() {
    var pinIn = $("#pin-in").val();
    localStorage.setItem("pin",pinIn);
    let datos = {
        pin: pinIn
    }

    $.ajax({
        url: 'ajax/pin.php',
        data: datos,
        type: 'POST',
        success: function(respuesta) {
            var json_mensaje = JSON.parse(respuesta);
            console.log(respuesta);
            setTimeout(function(){
                location.href="nueva-contrasena.php"
            }, 5000);
            Swal.fire({
                icon: 'success',
                title: 'Éxito',
                text: json_mensaje.mensaje
              }) 
              .then((ok) => {
                if (ok) {
                    location.href="nueva-contrasena.php"
                }
            });
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