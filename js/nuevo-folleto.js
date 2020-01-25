var sel;

function productos(){
    $("#select").append(html);
}

$("#form-folleto").submit(function(e) {
    e.preventDefault();
    var formData = new FormData(this);
    $.ajax({
        url: 'ajax/crear-folleto.php',
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

    $("#edit-folleto").submit(function(e) {
        e.preventDefault();
        var formData = new FormData(this);
        $.ajax({
            url: 'ajax/editar-folleto.php',
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