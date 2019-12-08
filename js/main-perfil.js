$(".btn-editar-perfil").click(function () {

  var input = $(".form-perfil .form-group .input-form-underline"),
    btn = $("#btn-guardar-perfil");

  if (input.attr("disabled")) {
    input.prop('disabled', false);
    btn.prop('disabled', false);

  } else {
    input.prop('disabled', true);
    btn.prop('disabled', true);
  }
  

});
