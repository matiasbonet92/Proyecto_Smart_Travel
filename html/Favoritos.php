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
<body style="background-image: url('../media/back.jpg');background-repeat: no-repeat;background-attachment: fixed;background-size: cover;">

	<?php require('../html/Header.php'); ?>

	<div class="body">
		<nav class="navbar navbar-expand-lg navbar-dark bg-primary">
		<h2 style="color:white">Favoritos</h2>
	</nav>
		<nav>
		<?php if(isset($this->favoritos)) { ?>
			<?php foreach($this->favoritos as $fav) { ?>
				<div style="width:100%">
				<nav class="navbar navbar-expand-lg navbar-dark bg-primary" style="width:100%">
				<div class="izq">
				<h3 style="color:white">Destino</h3>
	            <p style="color:white"><?= $fav['destino'] ?></p>
	            <p style="color:white">Saliendo desde: <?= $fav['origen'] ?></p>
	            <p style="color:white">Precio: <?= $fav['precio'] ?></p>
	            <button type="button" class="btn btn-secondary my-2 my-sm-0" name="button">
	              <a class="navbar-brand" href="../controllers/resultado_busqueda.php?origen=<?= $fav['origen'] ?>&destino=<?= $fav['destino'] ?>">Ver mas</a>
	            </button>
	            <button type="button" class="btn btn-secondary my-2 my-sm-0" name="button">
	              <a class="navbar-brand" href="../controllers/misfavoritos.php?dni=<?= $fav['dni'] ?>&id_vuelo=<?= $fav['id_vuelos'] ?>">Eliminar</a>
	            </button>
						</div>
						</nav>
					</div>
			<?php } ?>
		<?php }elseif(isset($this->mensaje)){ ?>
			<div class="alert alert-dismissible alert-warning" style="width:100%">
		  	<button type="button" id="BTN" class="btn-close" data-bs-dismiss="alert"></button>
		  	<h4 class="alert-heading">Aviso</h4>
		  	<p class="mb-0"><?= $this->mensaje ?></p>
			</div>
			<script type="text/javascript">
			setTimeout(() => { document.getElementById("BTN").click(); }, 5000);
			</script>
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
