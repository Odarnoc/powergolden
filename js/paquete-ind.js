var productos=[];
var seleccion=[];
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
                productos = json_mensaje;
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
                            '<p class="t1" style="color:'+prod.color+'">Línea '+prod.linea+'</p>';

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
    $("#seleccion").text(seleccion.length);
}

function agregar(index) {
    console.log(index);
    seleccion.push(index);
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
    if(seleccion.length == parseInt(cant)){
        Swal.fire({
            icon: 'success',
            title: 'Éxito',
            text: "Compra realizada"
        });
    }else{
        Swal.fire({
            icon: 'error',
            title: 'Oops...',
            text: "Debes seleccionar "+cant+" productos"
        });
    }
    
}