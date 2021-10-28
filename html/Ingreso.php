<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
	<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
	<link rel="stylesheet" type="text/css" href="../css/bootstrap.css">
	<title>SMART TRAVEL - Ingreso</title>
	<link rel="icon" type="image/png" href="../media/logo.png">
</head>
<body style="background-image: url('../media/back.jpg');background-repeat: no-repeat;background-attachment: fixed;background-size: cover;">
	<?php require '../html/HeaderLoginRegister.php'; ?>

	<div class="body">
		<?php if (isset($this->resultado)) { ?>
			<h2><?= $this->resultado ?></h2>
		<nav class="navbar navbar-expand-lg navbar-dark bg-primary">
			<div class="container-fluid">
					<form class="d-flex" action="../controllers/login.php" method="post">
						<div class="form-group" style="display:flex;">
							<div class="col-sm-10" style="max-width:30%; max-height:10%;padding-left:10px;">
								<label for="origen" style="color:white;">Mail:</label>
								<input type="text" class="form-control" name="mail" placeholder="alguien@alguien.com">
							</div>
							<div class="col-sm-10" style="max-width:30%;padding-left:10px;">
								<label for="destino" style="color:white;">Contraseña:</label>
								<input type="text" class="form-control" name="clave" placeholder="********">
							</div>
							<div class="col-sm-10" style="max-width:30%;">
								<br>
								<input type="submit" class="btn btn-secondary my-2 my-sm-0" name="" value="Ingresar">
							</div>
						</div>
					</form>
					<button type="button" class="btn btn-secondary my-2 my-sm-0" name="button">
					    <a class="navbar-brand" href="../controllers/register.php?id_vuelo=<?= $this->estado ?>">Registrarse</a>
					</button>
					<button type="button" name="button" class="btn btn-secondary my-2 my-sm-0" >
					    <a class="navbar-brand" href="../controllers/principal.php">Volver al Principal</a>
					</button>
					</div>
		</nav>
		<?php }elseif (isset($this->error)) { ?>
			<div class="alert alert-dismissible alert-warning" style="width:100%">
				<button type="button" class="btn-close" data-bs-dismiss="alert"></button>
				<h4 class="alert-heading">Aviso</h4>
			<p class="mb-0"><?= $this->error ?></p>
			</div>
			<nav class="navbar navbar-expand-lg navbar-dark bg-primary">
				<div class="container-fluid">
						<form class="d-flex" action="../controllers/login.php" method="post">
							<div class="form-group" style="display:flex;">
								<div class="col-sm-10" style="max-width:30%; max-height:10%;padding-left:10px;">
									<label for="origen" style="color:white;">Mail:</label>
									<input type="text" class="form-control" name="mail" placeholder="alguien@alguien.com">
								</div>
								<div class="col-sm-10" style="max-width:30%;padding-left:10px;">
									<label for="destino" style="color:white;">Contraseña:</label>
									<input type="text" class="form-control" name="clave" placeholder="********">
								</div>
								<div class="col-sm-10" style="max-width:30%;">
									<br>
									<input type="submit" class="btn btn-secondary my-2 my-sm-0" name="" value="Ingresar">
								</div>
							</div>
						</form>
						<button type="button" name="button" class="btn btn-secondary my-2 my-sm-0">
						    <a class="navbar-brand" href="../controllers/register.php?id_vuelo=<?= $this->estado ?>">Registrarse</a>
						</button>
						<button type="button" name="button" class="btn btn-secondary my-2 my-sm-0" >
						    <a class="navbar-brand" href="../controllers/principal.php">Volver al Principal</a>
						</button>
						</div>
			</nav>
		<?php }else{ ?>
			<nav class="navbar navbar-expand-lg navbar-dark bg-primary">
				<div class="container-fluid">
						<form class="d-flex" action="../controllers/login.php" method="post">
							<div class="form-group" style="display:flex;">
								<div class="col-sm-10" style="max-width:30%; max-height:10%;padding-left:10px;">
									<label for="origen" style="color:white;">Mail:</label>
									<input type="text" class="form-control" name="mail" placeholder="alguien@alguien.com">
								</div>
								<div class="col-sm-10" style="max-width:30%;padding-left:10px;">
									<label for="destino" style="color:white;">Contraseña:</label>
									<input type="text" class="form-control" name="clave" placeholder="********">
								</div>
								<div class="col-sm-10" style="max-width:30%;">
									<br>
									<input type="submit" class="btn btn-secondary my-2 my-sm-0" name="" value="Ingresar">
								</div>
							</div>
						</form>
						<button type="button" name="button" class="btn btn-secondary my-2 my-sm-0">
						    <a class="navbar-brand" href="../controllers/register.php?id_vuelo=<?= $this->estado ?>">Registrarse</a>
						</button>
						<button type="button" name="button" class="btn btn-secondary my-2 my-sm-0">
						    <a class="navbar-brand" href="../controllers/principal.php">Volver al Principal</a>
						</button>
						</div>
			</nav>
		<?php } ?>


	</div>

	<?php require '../html/Footer.php'; ?>
</body>
</html>
