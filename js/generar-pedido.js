function generar_envio() {

    $.ajax({
        url: "ajax/preparacion-envio.php",
        type: "post",
        data: {
            id: $("#id").val(),
            alto: $("#alto").val(),
            largo: $("#largo").val(),
            ancho: $("#ancho").val(),
            peso: $("#peso").val()
        },
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
                setTimeout(function() {
                    location.reload();
                }, 5000);
                Swal.fire({
                        icon: 'success',
                        title: 'Éxito',
                        text: json_mensaje.mensaje
                    })
                    .then((ok) => {
                        if (ok) {
                            location.href = "panel_envios.php"
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