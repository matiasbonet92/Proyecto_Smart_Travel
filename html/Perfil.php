<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<title>perfil</title>
</head>
<body>

	<?php require('../html/Header.php');  ?>

	<div class="body">
		<?php if ($this->mensaje) { ?>
			<h2><?= $this->mensaje ?></h2>
		<?php } ?>
		<div class="izq">
			<h2>Datos Actuales del Usuario:</h2>
			<p>Nombre: <?= $this->nombre ?></p>
			<p>Apellido: <?= $this->apellido ?></p>
			<p>Mail: <?= $this->mail ?></p>
			<?php if($this->dni > 0){ ?>
				<p>Dni: <?= $this->dni ?></p>
			<?php } ?>
			<p>Direccion: <?= $this->direccion ?></p>
			<p>Telefono: <?= $this->telefono ?></p>
			<button type="button" name="button">
		      <a href="../controllers/principal.php">Volver a Principal</a>
		    </button>
		</div>
		<div class="der">
			<h2>Modificacion de los datos:</h2>
			<form action="../controllers/perfil.php" method="post">
				<label for="nombre">Nombre:</label>
				<input type="text" name="nombre" id="nombre" value="<?= $this->nombre ?>">
				<label for="apellido">Apellido:</label>
				<input type="text" name="apellido" id="apellido" value="<?= $this->apellido ?>">
				<label for="mail">Mail:</label>
				<input type="text" name="mail" id="mail" value="<?= $this->mail ?>">
				<?php if($this->dni == 0){ ?>
					<label for="dni">Dni:</label>
					<input type="number" name="dni" id="dni" maxlength="10">
				<?php }else{ ?>
					<label for="dni">Dni:</label>
					<input type="number" name="dni" id="dni" maxlength="10" value="<?= $this->dni ?>">
				<?php } ?>
				<label for="direccion">Direccion:</label>
				<input type="text" name="direccion" id="direccion" value="<?= $this->direccion ?>">
				<label for="telefono">Telefono:</label>
				<input type="text" name="telefono" id="telefono" value="<?= $this->telefono ?>">

				<input type="submit" name="" value="Modificar">
			</form>
		</div>
	</div>

	<?php require('../html/Footer.php'); ?>

</body>
</html>