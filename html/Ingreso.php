<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<title>login</title>
</head>
<body>
	<?php require '../html/HeaderLoginRegister.php'; ?>

	<div class="body">

		<?php if (isset($this->resultado)) { ?>
			<h2><?= $this->resultado ?></h2>
			<form action="../controllers/login.php" method="post">
				<input type="text" name="mail">
				<input type="password" name="clave">
				<input type="text" name="estado" value="<?= $this->estado ?>" hidden>
				<input type="text" name="mensaje" value="<?= $this->mensaje ?>" hidden>
				<input type="submit" name="" value="Ingresar">
			</form>
			<button type="button" name="button">
			    <a href="../controllers/register.php?id_vuelo=<?= $this->estado ?>">Registrarse</a>
			</button>
			<button type="button" name="button">
			    <a href="../controllers/principal.php">Volver al Principal</a>
			</button>
		<?php }elseif (isset($this->error)) { ?>
			<h2><?= $this->error ?></h2>
			<form action="../controllers/login.php" method="post">
				<input type="text" name="mail">
				<input type="password" name="clave">
				<input type="submit" name="" value="Ingresar">
			</form>
			<button type="button" name="button">
			    <a href="../controllers/register.php">Registrarse</a>
			</button>
			<button type="button" name="button">
			    <a href="../controllers/principal.php">Volver al Principal</a>
			</button>
		<?php }else{ ?>
			<form action="../controllers/login.php" method="post">
				<input type="text" name="mail">
				<input type="password" name="clave">
				<input type="submit" name="" value="Ingresar">
			</form>
			<button type="button" name="button">
			    <a href="../controllers/register.php">Registrarse</a>
			</button>
			<button type="button" name="button">
			    <a href="../controllers/principal.php">Volver al Principal</a>
			</button>
		<?php } ?>

	</div>

	<?php require '../html/Footer.php'; ?>
</body>
</html>
