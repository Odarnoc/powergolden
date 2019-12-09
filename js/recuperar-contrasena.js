$(document).ready(function() {
    $("#cambiar-pass").click(function(ev) {
        ev.preventDefault();
        recupera();
    });
});

function recupera() {
    var correo = $("#email").val();
    let datos = {
        email: correo
    }

    $.ajax({
        url: 'ajax/recuperar_contrasena.php',
        data: datos,
        type: 'POST',
        success: function(respuesta) {
            var json_mensaje = JSON.parse(respuesta);
            console.log(respuesta);
            setTimeout(function(){
                location.href="ingresar-pin.php"
            }, 5000);
            Swal.fire({
                icon: 'success',
                title: 'Éxito',
                text: json_mensaje.mensaje
              }) 
              .then((ok) => {
                if (ok) {
                    location.href="ingresar-pin.php"
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