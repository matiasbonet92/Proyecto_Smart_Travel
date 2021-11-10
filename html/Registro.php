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
<body style="background-image: url('../media/back.jpg');background-repeat: no-repeat;background-attachment: fixed;background-size: cover;">
	<?php require '../html/HeaderLoginRegister.php'; ?>

	<div class="body">
		<?php if (isset($this->error)) { ?>
			<div class="alert alert-dismissible alert-warning m-0 w-100">
				<button type="button" id="BTN" class="btn-close" data-bs-dismiss="alert"></button>
				<h4 class="alert-heading">Aviso</h4>
				<p class="mb-0"><?= $this->error ?></p>
			</div>
			<script type="text/javascript">
			setTimeout(() => { document.getElementById("BTN").click(); }, 5000);
			</script>
		<?php } ?>

		<div class=" row w-100 h-100 mb-3">
			<div class="col-4 m-0 p-0"></div>
			<div class="col-4 m-0 p-0">
			<div class="container m-0 mt-3 p-3 border border-2 border-dark rounded">
					<h3 style="text-align: center; font-style: bold;">Registro</h3>
						<form action="../controllers/register.php" method="post">
							<div class="form-group w-100">
								<div class="w-100">
									<label for="nombre" style="color:white">Nombre:</label>
									<input type="text" name="nombre" id="nombre" placeholder="Jose" class="form-control">
								</div>
							</div>
							<div class="form-group w-100 mt-1">
								<div class="w-100">
									<label for="mail" style="color:white">Mail:</label>
									<input type="text" name="mail" id="mail" placeholder="alguien@alguien" class="form-control">
								</div>
							</div>
							<div class="form-group w-100 mt-1">
								<div class="w-100">
									<label for="clave" style="color:white">Contraseña:</label>
									<input type="password" name="clave" id="clave" placeholder="********" class="form-control">
								</div>
							</div>
							<div class="form-group w-100 mt-1">
								<div class="w-100">
									<label for="clave_repetida" style="color:white">Repita su contraseña:</label>
									<input type="password" name="clave_repetida" id="clave_repetida" placeholder="********" class="form-control">
								</div>
							</div>
							<div class="form-group w-100">
								<div class="w-100">
									<?php if (isset($this->id_vuelo)) { ?>
										<input type="text" name="estado" value="<?= $this->id_vuelo ?>" hidden>
										<input type="text" name="redireccion" value="<?= $this->redireccion ?>" hidden>
										<input type="text" name="mensaje" value="<?= $this->mensaje ?>" hidden>
									<?php } ?>
								</div>
							</div>
							<div class="form-group w-100 mt-3 mb-1">
								<div class="w-100">
									<input type="submit" name="" style=" font-size: 16px;" value="Registrarse e Ingresar" class="btn btn-success w-100">
								</div>
							</div>
						</form>

					<div class="row w-100 m-0 p-0 mb-1">
						<button type="button" name="button" class="btn btn-warning">
								<a class="navbar-brand" style="color: white; font-size: 16px;" href="../controllers/login.php">Volver al Login</a>
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


	</div>

	<?php require '../html/Footer.php'; ?>
</body>
</html>
