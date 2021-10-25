<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
	<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
	<link rel="stylesheet" type="text/css" href="../css/bootstrap.css">
	<title>SMART TRAVEL - Registro</title>
	<link rel="icon" type="image/png" href="../media/logo.png">
</head>
<body>
	<?php require '../html/HeaderLoginRegister.php'; ?>

	<div class="body">
		<?php if ($this->error) { ?>
			<h2><?= $this->error ?></h2>
		<?php } ?>
		<nav class="navbar navbar-expand-lg navbar-dark bg-primary">
		<form action="../controllers/register.php" method="post" style="padding-top:20px; margin-left:20px;">
			<label for="nombre" style="color:white">Nombre:</label><br>
			<input type="text" name="nombre" id="nombre" required placeholder="Jose"><br><br>
			<label for="mail" style="color:white">Mail:</label><br>
			<input type="text" name="mail" id="mail" required placeholder="alguien@alguien"><br><br>
			<label for="clave" style="color:white">Contraseña:</label><br>
			<input type="password" name="clave" id="clave" required placeholder="********"><br><br>
			<label for="clave_repetida" style="color:white">Repita su contraseña:</label><br>
			<input type="password" name="clave_repetida" id="clave_repetida" required placeholder="********"><br><br>
			<?php if ($this->id_vuelo) { ?>
				<input type="text" name="estado" value="<?= $this->id_vuelo ?>" hidden>
			<?php } ?>

			<input type="submit" name="" value="Ingresar" class="btn btn-secondary my-2 my-sm-0">
		</form>
		</nav>
		<nav class="navbar navbar-expand-lg navbar-dark bg-primary">
		<button type="button" name="button" class="btn btn-secondary my-2 my-sm-0">
		    <a class="navbar-brand" href="../controllers/principal.php">Volver al Principal</a>
		</button>
		</nav>
	</div>

	<?php require '../html/Footer.php'; ?>
</body>
</html>
