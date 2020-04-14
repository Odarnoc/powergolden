var deviceSessionId = "";
var total;
var nombre;
var apellidos;
var correo;
var telefono;
var id = 0;
var idusuario = 0;

function datosuser() {
    $.ajax({
        url: "ajax/getdatos.php",
        type: "post",
        data: { id: iduser },
        success: function (respuesta) {
            var json_mensaje = JSON.parse(respuesta);
            id = json_mensaje['id'];
            nombre = json_mensaje['nombre'];
            apellidos = json_mensaje['apellidos'];
            correo = json_mensaje['correo'];
            telefono = json_mensaje['telefono'];
            iduse = json_mensaje['id'];
        },
    });
}

function referencia() {
    $.ajax({
        url: 'ajax/pago-referencia-ecomerce.php',
        type: "post",
        data: {
            carrito: JSON.parse(JSON.parse(localStorage.getItem('carrito-oficina')).carrito),
            usuariid: id,
            nombre: nombre,
            apellido: apellidos,
            telefono: telefono,
            correo: correo,
            total: localStorage.getItem('totalgen'),
        },
        success(data) {
            console.log(data);
            swal.close();
            var datajson = JSON.parse(data)
            window.open(datajson.url_recibo);
            //localStorage.clear();
            //location.href = "oficina-virtual.php";
        },
    });
}