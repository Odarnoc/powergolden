$("#form-producto").submit(function(e) {
    e.preventDefault();
    var formData = new FormData(this);
    formData.append('accionproducto','editar')
    $.ajax({
        url: 'ajax/editar-producto.php',
        type: 'POST',
        data: formData,
        success: function(data) {
            if (data) {
                Swal.fire({
                    icon: 'success',
                    title: 'Éxito',
                    text: "El producto ha sido registrado!"
                });
            }
            $('#form-producto').trigger("reset");
        },
        cache: false,
        contentType: false,
        processData: false
    });
});