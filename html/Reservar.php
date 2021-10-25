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
  <body>

    <?php require ('../html/Header.php'); ?>

    <div class="body">
      <h2>Tu reserva esta casi finalizada!!</h2>
      <h3>Por favor te pedimos que revises los datos de la reserva</h3>
      <?php foreach($this->datos_vuelo as $datos) { ?>

        <h3>Vuelo:</h3>
        <p><?= $datos['nombre_vuelo'] ?> operado por <?= $datos['nombre_empresa'] ?></p>
        <h3>Origen:</h3>
        <p><?= $datos['origen'] ?> el <?= $datos['fecha_origen'] ?></p>
        <h3>Destino:</h3>
        <p><?= $datos['destino'] ?> el <?= $datos['fecha_destino'] ?></p>
        <h3>Precio:</h3>
        <p>Precio final <?= $datos['precio'] ?></p>
        <form class="" action="../controllers/reserva.php" method="post">
          <label for="cant_pasajeros">Cantidad de Pasajeros:</label>
          <input type="number" name="cant_pasajeros" id="cant_pasajeros" min="1" required>
          <label for="contrato">He leido las condiciones y expreso conformidad:</label>
          <input type="checkbox" name="contrato" id="contrato" required checked>
  				<input type="text" name="id_vuelo" value="<?= $this->id_vuelo ?>" hidden>
  				<input type="text" name="dni" value="<?= $this->dni ?>" hidden>
  				<input type="submit" name="" value="Reservar">
        </form>
        <br><br><button type="button" name="button">
          <a href="../controllers/principal.php">Cancelar Reserva</a>
        </button>

      <?php } ?>
    </div>

    <?php require ('../html/Footer.php'); ?>

  </body>
</html>
