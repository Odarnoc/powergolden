var select;

$(document).ready(function() {
    $("#registrar_tar").click(function(event) {
        event.preventDefault();
        registrar();
    });
});

function registrar() {
    var propietario = $("#propietario").val();
    var tarjeta = $("#numtarjeta").val();
    var expira = $("#fecha").val();
    var ccv = $("#codigo").val();

    let datos = {
        propietar: propietario,
        ntarj: tarjeta,
        fecha: expira,
        codigo: ccv

    }
    
    console.log(datos);

    $.ajax({
        url: 'ajax/billetera-add.php',
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


function eliminar(id){
    select = id;

}


function confirmar(){
console.log(select);

$.ajax({
    url: 'ajax/eliminar-tarjeta.php',
    data: {id_tarjeta:select},
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

