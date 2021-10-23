<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <title>informacion vuelo</title>
  </head>
  <body>

    <?php require ('../html/HeaderLoginRegister.php'); ?>

    <div class="body">
      <h2>Informacion del vuelo</h2>
      <?php foreach($this->datos_vuelo as $datos) { ?>

        <h3>Empresa:</h3>
        <p>El vuelo <?= $datos['nombre_vuelo'] ?> es operado por <?= $datos['nombre_empresa'] ?></p>
        <h3>Origen y Destino:</h3>
        <p>Partiendo desde <?= $datos['origen'] ?> el <?= $datos['fecha_origen'] ?> y arribando a <?= $datos['destino'] ?> el <?= $datos['fecha_destino'] ?></p>
        <h3>Precio:</h3>
        <p>Precio final <?= $datos['precio'] ?></p>
        <h3>Aclaraciones Generales:</h3>
        <p><?= $datos['descripcion_vuelo'] ?></p>
        <p>Por dudas, favor de comunicarse al mail de la empresa: <?= $datos['contacto'] ?></p>
        <br><br><button type="button" name="button">
          <a href="../controllers/reserva.php?id_vuelo=<?= $datos['id_vuelos'] ?>">Reservar</a>
        </button>

      <?php } ?>

      <br><br><button type="button" name="button">
        <a href="../controllers/principal.php">Volver a Principal</a>
      </button>
    </div>

    <?php require ('../html/Footer.php'); ?>

  </body>
</html>
