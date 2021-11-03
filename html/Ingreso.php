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
			<div class=" row w-100 h-100 mb-3">
				<div class="col-4 m-0 p-0"></div>
				<div class="col-4 m-0 p-0">
					<div class="container m-0 mt-3 p-3 border border-2 border-dark rounded">
							<h3 style="text-align: center; font-style: bold;">Ingreso</h3>
							<form action="../controllers/login.php" method="post">
								<div class="form-group w-100">
									<div class="w-100">
										<label for="origen" style="color:black;">Mail:</label>
										<input type="text" class="form-control" name="mail" placeholder="alguien@alguien.com">
									</div>
								</div>
								<div class="form-group w-100 mt-1">
									<div class="w-100">
										<label for="destino" style="color:black;">Contraseña:</label>
										<input type="text" class="form-control" name="clave" placeholder="********">
									</div>
								</div>
								<div class="form-group w-100 mt-3">
									<div class="w-100">
										<input type="submit" class="btn btn-success w-100" name="" style=" font-size: 16px;" value="Ingresar">
									</div>
								</div>
							</form>
							<div class="row w-100 m-0 p-0 mt-4">
								<button type="button" name="button" class="btn btn-primary">
								    <a class="navbar-brand" style="color: white; font-size: 16px; " href="../controllers/register.php?id_vuelo=<?= $this->estado ?>">Registrarse</a>
								</button>
							</div>
							<div class="row w-100 m-0 p-0">
								<button type="button" name="button" class="btn btn-danger">
								    <a class="navbar-brand" style="color: white; font-size: 16px;" href="../controllers/principal.php">Volver al Principal</a>
								</button>
							</div>
						</div>
				</div>
				<div class="col-4 m-0 p-0"></div>
			</div>
			<!-- <div class="w-100 h-100">
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
						</div> -->
			</div>
		<?php }elseif (isset($this->error)) { ?>
			<div class="alert alert-dismissible alert-warning m-0 w-100">
				<button type="button" id="BTN" class="btn-close" data-bs-dismiss="alert"></button>
				<h4 class="alert-heading">Aviso</h4>
			<p class="mb-0"><?= $this->error ?></p>
			</div>
			<script type="text/javascript">
			setTimeout(() => { document.getElementById("BTN").click(); }, 2000);
			</script>
			<div class=" row w-100 h-100 mb-3">
				<div class="col-4 m-0 p-0"></div>
				<div class="col-4 m-0 p-0">
					<div class="container m-0 mt-3 p-3 border border-2 border-dark rounded">
							<h3 style="text-align: center; font-style: bold;">Ingreso</h3>
							<form action="../controllers/login.php" method="post">
								<div class="form-group w-100">
									<div class="w-100">
										<label for="origen" style="color:black;">Mail:</label>
										<input type="text" class="form-control" name="mail" placeholder="alguien@alguien.com">
									</div>
								</div>
								<div class="form-group w-100 mt-1">
									<div class="w-100">
										<label for="destino" style="color:black;">Contraseña:</label>
										<input type="text" class="form-control" name="clave" placeholder="********">
									</div>
								</div>
								<div class="form-group w-100 mt-3">
									<div class="w-100">
										<input type="submit" class="btn btn-success w-100" name="" style=" font-size: 16px;" value="Ingresar">
									</div>
								</div>
							</form>
							<div class="row w-100 m-0 p-0 mt-4">
								<button type="button" name="button" class="btn btn-primary">
								    <a class="navbar-brand" style="color: white; font-size: 16px; " href="../controllers/register.php?id_vuelo=<?= $this->estado ?>">Registrarse</a>
								</button>
							</div>
							<div class="row w-100 m-0 p-0">
								<button type="button" name="button" class="btn btn-danger">
								    <a class="navbar-brand" style="color: white; font-size: 16px;" href="../controllers/principal.php">Volver al Principal</a>
								</button>
							</div>
						</div>
				</div>
				<div class="col-4 m-0 p-0"></div>
			</div>
		<?php }else{ ?>

			<div class=" row w-100 h-100 mb-3">
				<div class="col-4 m-0 p-0"></div>
				<div class="col-4 m-0 p-0">
					<div class="container m-0 mt-3 p-3 border border-2 border-dark rounded">
							<h3 style="text-align: center; font-style: bold;">Ingreso</h3>
							<form action="../controllers/login.php" method="post">
								<div class="form-group w-100">
									<div class="w-100">
										<label for="origen" style="color:black;">Mail:</label>
										<input type="text" class="form-control" name="mail" placeholder="alguien@alguien.com">
									</div>
								</div>
								<div class="form-group w-100 mt-1">
									<div class="w-100">
										<label for="destino" style="color:black;">Contraseña:</label>
										<input type="text" class="form-control" name="clave" placeholder="********">
									</div>
								</div>
								<div class="form-group w-100 mt-3">
									<div class="w-100">
										<input type="submit" class="btn btn-success w-100" name="" style=" font-size: 16px;" value="Ingresar">
									</div>
								</div>
							</form>
							<div class="row w-100 m-0 p-0 mt-4">
								<button type="button" name="button" class="btn btn-primary">
								    <a class="navbar-brand" style="color: white; font-size: 16px; " href="../controllers/register.php?id_vuelo=<?= $this->estado ?>">Registrarse</a>
								</button>
							</div>
							<div class="row w-100 m-0 p-0">
								<button type="button" name="button" class="btn btn-danger">
								    <a class="navbar-brand" style="color: white; font-size: 16px;" href="../controllers/principal.php">Volver al Principal</a>
								</button>
							</div>
						</div>
				</div>
				<div class="col-4 m-0 p-0"></div>
			</div>

		<?php } ?>


	</div>

	<?php require '../html/Footer.php'; ?>
</body>
</html>
