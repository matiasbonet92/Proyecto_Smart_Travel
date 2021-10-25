<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
    <link rel="stylesheet" type="text/css" href="../css/bootstrap.css">
    <title>SMART TRAVEL - Mis Viajes</title>
    <link rel="icon" type="image/png" href="../media/logo.png">
  </head>
  <body>

    <?php require('../html/Header.php'); ?>

    <div class="body">
      <nav class="navbar navbar-expand-lg navbar-dark bg-primary">
  		<h2 style="color:white">Mis Viajes</h2>
  		<?php if(isset($this->reservas)) { ?>
  			<?php foreach($this->reservas as $res) { ?>
  				<h3>Destino:</h3>
          <p>Vuelo con destino a <?= $res['destino'] ?> para <?= $res['cant_pasajeros'] ?> pasajeros</p>
          <p>Saliendo desde <?= $res['origen'] ?> el <?= $res['fecha_origen'] ?></p>
          <p>Precio abonado <?= $res['precio'] ?></p>
          <p>El numero de vuelo es <?= $res['nombre_vuelo'] ?> y es operado por <?= $res['nombre_empresa'] ?></p>
          <p>Ante cualquer duda, favor de comunicarse al: <?= $res['contacto'] ?></p>
          <h4>Consideraciones:</h4>
          <p><?= $res['descripcion_vuelo'] ?></p>
          <br>
          <button type="button" name="button">
    	      <a href="../controllers/misviajes.php?id_reserva=<?= $res['id_reserva'] ?>">Eliminar Reserva</a>
    	    </button>
  			<?php } ?>
  		<?php }elseif(isset($this->mensaje)){ ?>
  			<h2><?= $this->mensaje ?></h2>
  		<?php } ?>
      </nav>
      <nav class="navbar navbar-expand-lg navbar-dark bg-primary">
  		<br><br><button type="button" class="btn btn-secondary my-2 my-sm-0" name="button">
  	      <a class="navbar-brand" href="../controllers/principal.php">Volver a Principal</a>
  	    </button>
        </nav>

  	</div>

  	<?php require('../html/Footer.php'); ?>

  </body>
</html>
