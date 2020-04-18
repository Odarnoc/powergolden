$(document).ready(function() {
    $.ajax({
        url: 'ajax/grafica-oficina.php',
        data: {},
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
                grafica4(json_mensaje, 'Compras');
                $.ajax({
                    url: 'ajax/grafica-oficina-ventas.php',
                    data: {},
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
                            grafica1(json_mensaje, 'Ventas');
                            $.ajax({
                                url: 'ajax/grafica-oficina-puntos.php',
                                data: {},
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
                                        grafica2(json_mensaje, 'Puntos');
                                        $.ajax({
                                            url: 'ajax/grafica-oficina-afiliados.php',
                                            data: {},
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
                                                    grafica3(json_mensaje, 'Mis afiliados');
                                                }
                                            },
                                    
                                            error: function(er) {
                                    
                                                var json_mensaje = JSON.parse(er.responseText);
                                                console.log(json_mensaje);
                                    
                                                wal.fire({
                                                    icon: 'error',
                                                    title: 'Oops...',
                                                    text: json_mensaje.mensaje
                                                });
                                            }
                                        });
                                    }
                                },
                        
                                error: function(er) {
                        
                                    var json_mensaje = JSON.parse(er.responseText);
                                    console.log(json_mensaje);
                        
                                    wal.fire({
                                        icon: 'error',
                                        title: 'Oops...',
                                        text: json_mensaje.mensaje
                                    });
                                }
                            });
                        }
                    },
            
                    error: function(er) {
            
                        var json_mensaje = JSON.parse(er.responseText);
                        console.log(json_mensaje);
            
                        wal.fire({
                            icon: 'error',
                            title: 'Oops...',
                            text: json_mensaje.mensaje
                        });
                    }
                });
            }
        },

        error: function(er) {

            var json_mensaje = JSON.parse(er.responseText);
            console.log(json_mensaje);

            wal.fire({
                icon: 'error',
                title: 'Oops...',
                text: json_mensaje.mensaje
            });
        }
    });

});

function grafica1(params, titulo_grafica) {
    var ctx = document.getElementById('chart-importe').getContext('2d');
    var myChart = new Chart(ctx, {
        type: 'line',
        data: {
            datasets: [{
                label: titulo_grafica,
                data: params.cants,
                fill: false,
                borderColor: 'rgba(54, 162, 235, 0.2)',
                backgroundColor: [
                'rgba(54, 162, 235, 1)',
                'rgba(54, 162, 235, 1)',
                'rgba(54, 162, 235, 1)',
                'rgba(54, 162, 235, 1)',
                'rgba(54, 162, 235, 1)',
                'rgba(54, 162, 235, 1)'
                ]
                
            }],
            labels: params.labels
        },
        options: {

            legend: {
                display: false
            },
            scales: {
                yAxes: [{
                    ticks: {
                        suggestedMin: 50,
                        suggestedMax: 100
                    }
                }]
            }
        }
    });
}

function grafica2(params, titulo_grafica) {
    var ctx = document.getElementById('chart-puntos').getContext('2d');
    var myChart = new Chart(ctx, {
        type: 'line',
        data: {
            datasets: [{
                label: titulo_grafica,
                data: params.cants,
                fill: false,
                borderColor: 'rgba(54, 162, 235, 0.2)',
                backgroundColor: [
                'rgba(54, 162, 235, 1)',
                'rgba(54, 162, 235, 1)',
                'rgba(54, 162, 235, 1)',
                'rgba(54, 162, 235, 1)',
                'rgba(54, 162, 235, 1)',
                'rgba(54, 162, 235, 1)'
                ]
                
            }],
            labels: params.labels
        },
        options: {

            legend: {
                display: false
            },
            scales: {
                yAxes: [{
                    ticks: {
                        suggestedMin: 50,
                        suggestedMax: 100
                    }
                }]
            }
        }
    });
}

function grafica3(params, titulo_grafica) {
    var ctx = document.getElementById('chart-bonificaciones').getContext('2d');
    var myChart = new Chart(ctx, {
        type: 'line',
        data: {
            datasets: [{
                label: titulo_grafica,
                data: params.cants,
                fill: false,
                borderColor: 'rgba(54, 162, 235, 0.2)',
                backgroundColor: [
                'rgba(54, 162, 235, 1)',
                'rgba(54, 162, 235, 1)',
                'rgba(54, 162, 235, 1)',
                'rgba(54, 162, 235, 1)',
                'rgba(54, 162, 235, 1)',
                'rgba(54, 162, 235, 1)'
                ]
                
            }],
            labels: params.labels
        },
        options: {

            legend: {
                display: false
            },
            scales: {
                yAxes: [{
                    ticks: {
                        suggestedMin: 50,
                        suggestedMax: 100
                    }
                }]
            }
        }
    });
}

function grafica4(params, titulo_grafica) {
    var ctx = document.getElementById('chart-febrero').getContext('2d');
    var myChart = new Chart(ctx, {
        type: 'line',
        data: {
            datasets: [{
                label: titulo_grafica,
                data: params.cants,
                fill: false,
                borderColor: 'rgba(54, 162, 235, 0.2)',
                backgroundColor: [
                'rgba(54, 162, 235, 1)',
                'rgba(54, 162, 235, 1)',
                'rgba(54, 162, 235, 1)',
                'rgba(54, 162, 235, 1)',
                'rgba(54, 162, 235, 1)',
                'rgba(54, 162, 235, 1)'
                ]
                
            }],
            labels: params.labels
        },
        options: {

            legend: {
                display: false
            },
            scales: {
                yAxes: [{
                    ticks: {
                        suggestedMin: 50,
                        suggestedMax: 100
                    }
                }]
            }
        }
    });
}