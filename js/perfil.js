$(document).ready(function() {
    $("#btn-guardar-perfil").click(function(event) {
        event.preventDefault();
        registrar();
    });
});

function registrar() {
    var nombre = $("#nombre").val();
    var apellido = $("#apellido").val();
    var telefono = $("#telefono").val();
    var correo = $("#correo").val();


    let datos = {
        name: nombre,
        last_name: apellido,
        phone: telefono,
        email: correo,
    }
    
    console.log(datos);

    $.ajax({
        url: 'ajax/perfil.php',
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
                    $("#edit_button").click();
                }, 5000);
                Swal.fire({
                    icon: 'success',
                    title: 'Éxito',
                    text: json_mensaje.mensaje
                }) 
                .then((ok) => {
                    if (ok) {
                    $("#edit_button").click();
                    }
                });
            }
        },

        error: function(er) {

            var json_mensaje = JSON.parse(er.responseText);
            console.log(json_mensaje);

            wal.fire({
                icon: 'error',
                title: 'Oops...',
                text: json_mensaje.mensaje
            }); 
        }
    });
}

$(document).ready(function() {
    $("#editar_perf_admin").click(function(event) {
        event.preventDefault();
        registrar();
    });
});

function registrar() {
    var nombre = $("#nombre").val();
    var apellido = $("#apellido").val();
    var telefono = $("#telefono").val();
    var correo = $("#correo").val();
    var fecha = $("#nacimiento").val();
    var id = $("#id").val();

    let datos = {
        idp:id,
        name: nombre,
        last_name: apellido,
        phone: telefono,
        email: correo,
        date:fecha

    }
    
    console.log(datos);

    $.ajax({
        url: 'ajax/editar-perfil-admin.php',
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
                    $("#edit_button").click();
                }, 5000);
                Swal.fire({
                    icon: 'success',
                    title: 'Éxito',
                    text: json_mensaje.mensaje
                }) 
                .then((ok) => {
                    if (ok) {
                    $("#edit_button").click();
                    }
                });
            }
        },

        error: function(er) {

            var json_mensaje = JSON.parse(er.responseText);
            console.log(json_mensaje);

            wal.fire({
                icon: 'error',
                title: 'Oops...',
                text: json_mensaje.mensaje
            }); 
        }
    });
}



$(document).ready(function() {
    $("#editar_perf").click(function(event) {
        event.preventDefault();
        registrar();
    });
});

function registrar() {
    var nombre = $("#nombre").val();
    var apellido = $("#apellido").val();
    var telefono = $("#telefono").val();
    var correo = $("#correo").val();
    var fecha = $("#nacimiento").val();
    var id = $("#id").val();

    let datos = {
        date:fecha,
        idp:id,
        name: nombre,
        last_name: apellido,
        phone: telefono,
        email: correo,

    }
    
    console.log(datos);

    $.ajax({
        url: 'ajax/editar-perfil.php',
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
                    $("#edit_button").click();
                }, 5000);
                Swal.fire({
                    icon: 'success',
                    title: 'Éxito',
                    text: json_mensaje.mensaje
                }) 
                .then((ok) => {
                    if (ok) {
                    $("#edit_button").click();
                    }
                });
            }
        },

        error: function(er) {

            var json_mensaje = JSON.parse(er.responseText);
            console.log(json_mensaje);

            wal.fire({
                icon: 'error',
                title: 'Oops...',
                text: json_mensaje.mensaje
            }); 
        }
    });
}