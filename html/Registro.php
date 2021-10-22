<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<title>registro</title>
</head>
<body>
	<?php require '../html/HeaderLoginRegister.php'; ?>

	<div class="body">
		<?php if ($this->error) { ?>
			<h2><?= $this->error ?></h2>
		<?php } ?>
		<form action="../controllers/register.php" method="post">
			<label for="nombre">Nombre:</label>
			<input type="text" name="nombre" id="nombre">
			<label for="mail">Mail:</label>
			<input type="text" name="mail" id="mail">
			<label for="clave">Contraseña:</label>
			<input type="password" name="clave" id="clave">
			<label for="clave_repetida">Repita su contraseña:</label>
			<input type="password" name="clave_repetida" id="clave_repetida">
			<?php if ($this->id_vuelo) { ?>
				<input type="text" name="estado" value="<?= $this->id_vuelo ?>" hidden>
			<?php } ?>

			<input type="submit" name="" value="Ingresar">
		</form>
		<button type="button" name="button">
		    <a href="../controllers/principal.php">Volver al Principal</a>
		</button>
	</div>

	<?php require '../html/Footer.php'; ?>
</body>
</html>