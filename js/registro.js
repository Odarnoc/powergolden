$(document).ready(function() {
    $("#registrar_but").click(function(event) {
        event.preventDefault();
        datos_registro();
    });
});

function datos_registro() {
    var nombre = $("#name").val();
    var apellido = $("#last_name").val();
    var telefono = $("#phone").val();
    var correo = $("#email").val();
    var contraseña = $("#pass").val();

    var datos = new FormData();

        datos.append('name', nombre);
        datos.append('last_name', apellido);
        datos.append('phone', telefono);
        datos.append('email', correo);
        datos.append('pass', contraseña);


    console.log(datos);


$.ajax({
    type: 'post',
    url: 'ajax/registro.php',
    data: datos,
    success: function(response) {
        console.log(response);
    
    }
});

}