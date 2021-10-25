<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
	<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
	<link rel="stylesheet" type="text/css" href="../css/bootstrap.css">
	<title>SMART TRAVEL - Mi Perfil</title>
	<link rel="icon" type="image/png" href="../media/logo.png">
</head>
<body>

	<?php require('../html/Header.php');  ?>

	<div class="body" style="display:flex">
		<?php if ($this->mensaje) { ?>
			<h2><?= $this->mensaje ?></h2>
		<?php } ?>
		<nav class="navbar navbar-expand-lg navbar-dark bg-primary" style="width:50%">
		<div class="izq">
			<h2 style="color:white">Datos Actuales del Usuario:</h2>
			<p style="color:white">Nombre: <?= $this->nombre ?></p>
			<p style="color:white">Apellido: <?= $this->apellido ?></p>
			<p style="color:white">Mail: <?= $this->mail ?></p>
			<?php if($this->dni > 0){ ?>
				<p style="color:white">Dni: <?= $this->dni ?></p>
			<?php } ?>
			<p style="color:white">Direccion: <?= $this->direccion ?></p>
			<p style="color:white">Telefono: <?= $this->telefono ?></p>
			<button type="button" class="btn btn-secondary my-2 my-sm-0" name="button">
		      <a class="navbar-brand" href="../controllers/principal.php">Volver a Principal</a>
		    </button>
		</div>
		</nav>
		<nav class="navbar navbar-expand-lg navbar-dark bg-primary" style="width:50%">
		<div class="der">
			<h2 style="color:white">Modificacion de los datos:</h2>
			<form action="../controllers/perfil.php" method="post">
				<label for="nombre" style="width:25%;color:white">Nombre:</label>
				<input type="text" name="nombre" id="nombre" value="<?= $this->nombre ?>">
				<br>
				<label for="apellido" style="width:25%;color:white">Apellido:</label>
				<input type="text" name="apellido" id="apellido" value="<?= $this->apellido ?>">
				<br>
				<label for="mail" style="width:25%;color:white">Mail:</label>
				<input type="text" name="mail" id="mail" value="<?= $this->mail ?>">
				<br>
				<?php if($this->dni == 0){ ?>
					<label for="dni" style="width:25%;color:white">Dni:</label>
					<input type="number" name="dni" id="dni" maxlength="10">
				<?php }else{ ?>
					<label for="dni" style="width:25%;color:white">Dni:</label>
					<input type="number" name="dni" id="dni" maxlength="10" value="<?= $this->dni ?>">
				<?php } ?>
				<br>
				<label for="direccion" style="width:25%;color:white">Direccion:</label>
				<input type="text" name="direccion" id="direccion" value="<?= $this->direccion ?>">
				<br>
				<label for="telefono" style="width:25%;color:white">Telefono:</label>
				<input type="text" name="telefono" id="telefono" value="<?= $this->telefono ?>">
				<br>
				<input type="submit" name="" value="Modificar">
			</form>
		</div>
		</nav>
	</div>

	<?php require('../html/Footer.php'); ?>

</body>
</html>
