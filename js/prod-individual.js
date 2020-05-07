var productoJson;
$(document).ready(function() {
    $.ajax({
        url: 'ajax/info-prod-ind.php',
        data: { id: prod },
        type: 'GET',
        success: function(respuesta) {
            var json_mensaje = JSON.parse(respuesta);
            console.log(codigoPais);
            
            if (codigoPais !== 'MX') {
                json_mensaje.precio = json_mensaje.precio_usd; 
            }else{
                json_mensaje.precio = json_mensaje.precio_mxn;
            }
            console.log(json_mensaje);
            productoJson = json_mensaje;
        },
        error: function(er) {
            var json_mensaje = JSON.parse(er.responseText);
            console.log(json_mensaje);
            Swal.fire({
                icon: 'error',
                title: 'Oops...',
                text: json_mensaje.mensaje
            })
        }
    });
});

function agregar() {
    var carrito = localStorage.getItem('carrito');
    var cant = $('#cantidad').val();
    console.log(cant);
    
    console.log(productoJson);

    productoJson.cant = cant;
    var carritoTemporal = [];
    if (carrito == null || carrito == "" || carrito == undefined) {
        carritoTemporal.push(productoJson);
        Swal.fire({
            icon: 'success',
            title: 'Éxito',
            text: 'Producto agregado a tu carrito'
        });
    } else {
        var badera = true;
        carritoTemporal = JSON.parse(carrito);
        carritoTemporal.forEach(item => {
            if (item.id == productoJson.id) {
                badera = false;
            }
        });
        if (badera) {
            carritoTemporal.push(productoJson);
            Swal.fire({
                icon: 'success',
                title: 'Éxito',
                text: 'Producto agregado a tu carrito'
            });
        } else {
            Swal.fire({
                icon: 'warning',
                title: 'Advertencia',
                text: 'El producto seleccionado ya existe en tu carrito'
            });
        }
    }

    localStorage.setItem('carrito', JSON.stringify(carritoTemporal));
}