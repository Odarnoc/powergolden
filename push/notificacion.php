<!DOCTYPE html>
<html lang="en">
<head>
  <title>Enviar Notificacion Push</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
</head>
<body>

<div class="container">
  <h2>Crear nueva notificacion</h2>
  <form class="form-horizontal" action="push.php">
    <div class="form-group">
      <label class="control-label col-sm-2" for="titulo">Titulo:</label>
      <div class="col-sm-10">
        <input type="text" class="form-control" id="titulo" placeholder="Introduce titulo" name="titulo" required>
      </div>
    </div>
    <div class="form-group">
      <label class="control-label col-sm-2" for="mensaje">Mensaje:</label>
      <div class="col-sm-10">          
        <textarea class="form-control" id="mensaje" placeholder="Introduce Mensaje" name="mensaje" required></textarea>
      </div>
    </div>
    
    
    <div class="form-group">        
      <div class="col-sm-offset-2 col-sm-10">
        <button type="submit" class="btn btn-default">Enviar</button>
      </div>
    </div>
    
  </form>
</div>

</body>
</html>
