var productos=[];
var paquetes=[];
var seleccionPaquetes=[];
var seleccion=[];
cantProdxPacks = 0;
cantProdSelected = 0;
$(document).ready(function() {
    $.ajax({
        url: 'ajax/lista-productos.php',
        data: {busqueda:''},
        type: 'GET',
        success: function(respuesta) {
            var json_mensaje = JSON.parse(respuesta);
            console.log(json_mensaje);
            if (json_mensaje.error != undefined) {
                Swal.fire({
                    icon: 'error',
                    title: 'Oops...',
                    text: json_mensaje.mensaje
                });
            } else {
                json_mensaje.forEach(function(prod,index) {
                    prod.cant = 1;
                    productos.push(prod)
                });
                $.ajax({
                    url: 'ajax/lista-paquetes.php',
                    data: {busqueda:''},
                    type: 'GET',
                    success: function(respuesta) {
                        var json_mensaje = JSON.parse(respuesta);
                        console.log(json_mensaje);
                        if (json_mensaje.error != undefined) {
                            Swal.fire({
                                icon: 'error',
                                title: 'Oops...',
                                text: json_mensaje.mensaje
                            });
                        } else {
                            json_mensaje.forEach(function(prod,index) {
                                prod.cant = 1;
                                paquetes.push(prod)
                            });
                            pintarPacks();
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
                pintarProds();
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

});

function pintarProds() {
    var prodSelectsCants = 0;
    $("#lista-productos").empty();
    var html="";
    productos.forEach(function(prod,index) {
        
        html+=  '<div class="col-lg-4 d-all-item-pro">'+
                    '<div class="d-item-pro h-100" style="padding-bottom: 1rem;">'+
                    '<div class="row">'+
                        '<div class="col-lg-5 col-md-5 col-5">'+
                        '<div class="d-img-pro">'+
                            '<img src="productos_img/'+prod.imagen+'" alt="">'+
                    ' </div>'+
                        '</div>'+
                        '<div class="col-lg-7 col-md-7 col-7">'+
                        '<div class="d-info-pro">'+
                            '<p class="t2">'+prod.nombre+'</p>'+
                            '<p class="t1" style="color:'+prod.color+'">Línea '+prod.linea+'</p>'+
                            '<br><input type="number" id="'+index+'input" onchange="modificarCantidad('+index+')" class="form-control input-cant-pos" value="'+prod.cant+'" min="1" max="500" step="1">';

                            if(seleccion.length == 0){
                                html+='<a class="btn btn-blue mt-3" style="background-color:49B7F3;margin-right: 6px;" onclick="agregar('+index+')" role="button"><i style="color:white;" class="fas fa-check"></i></a>';
                            }else{
                                var con = 0;
                                seleccion.forEach(function(sel) {
                                    if(parseInt(index) == parseInt(sel)){
                                        con++;
                                    }
                                });
                                if(con == 0){
                                    html+='<a class="btn btn-blue mt-3" style="background-color:49B7F3;margin-right: 6px;" onclick="agregar('+index+')" role="button"><i style="color:white;" class="fas fa-check"></i></a>';
                                }else{
                                    prodSelectsCants+=parseInt(prod.cant);
                                    html+='<a class="btn btn-blue mt-3" style="background-color:red;" onclick="eliminar('+index+')" role="button"><i style="color:white;" class="fas fa-times"></i></a>';
                                }
                            }

            html+=          '</div>'+
                        '</div>'+
                    '</div>'+
                    '</div>'+
                '</div>';
    });
    
    $("#lista-productos").append(html);
    $("#seleccion").text(parseInt(prodSelectsCants));
    cantProdSelected = prodSelectsCants;
}
function pintarPacks() {
    var prodSelectsCants = 0;
    $("#lista-packs").empty();
    var html="";
    paquetes.forEach(function(prod,index) {
        
        html+=  '<div class="col-lg-6 d-all-item-pro">'+
                    '<div class="d-item-pro h-100" style="padding-bottom: 1rem;">'+
                    '<div class="row">'+
                        '<div class="col-lg-5 col-md-5 col-5">'+
                        '<div class="d-img-pro">'+
                            '<img src="images/paquetes/'+prod.imagen+'" alt="">'+
                    ' </div>'+
                        '</div>'+
                        '<div class="col-lg-7 col-md-7 col-7">'+
                        '<div class="d-info-pro">'+
                            '<p class="t2">'+prod.nombre+'</p>'+
                            '<p class="t1">$'+prod.precio+'</p>'+
                            '<br><input type="number" id="'+index+'packinput" onchange="modificarCantidadPack('+index+')" class="form-control input-cant-pos" value="'+prod.cant+'" min="1" max="500" step="1">';

                            if(seleccionPaquetes.length == 0){
                                html+='<a class="btn btn-blue mt-3" style="background-color:49B7F3;margin-right: 6px;" onclick="agregarPack('+index+')" role="button"><i style="color:white;" class="fas fa-check"></i></a>';
                            }else{
                                var con = 0;
                                seleccionPaquetes.forEach(function(sel) {
                                    if(parseInt(index) == parseInt(sel)){
                                        con++;
                                    }
                                });
                                if(con == 0){
                                    html+='<a class="btn btn-blue mt-3" style="background-color:49B7F3;margin-right: 6px;" onclick="agregarPack('+index+')" role="button"><i style="color:white;" class="fas fa-check"></i></a>';
                                }else{
                                    prodSelectsCants+=(parseInt(prod.productos)*parseInt(prod.cant));
                                    html+='<a class="btn btn-blue mt-3" style="background-color:red;" onclick="eliminarPack('+index+')" role="button"><i style="color:white;" class="fas fa-times"></i></a>';
                                }
                            }

            html+=          '</div>'+
                        '</div>'+
                    '</div>'+
                    '</div>'+
                '</div>';
    });
    
    $("#lista-packs").append(html);
    $("#prodxpacks").text(parseInt(prodSelectsCants));
    cantProdxPacks = parseInt(prodSelectsCants);
}

function agregar(index) {
    console.log(index);
    seleccion.push(index);
    pintarProds()
}

function modificarCantidad(index) {
    console.log(index);
    productos[index].cant = parseInt($('#'+index+'input').val());
    pintarProds()
}

function eliminar(index) {
    var temp=[];
    seleccion.forEach(function(sel) {
        if(parseInt(index) == parseInt(sel)){
        }else{
            temp.push(sel);
        }
    });

    seleccion = temp;
    pintarProds()
}

function agregarPack(index) {
    console.log(index);
    seleccionPaquetes.push(index);
    pintarPacks()
}

function modificarCantidadPack(index) {
    console.log(index);
    paquetes[index].cant = parseInt($('#'+index+'packinput').val());
    pintarPacks()
}

function eliminarPack(index) {
    var temp=[];
    seleccionPaquetes.forEach(function(sel) {
        if(parseInt(index) == parseInt(sel)){
        }else{
            temp.push(sel);
        }
    });

    seleccionPaquetes = temp;
    pintarPacks()
}

function comprar() {

    if(seleccionPaquetes.length>0){
        if(cantProdSelected == cantProdxPacks){
            let compra = {
                carrito: [],
                paquetes: []
            }
            seleccion.forEach(function(sel) {
                compra.carrito.push(productos[sel]);
            });

            seleccionPaquetes.forEach(function(sel) {
                compra.paquetes.push(paquetes[sel]);
            });

            console.log(compra);

            localStorage.setItem('carrito-oficina', JSON.stringify(compra));

            location.href = 'nuevo-envio-oficina.php';
            
            
        }else{
            Swal.fire({
                icon: 'error',
                title: 'Oops...',
                text: "Debes seleccionar "+cantProdxPacks+" productos"
            });
        }
    }else{
        Swal.fire({
            icon: 'error',
            title: 'Oops...',
            text: "Debes almenos un paquete"
        });
    }
}