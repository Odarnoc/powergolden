$(document).ready(function() {
    $("#buscar").click(function(event) {
        event.preventDefault();
        buscar();
    });
});

function buscar(){
    fecha();
}


function fecha(){
    var fecha = $("#datein").val();
    console.log(fecha);
}