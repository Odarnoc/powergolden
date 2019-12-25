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
    var category = document.getElementById('rol');
    var rol = category.options[category.selectedIndex].value;

    let datos = {
        name: nombre,
        last_name: apellido,
        phone: telefono,
        email: correo,
        pass: contraseña,
        rol: rol
    }
    
    console.log(datos);

    $.ajax({
        url: 'ajax/registro.php',
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
            setTimeout(function(){
                    location.reload();
            }, 5000);
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

    


