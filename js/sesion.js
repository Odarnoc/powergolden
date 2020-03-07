$(document).ready(function() {
    $('#form-login').on('submit', function(e) {
        e.preventDefault();
        iniciaradministrador();
    });
});

function iniciaradministrador() {
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
            var json_mensaje = JSON.parse(respuesta);
            console.log(json_mensaje);
            if (json_mensaje.error != undefined) {
                Swal.fire({
                    icon: 'error',
                    title: 'Oops...',
                    text: json_mensaje.mensaje
                });
            } else {
                location.href = "dashboard.php";
            }
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

$(document).ready(function() {
    $('#form-login-oficina').on('submit', function(e) {
        e.preventDefault();
        iniciaroficina();
    });
});

function iniciaroficina() {
    var correo = $("#email").val();
    var contraseña = $("#pass").val();

    let datos = {
        email: correo,
        pass: contraseña
    }

    console.log(datos);

    $.ajax({
        url: 'ajax/sesion-oficina.php',
        data: datos,
        type: 'POST',
        success: function(respuesta) {
            var json_mensaje = JSON.parse(respuesta);
            console.log(json_mensaje);
            if (json_mensaje.error != undefined) {
                Swal.fire({
                    icon: 'error',
                    title: 'Oops...',
                    text: json_mensaje.mensaje
                });
            } else {
                location.href = "oficina-virtual.php";
            }
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
