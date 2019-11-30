$(document).ready(function() {
    $("#registrar_but").click(function(event) {
        event.preventDefault();
        registrar();
    });
});

function registrar() {
    var nombre = $("#name").val();
    var apellido = $("#last_name").val();
    var telefono = $("#phone").val();
    var correo = $("#email").val();
    var contraseña = $("#pass").val();

    let datos = {
        name: nombre,
        last_name: apellido,
        phone: telefono,
        email: correo,
        pass: contraseña
    }

    console.log(datos);

    $.ajax({
        url: 'ajax/registro.php',
        data: datos,
        type: 'POST',
        success: function(respuesta) {
            console.log(respuesta);
        },
        error: function() {
            console.log("No se ha podido obtener la información");
        }
    });

}