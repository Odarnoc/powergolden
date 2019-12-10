$(document).ready(function() {
    $('#form-login').on('submit', function(e) {
        e.preventDefault();
        iniciar();
    });
});

function iniciar() {
    var correo = $("#email").val();
    var contraseña = $("#pass").val();

    let datos = {
        email: correo,
        pass: contraseña
    }

    console.log(datos);

    $.ajax({
        url: 'ajax/sesion.php',
        data: datos,
        type: 'POST',
        success: function(respuesta) {
            console.log(respuesta);
            location.href = "index.php";
        },
        error: function(er) {

            var json_mensaje = JSON.parse(er.responseText);
            console.log(json_mensaje);

            Swal.fire({
                icon: 'error',
                title: 'Oops...',
                text: json_mensaje.mensaje
            })
        }
    });

}