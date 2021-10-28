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
      <nav class="navbar navbar-expand-lg navbar-dark bg-primary">
      <h2 style="color:white">Informacion del vuelo</h2>
    </nav>
      <?php foreach($this->datos_vuelo as $datos) { ?>
        <nav class="navbar navbar-expand-lg navbar-dark bg-primary">
          <div class="izq">
        <h3 style="color:white">Empresa:</h3>
        <p style="color:white">El vuelo '<?= $datos['nombre_vuelo'] ?>' es operado por '<?= $datos['nombre_empresa'] ?>'</p>
        <h3 style="color:white">Origen y Destino:</h3>
        <p style="color:white">Partiendo desde <?= $datos['origen'] ?> el <?= $datos['fecha_origen'] ?> y arribando a <?= $datos['destino'] ?> el <?= $datos['fecha_destino'] ?></p>
        <h3 style="color:white">Precio:</h3>
        <p style="color:white">Precio final <?= $datos['precio'] ?></p>
        <h3 style="color:white">Aclaraciones Generales:</h3>
        <p style="color:white"><?= $datos['descripcion_vuelo'] ?></p>
        <br>
        <p style="color:white;font-style:italic">Por dudas, favor de comunicarse al mail de la empresa: <span style="font-style:normal"><?= $datos['contacto'] ?></span> </p> <!-- Es muy util el uso de span -->
        <br><br><button type="button" class="btn btn-secondary my-2 my-sm-0" name="button">
          <a class="navbar-brand" href="../controllers/reserva.php?id_vuelo=<?= $datos['id_vuelos'] ?>">Reservar</a>
        </button>


      <?php } ?>

      <br><br><br><button type="button" class="btn btn-secondary my-2 my-sm-0" name="button">
        <a class="navbar-brand" href="../controllers/principal.php">Volver a Principal</a>
      </button>
    </div>
    </nav>
    </div>

    <?php require ('../html/Footer.php'); ?>

  </body>
</html>
