var sel;

function productos(){
    $("#select").append(html);
}

$("#form-promocion").submit(function(e) {
    e.preventDefault();
    var formData = new FormData(this);
    $.ajax({
        url: 'ajax/agregar-promocion.php',
        type: 'POST',
        data: formData,
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
        },

        cache: false,
        contentType: false,
        processData: false
    });
});



function eliminar(id){
    sel = id;
}

function confirmar(){
    console.log(sel);
    
    $.ajax({
        url: 'ajax/eliminar-promocion.php',
        data: {id_promocion:sel},
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

    $("#edit-promocion").submit(function(e) {
        e.preventDefault();
        var formData = new FormData(this);
        $.ajax({
            url: 'ajax/editar-promocion.php',
            type: 'POST',
            data: formData,
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
            },
    
            cache: false,
            contentType: false,
            processData: false
        });
    });