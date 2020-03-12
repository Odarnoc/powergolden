var select;

$(document).ready(function() {
    $("#registrar_suc").click(function(event) {
        event.preventDefault();
        registrari();
    });
});

function registrari() {
    var nom = $("#nombre").val();
    var dir = $("#direccion").val();
    var cp = $("#cp").val();
    var col = $("#colo").val();
    var mun = $("#muni").val();
    var est = $("#estado").val();

    let datos = {
        nombre: nom,
        direccion: dir,
        cp: cp,
        colonia: col,
        munici: mun,
        estado:est

    }
    
    console.log(datos);

    $.ajax({
        url: 'ajax/add-sucursal.php',
        data: datos,
        type: 'POST',
        success: function(respuesta) {
            var json_mensaje = JSON.parse(respuesta);
            if (json_mensaje.error != undefined) {
                Swal.fire({
                    icon: 'error',
                    title: 'Oops...',
                    text: json_mensaje.mensaje
                });
            } else {
                console.log(respuesta);
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
                        location.href="lista-sucursal.php";
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


function eliminar(id){
    select = id;

}


function confirmar(){
console.log(select);

$.ajax({
    url: 'ajax/eliminar-sucursal.php',
    data: {id_sucursal:select},
    type: 'POST',
    success: function(respuesta) {
        var json_mensaje = JSON.parse(respuesta);
        console.log(respuesta);
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


$(document).ready(function() {
    $("#editar_suc").click(function(event) {
        event.preventDefault();
        registrar();
    });
});

function registrar() {
    var nom = $("#nombre").val();
    var dir = $("#direccion").val();
    var cp = $("#cp").val();
    var col = $("#colo").val();
    var mun = $("#muni").val();
    var est = $("#estado").val();
    var idd = $("#id").val();

    let datos = {
        nombre:nom,
        direccion: dir,
        cp: cp,
        colonia: col,
        munici: mun,
        estado:est,
        id:idd

    }
    
    console.log(datos);

    $.ajax({
        url: 'ajax/editar-sucursal.php',
        data: datos,
        type: 'POST',
        success: function(respuesta) {
            var json_mensaje = JSON.parse(respuesta);
            if (json_mensaje.error != undefined) {
                Swal.fire({
                    icon: 'error',
                    title: 'Oops...',
                    text: json_mensaje.mensaje
                });
            } else {
                console.log(respuesta);
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
                        location.href="lista-sucursal.php";
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
