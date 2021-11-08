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
      <div class="row w-auto my-3 mx-5 p-0 border border-2 border-dark rounded">

        <div class="row w-100 p-2 m-0 text-center bg-dark">
          <h2 class="text-white"><strong>Tu reserva esta casi finalizada!</strong></h2>
        </div>

        <div class="row w-100 m-0 p-1 text-center bg-light">

          <h3 class="mt-3"><strong>Por favor, te pedimos que revises los datos del vuelo antes de reservar</strong></h3><hr>

          <?php foreach($this->datos_vuelo as $datos) { ?>

                <div class="row w-100 m-0 p-0 mb-3">
                   <div class="col-6 m-0 p-0">
                     <h4 class="mt-3"><strong>Vuelo:</strong></h4>
                     <p>'<?= $datos['nombre_vuelo'] ?>' operado por '<?= $datos['nombre_empresa'] ?>'</p>
                     <h4 class="mt-3"><strong>Origen:</strong></h4>
                     <p><?= $datos['origen'] ?> partiendo el <?= $datos['fecha_origen'] ?></p>
                   </div>
                   <div class="col-6 m-0 p-0">
                     <h4 class="mt-3"><strong>Destino:</strong></h4>
                     <p><?= $datos['destino'] ?> arribando el <?= $datos['fecha_destino'] ?></p>
                     <h4 class="mt-3"><strong>Precio:</strong></h4>
                     <p>$ <?= $datos['precio'] ?></p>
                   </div>
                </div><hr>

                <form class="" action="../controllers/reserva.php" method="post">
                  <label for="cant_pasajeros"><strong>Cantidad de Pasajeros:</strong></label>
                  <input type="number" min="1" max="200" name="cant_pasajeros" id="cant_pasajeros" min="1" required>
                  <br><br>
                  <label for="contrato"><strong>He leido las condiciones y expreso conformidad:</strong></label>
                  <input type="checkbox" name="contrato" id="contrato" required checked>
          				<input type="text" name="id_vuelo" value="<?= $this->id_vuelo ?>" hidden>
          				<input type="text" name="dni" value="<?= $this->dni ?>" hidden>
                  <br><br>
          				<input type="submit" class="btn btn-success w-25" name="" value="Reservar">
                </form>

                <div class="col">
                  <button type="button" class="btn btn-danger w-25" name="button">
                    <a style="color:white; text-decoration: none;" href="../controllers/principal.php">Cancelar Reserva</a>
                  </button>
                </div>

            <?php } ?>

        </div>

      </div>
    </div>

    <?php require ('../html/Footer.php'); ?>

  </body>
</html>
