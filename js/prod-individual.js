function agregar() {
    var carrito = localStorage.getItem('carrito');
    var cant = $('#cantidad').val();
    var productoJson = JSON.parse(prod);
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