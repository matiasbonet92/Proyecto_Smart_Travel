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
  <body style="background-image: url('../media/back.jpg');background-repeat: no-repeat;background-attachment: fixed;background-size: cover;">

    <?php require('../html/Header.php'); ?>

    <div class="body">
      <nav class="navbar navbar-expand-lg navbar-dark bg-primary">
  		<h2 style="color:white">Mis Viajes</h2>
  	</nav>
      <nav>
  		<?php if(isset($this->reservas)) { ?>
  			<?php foreach($this->reservas as $res) { ?>
          <div style="width:100%">
      		<nav class="navbar navbar-expand-lg navbar-dark bg-primary" style="width:100%">
      		<div class="izq">
  				<h3 style="color:white">Destino:</h3>
          <p style="color:white">Vuelo con destino a: <?= $res['destino'] ?> para '<?= $res['cant_pasajeros'] ?>' pasajeros</p>
          <p style="color:white">Saliendo desde: <?= $res['origen'] ?> el <?= $res['fecha_origen'] ?></p>
          <p style="color:white">Precio abonado: <?= $res['precio'] ?></p>
          <p style="color:white">El numero de vuelo es '<?= $res['nombre_vuelo'] ?>' y es operado por '<?= $res['nombre_empresa'] ?>'</p>
          <p style="font-style:italic; color:white">Ante cualquer duda, favor de comunicarse al: <span style="font-style:normal"><?= $res['contacto'] ?></span></p>
          <h4 style="color:white">Consideraciones:</h4>
          <p style="color:white"><?= $res['descripcion_vuelo'] ?></p>
          <br>
          <button type="button" class="btn btn-secondary my-2 my-sm-0" name="button">
    	      <a class="navbar-brand" href="../controllers/misviajes.php?id_reserva=<?= $res['id_reserva'] ?>">Eliminar Reserva</a>
    	    </button>
        </div>
        </nav>
      </div>
  			<?php } ?>
  		<?php }elseif(isset($this->mensaje)){ ?>
        <div class="alert alert-dismissible alert-warning" style="width:100%">
  		  	<button type="button" class="btn-close" data-bs-dismiss="alert"></button>
  		  	<h4 class="alert-heading">Aviso</h4>
  		  	<p class="mb-0"><?= $this->mensaje ?></p>
  			</div>
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
