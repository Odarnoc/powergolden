var titulo;
var mensaje;

function enviar() {
    titulo = $('#titulo').val();
    mensaje = $('#mensaje').val();

    $('#rtitulo').text(titulo);
    $('#rmensaje').text(mensaje);
}

function final() {
    $.ajax({
        url: 'push.php',
        data: {titulo: titulo, mensaje:mensaje},
        type: 'POST'
    });
    location.reload();
}