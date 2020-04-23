$("#form-roles").submit(function(event) {
    event.preventDefault();
    var data = {
        nombre: $("#nombre").val(),
        descripcion: $("#descripcion").val(),
        menus: []
    };

    
    $("[name='menus']:checked").each(function (i) {
        data.menus.push($(this).val());
    });
    
    if(data.menus.length > 0){
        $.ajax({
            url: 'ajax/agregar-rol.php',
            data: data,
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
    }else{
        Swal.fire({
            icon: 'error',
            title: 'Oops...',
            text: 'Seleccione al menos un privilegio.'
        }); 
    }
    
});