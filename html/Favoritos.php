<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
	<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
	<link rel="stylesheet" type="text/css" href="../css/bootstrap.css">
	<title>SMART TRAVEL - Favoritos</title>
	<link rel="icon" type="image/png" href="../media/logo.png">
</head>
<body>

	<?php require('../html/Header.php'); ?>

	<div class="body">
		<nav class="navbar navbar-expand-lg navbar-dark bg-primary">
		<h2 style="color:white">Favoritos</h2>
		<?php if(isset($this->favoritos)) { ?>
			<?php foreach($this->favoritos as $fav) { ?>
				<h3>Destino</h3>
	            <p><?= $fav['destino'] ?></p>
	            <p>Saliendo desde <?= $fav['origen'] ?></p>
	            <p>Precio <?= $fav['precio'] ?></p>
	            <button type="button" name="button">
	              <a href="../controllers/resultado_busqueda.php?origen=<?= $fav['origen'] ?>&destino=<?= $fav['destino'] ?>">Ver mas</a>
	            </button>
	            <button type="button" name="button">
	              <a href="../controllers/misfavoritos.php?dni=<?= $fav['dni'] ?>&id_vuelo=<?= $fav['id_vuelos'] ?>">Eliminar</a>
	            </button>
			<?php } ?>
		<?php }elseif(isset($this->mensaje)){ ?>
			<h2 style="color:white"><?= $this->mensaje ?></h2>
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
