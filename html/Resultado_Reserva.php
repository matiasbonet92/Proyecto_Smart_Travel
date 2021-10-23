<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <title>resultado de la reserva</title>
  </head>
  <body>

    <?php require('../html/Header.php'); ?>

  	<div class="body">
  		<h1><?= $this->mensaje ?></h1>
      <button type="button" name="button">
        <a href="../controllers/principal.php">Volver a Principal</a>
      </button>
  	</div>

  	<?php require('../html/Footer.php'); ?>

  </body>
</html>
