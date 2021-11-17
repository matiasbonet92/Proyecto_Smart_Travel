<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
    <link rel="stylesheet" type="text/css" href="../css/bootstrap.css">
    <title>SMART TRAVEL - Informacion de vuelo</title>
    <link rel="icon" type="image/png" href="../media/logo.png">
  </head>
  <body style="background-image: url('../media/back.jpg');background-repeat: no-repeat;background-attachment: fixed;background-size: cover;">

    <?php require ('../html/Header.php'); ?>

    <div class="body">
      <div class="row w-auto my-3 mx-5 p-0 border border-2 border-dark rounded">

        <div class="row w-100 p-2 m-0 text-center bg-dark">
          <h2 class="text-white"><strong>Informacion del Vuelo</strong></h2>
        </div>

        <div class="row w-100 m-0 p-1 text-center bg-light">

          <?php foreach($this->datos_vuelo as $datos) { ?>
                <h4 class="mt-3"><strong>Descripcion general del vuelo:</strong></h4>
                <p>
                  El vuelo '<?= htmlentities($datos['nombre_vuelo']) ?>' es operado por '<?= htmlentities($datos['nombre_empresa']) ?>'.
                  Partiendo desde <?= htmlentities($datos['origen']) ?> el <?= htmlentities($datos['fecha_origen']) ?> y arribando a <?= htmlentities($datos['destino']) ?> el <?= htmlentities($datos['fecha_destino']) ?>.
                </p>
                <h4 class="my-3"><strong>Precio Final: $</strong><?= htmlentities($datos['precio']) ?></h4><hr>
                <h4 class="mt-3"><strong>Aclaraciones generales:</strong></h4>
                <p><?= htmlentities($datos['descripcion_vuelo']) ?></p><hr>
                <p  class="mt-3" style="font-style:italic">Por dudas, favor de comunicarse al mail de la empresa: <span style="font-style:normal"><?= htmlentities($datos['contacto']) ?></span> </p> <!-- Es muy util el uso de span -->
                <div class="row w-100 my-3 p-2">
                  <div class="col-3 p-0 m-0"></div>
                  <div class="col-3 p-0 m-0">
                    <button type="button" class="btn btn-success" name="button">
                      <a style="text-decoration:none; color:white;" href="../controllers/reserva.php?id_vuelo=<?= htmlentities($datos['id_vuelos']) ?>">Reservar</a>
                    </button>
                  </div>
                  <div class="col-3 p-0 m-0">
                    <button type="button" class="btn btn-danger" name="button">
                      <a style="text-decoration:none; color:white;" href="../controllers/principal.php">Volver a buscar</a>
                    </button>
                  </div>
                  <div class="col-3 p-0 m-0"></div>
                </div>
            <?php } ?>

        </div>

      </div>
    </div>

    <?php require ('../html/Footer.php'); ?>

  </body>
</html>
