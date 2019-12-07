var statusedit = true;

$("#edit_button").click(function () {

  statusedit = !statusedit;

  $("#nombre").prop('disabled',statusedit);
  $("#apellido").prop('disabled',statusedit);
  $("#telefono").prop('disabled',statusedit);
  $("#nacimiento").prop('disabled',statusedit);
  $("#direccion").prop('disabled',statusedit);
  $("#estado").prop('disabled',statusedit);
  $("#ciudad").prop('disabled',statusedit);
  $("#cp").prop('disabled',statusedit);
  $("#btn-guardar-perfil").prop('disabled',statusedit);

});
