<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <title>mis viajes</title>
  </head>
  <body>

    <?php require('../html/Header.php'); ?>

  	<div class="body">
  		<h2>Mis Viajes</h2>
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
  		<br><br><button type="button" name="button">
  	      <a href="../controllers/principal.php">Volver a Principal</a>
  	    </button>
  	</div>

  	<?php require('../html/Footer.php'); ?>

  </body>
</html>
