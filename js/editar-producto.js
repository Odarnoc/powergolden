var select;

$("#form-producto").submit(function(e) {
    e.preventDefault();
    var formData = new FormData(this);
    formData.append('accionproducto','editar')
    $.ajax({
        url: 'ajax/editar-producto.php',
        type: 'POST',
        data: formData,
        success: function(data) {
            if (data) {
                Swal.fire({
                    icon: 'success',
                    title: 'Éxito',
                    text: "El producto ha sido registrado!"
                });
            }
            $('#form-producto').trigger("reset");
        },
        cache: false,
        contentType: false,
        processData: false
    });
});

function eliminar(id){
    select = id;

}


function confirmar(){
console.log(select);

$.ajax({
    url: 'ajax/eliminar-producto.php',
    data: {id_producto:select},
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