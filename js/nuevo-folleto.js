var sel;

function productos(){
    $("#select").append(html);
}

function enviarfolleto(){
    var nombre = $("#nombre").val();
    var descripcion = $("#descripcion").val();

    let datos = {
        name: nombre,
        description: descripcion,
    }
    
    console.log(datos);

    $.ajax({
        url: 'ajax/crear-folleto.php',
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

function eliminar(id){
    sel = id;
}

function confirmar(){
    console.log(sel);
    console.log("hola");
    
    $.ajax({
        url: 'ajax/eliminar-folleto.php',
        data: {id_producto:sel},
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