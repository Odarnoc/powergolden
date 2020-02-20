function guardar() {
    var nombre = $("#nombre").val();
    var desc = $("#desc").val();
    var total = $("#total").val();
    var cobrado = 0;

    if($("#cobrado").is(':checked')){
        cobrado = 1;
    }

    let datos = {
        nombre: nombre,
        descripcion: desc,
        total: total,
        cobrado: cobrado

    }
    
    console.log(datos);

    $.ajax({
        url: 'ajax/nueva-venta-oficina.php',
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
                    location.href="mis-ventas-oficina.php";
                }, 5000);
                Swal.fire({
                    icon: 'success',
                    title: 'Éxito',
                    text: json_mensaje.mensaje
                }) 
                .then((ok) => {
                    if (ok) {
                        location.href="mis-ventas-oficina.php";
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