var sucursalSelected = 0;
function selectSucursal(id){
    sucursalSelected= id;
}

function clonar(){
    var clonarSuc = $("#clonarSuc").val();

    let datos = {
        sucursal: sucursalSelected,
        sucursal_clonar: clonarSuc,
    }
    
    console.log(datos);

    $.ajax({
        url: 'ajax/clonar-inventario.php',
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

function tranferir(){
    var sucursalTranferir = $("#sucursalTranferir").val();
    var productoTranferir = $("#productoTranferir").val();
    var cantidadTranferir = $("#cantidadTranferir").val();

    let datos = {
        sucursal: sucursalSelected,
        sucursal_clonar: sucursalTranferir,
        producto:productoTranferir,
        cantidad:cantidadTranferir
    }
    
    console.log(datos);

    $.ajax({
        url: 'ajax/tranferir-inventario.php',
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