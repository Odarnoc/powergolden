$("#form-folleto").submit(function (e) {
    e.preventDefault();
    var formData = new FormData(this);
    $.ajax({
        url: 'ajax/registro-cliente.php',
        type: 'POST',
        data: formData,
        success: function (respuesta) {
            var json_mensaje = JSON.parse(respuesta);
            console.log(respuesta);
            if (json_mensaje.error != undefined) {
                Swal.fire({
                    icon: 'error',
                    title: 'Oops...',
                    text: json_mensaje.mensaje
                });
            } else {
                Swal.fire({
                    icon: 'success',
                    title: 'Éxito',
                    text: json_mensaje.mensaje
                })
                    .then((ok) => {
                        if (ok) {
                            location.href = "iniciar-sesion-cliente.php";
                        }
                    });
            }
        },

        error: function (er) {

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

$("#form-login-oficina").submit(function (e) {
    e.preventDefault();
    var formData = new FormData(this);
    $.ajax({
        url: 'ajax/sesion-cliente.php',
        type: 'POST',
        data: formData,
        success: function (respuesta) {
            var json_mensaje = JSON.parse(respuesta);
            console.log(respuesta);
            if (json_mensaje.error != undefined) {
                Swal.fire({
                    icon: 'error',
                    title: 'Oops...',
                    text: json_mensaje.mensaje
                });
            } else {
                location.href = "index.php";
            }
        },

        error: function (er) {

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