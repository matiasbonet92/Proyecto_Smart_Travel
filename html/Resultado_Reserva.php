<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
    <link rel="stylesheet" type="text/css" href="../css/bootstrap.css">
  	<title>SMART TRAVEL - Reserva</title>
  	<link rel="icon" type="image/png" href="../media/logo.png">
  </head>
  <body style="background-image: url('../media/back.jpg');background-repeat: no-repeat;background-attachment: fixed;background-size: cover;">

    <?php require('../html/Header.php'); ?>

  	<div class="body">
      <nav class="navbar navbar-expand-lg navbar-dark bg-primary">
  		<h1 style="color:white"><?= $this->mensaje ?></h1>
      </nav>
      <nav class="navbar navbar-expand-lg navbar-dark bg-primary">
      <button type="button" class="btn btn-secondary my-2 my-sm-0" name="button">
        <a class="navbar-brand" href="../controllers/principal.php">Volver a Principal</a>
      </button>
      </nav>
  	</div>

  	<?php require('../html/Footer.php'); ?>

  </body>
</html>
