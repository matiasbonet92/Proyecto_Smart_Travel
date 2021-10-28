<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
    <link rel="stylesheet" type="text/css" href="../css/bootstrap.css">
  	<title>SMART TRAVEL - Finalizar Reserva</title>
  	<link rel="icon" type="image/png" href="../media/logo.png">
  </head>
  <body style="background-image: url('../media/back.jpg');background-repeat: no-repeat;background-attachment: fixed;background-size: cover;">

    <?php require ('../html/Header.php'); ?>

    <div class="body">
      <nav class="navbar navbar-expand-lg navbar-dark bg-primary">
      <h2 style="color:white">Tu reserva esta casi finalizada!!</h2>
    </nav>
    <div style="display:flex">
		<nav class="navbar navbar-expand-lg navbar-dark bg-primary" style="width:100%">
		<div class="izq">
      <h3 style="color:white">Por favor te pedimos que revises los datos de la reserva</h3><br>
      <?php foreach($this->datos_vuelo as $datos) { ?>

        <h3 style="color:white">Vuelo:</h3>
        <p style="color:white">'<?= $datos['nombre_vuelo'] ?>' operado por '<?= $datos['nombre_empresa'] ?>'</p>
        <h3 style="color:white">Origen:</h3>
        <p style="color:white"><?= $datos['origen'] ?> el <?= $datos['fecha_origen'] ?></p>
        <h3 style="color:white">Destino:</h3>
        <p style="color:white"><?= $datos['destino'] ?> el <?= $datos['fecha_destino'] ?></p>
        <h3 style="color:white">Precio:</h3>
        <p style="color:white">Precio final: <?= $datos['precio'] ?></p>
        <form class="" action="../controllers/reserva.php" method="post">
          <label for="cant_pasajeros" style="color:white">Cantidad de Pasajeros:</label>
          <input type="number" min="1" max="200" name="cant_pasajeros" id="cant_pasajeros" min="1" required>
          <br><br>
          <label for="contrato" style="color:white">He leido las condiciones y expreso conformidad:</label>
          <input type="checkbox" name="contrato" id="contrato" required checked>
  				<input type="text" name="id_vuelo" value="<?= $this->id_vuelo ?>" hidden>
  				<input type="text" name="dni" value="<?= $this->dni ?>" hidden>
          <br><br>
  				<input type="submit" name="" value="Reservar">
        </form>
        <br><br><button type="button" class="btn btn-secondary my-2 my-sm-0" name="button">
          <a class="navbar-brand" href="../controllers/principal.php">Cancelar Reserva</a>
        </button>
      </div>
    </nav>
  </div>

      <?php } ?>
    </div>

    <?php require ('../html/Footer.php'); ?>

  </body>
</html>
