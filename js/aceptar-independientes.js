function registrar() {
    var nombre = $("#nombre").val();
    var correo = $("#correo").val();
    var id = $("#id").val();

    let datos = {
        name: nombre,
        correo: correo,
        id: id
    }
    
    console.log(datos);

    $.ajax({
        url: 'ajax/independiente-aceptar.php',
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
                location.href="lista-independientes.php"
            }, 5000);
            Swal.fire({
                icon: 'success',
                title: 'Éxito',
                text: json_mensaje.mensaje
            }) 
            .then((ok) => {
                if (ok) {
                    location.href="lista-independientes.php"
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

function rechazar() {
    var nombre = $("#nombre").val();
    var correo = $("#correo").val();

    let datos = {
        name: nombre,
        correo: correo
    }
    
    console.log(datos);

    $.ajax({
        url: 'ajax/independiente-rechazar.php',
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
                location.href="lista-independientes.php"
            }, 5000);
            Swal.fire({
                icon: 'success',
                title: 'Éxito',
                text: json_mensaje.mensaje
            }) 
            .then((ok) => {
                if (ok) {
                    location.href="lista-independientes.php"
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