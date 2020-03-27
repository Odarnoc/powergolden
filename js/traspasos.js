var productos=[];
var seleccion=[];
$(document).ready(function() {
    $.ajax({
        url: 'ajax/lista-almacen.php',
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
                            '<p class="t1">Existencias: '+prod.existencia+'</p>'+
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
                                    prodSelectsCants+=1;
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

function comprar() {
    if(seleccion.length > 0){

        var lista = [];

        seleccion.forEach(function(prod) {
            lista.push(productos[prod]);
        });

        

        $.ajax({
            url: 'ajax/tranferir-inventario.php',
            data: {productos: lista, sucursal:sucursal},
            type: 'POST',
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
            text: "Debes seleccionar al menos 1 producto"
        });
    }
    
}