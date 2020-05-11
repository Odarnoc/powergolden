$(document).ready(function() {
    $.ajax({
        url: "ajax/sucursales-con-inventario.php",
        type: "post",
        data: { carrito: JSON.parse(localStorage.getItem('carrito-oficina')).carrito },

        success: function(respuesta) {
            var json_mensaje = JSON.parse(respuesta);
            console.log(json_mensaje);
            json_mensaje.forEach(function(item, index) {
                $('#sucursal').append(`<option value="${item.id}"> ${item.nombre+", "+item.estado} </option>`); 
            });
            
        },
    });
});

function datosDireccion() {
    var dir = $("#direccion").val();
    var cp = $("#cp").val();
    var col = $("#colo").val();
    var mun = $("#muni").val();
    var est = $("#estado").val();

    localStorage.setItem('direccion', dir);
    localStorage.setItem('codigop', cp);
    localStorage.setItem('colonia', col);
    localStorage.setItem('municipio', mun);
    localStorage.setItem('estado', est);
    localStorage.setItem('sucursal_id', 0);

    location.href = "resumen-oficina.php"

}

function boxdomi() {

    var local = document.getElementById("domicilio");

    if (local.checked == true) {
        document.getElementById("particular").style.display = "block";
        document.getElementById("contlocal").style.display = "none";
    } else {
        document.getElementById("particular").style.display = "none";
        document.getElementById("contlocal").style.display = "block";
    }
}

function boxlocal() {

    var local = document.getElementById("local");

    if (local.checked == true) {
        document.getElementById("dlocal").style.display = "block";
        document.getElementById("contdomi").style.display = "none";
    } else {
        document.getElementById("dlocal").style.display = "none";
        document.getElementById("contdomi").style.display = "block";
    }
}

function datosDireccionlocal() {
    var idsuc = $("#sucursal option:selected").val();
    console.log(idsuc);

    $.ajax({
        url: "ajax/direccion-sucursal.php",
        type: "post",
        data: { id: idsuc, carrito: JSON.parse(localStorage.getItem('carrito-oficina')).carrito },

        success: function(respuesta) {
            var json_mensaje = JSON.parse(respuesta);
            if (json_mensaje.error != undefined) {
                Swal.fire({
                    icon: 'error',
                    title: 'Oops...',
                    text: json_mensaje.mensaje
                });
            } else {
                var json_mensaje = JSON.parse(respuesta);
                console.log(json_mensaje);
                localStorage.setItem('direccion', json_mensaje['direccion']);
                localStorage.setItem('codigop', json_mensaje['codigo']);
                localStorage.setItem('colonia', json_mensaje['colonia']);
                localStorage.setItem('municipio', json_mensaje['ciudad']);
                localStorage.setItem('estado', json_mensaje['estado']);
                localStorage.setItem('sucursal_id', idsuc);

                location.href = "resumen-oficina.php";
            }
        },
    });
}