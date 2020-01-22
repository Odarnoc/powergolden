var select;


$(document).ready(function() {
    $("#edit_but").click(function(event) {
        event.preventDefault();
        editar();
    });
});

function editar() {
    var usuario=$("#id").val();
    var nombre = $("#name").val();
    var apellido = $("#last_name").val();
    var telefono = $("#phone").val();
    var rol = $("#rol").val();
    var correo = $("#email").val();
    var contraseña = $("#pass").val();

    let datos = {
        id: usuario,
        name: nombre,
        last_name: apellido,
        rol: rol,
        phone: telefono,
        email: correo,
        pass: contraseña
    }
    
    console.log(datos);

    $.ajax({
        url: 'ajax/editar-persona.php',
        data: datos,
        type: 'POST',
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
            Swal.fire({
                icon: 'success',
                title: 'Éxito',
                text: json_mensaje.mensaje
            }) 
            .then((ok) => {
                if (ok) {
                    location.reload();
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

/*Eliminar Funcion*/ 
function eliminar(id){
    select = id;
}


function confirmar(){
console.log(select);

$.ajax({
    url: 'ajax/eliminar-usuario.php',
    data: {id:select},
    type: 'POST',
    success: function(respuesta) {
        var json_mensaje = JSON.parse(respuesta);
        console.log(respuesta);
        Swal.fire({
            icon: 'success',
            title: 'Éxito',
            text: json_mensaje.mensaje
        }) 
        .then((ok) => {
            if (ok) {
                location.reload();
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
