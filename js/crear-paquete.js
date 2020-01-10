/* var  html;

$( document ).ready(function() {
    $.ajax({
        url: 'ajax/informacion-productos.php',
        type: 'GET',
        dataType: "json",
        success: function(respuesta) {
            console.log(respuesta);
            var opciones = "";
            respuesta.forEach(item => {
                opciones +=  '<option value="'+item.id+'">'+item.nombre+'</option>'; 
            });
            html = '<div class="form-group">'+
                        '<div class="floating-label-group">'+
                            '<select name="select" class="form-control input-form-underline" required>'+
                                '<option hidden>Seleccionar producto</option>'+
                                opciones+          
                            '</select>'+
                        '</div>'+
                    '</div>';
        }
    });
    
}); */
var sel;

function productos(){
    $("#select").append(html);
}

function enviarpaquete(){
    var nombre = $("#nombre").val();
    var descripcion = $("#descripcion").val();
    var precio = $("#precio").val();
    var cantidad = $("#cantidad").val();

    let datos = {
        name: nombre,
        description: descripcion,
        price: precio,
        prod: cantidad
    }
    
    console.log(datos);

    $.ajax({
        url: 'ajax/nuevo-paquete.php',
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
    
    $.ajax({
        url: 'ajax/eliminar-paquete.php',
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