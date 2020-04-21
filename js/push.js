var titulo;
var mensaje;
var atitulo;
var amensaje;

function enviar() {
    titulo = $('#titulo').val();
    mensaje = $('#mensaje').val();

    $('#rtitulo').text(titulo);
    $('#rmensaje').text(mensaje);
}

function final() {
    $.ajax({
        url: 'push.php',
        data: { titulo: titulo, mensaje: mensaje },
        type: 'POST'
    });
    location.reload();
}

function enviartabla(id) {

    $.ajax({
        url: "ajax/notificaciones_ifo.php",
        type: "post",
        data: { id: id },

        success: function(respuesta) {
            var json_mensaje = JSON.parse(respuesta);
            if (json_mensaje.error != undefined) {
                Swal.fire({
                    icon: 'error',
                    title: 'Oops...',
                    text: json_mensaje.mensaje
                });
            } else {
                var json_mensaje = JSON.parse(respuesta);
                console.log(json_mensaje);

                atitulo = json_mensaje['titulo'];
                amensaje = json_mensaje['mensaje'];

                $('#artitulo').text(atitulo);
                $('#armensaje').text(amensaje);
            }
        },
    });

}

function finaltabla() {
    $.ajax({
        url: 'push.php',
        data: { titulo: atitulo, mensaje: amensaje },
        type: 'POST'
    });
    location.reload();
}