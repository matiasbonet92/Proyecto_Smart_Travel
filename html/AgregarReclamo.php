<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
	<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
	<link rel="stylesheet" type="text/css" href="../css/bootstrap.css">
	<title>SMART TRAVEL - Generar Reclamo</title>
	<link rel="icon" type="image/png" href="../media/logo.png">
</head>
<body style="background-image: url('../media/back.jpg');background-repeat: no-repeat;background-attachment: fixed;background-size: cover;">
	<?php require '../html/Header.php'; ?>

	<div class="body">

		<div class=" row w-100 h-100 mb-3">
			<div class="col-4 m-0 p-0"></div>
			<div class="col-4 m-0 p-0">
				<div class="container m-0 mt-3 p-3 border border-2 border-dark rounded">
						<h3 style="text-align: center; font-style: bold;">Generar Reclamo</h3>
						<form action="../controllers/AgregarReclamo.php" method="post">
							<input type="text" class="form-control" name="id_reserva" hidden value="<?= htmlentities($this->id_reserva) ?>">
								<div class="form-group w-100">
									<div class="w-100">
										<label for="asunto" style="color:black;">Asunto:</label>
										<input type="text" class="form-control" name="asunto" placeholder="Asunto del reclamo">
									</div>
								</div>
								<div class="form-group w-100 mt-1">
									<div class="w-100">
										<label for="descripcion" style="color:black;">Descripción:</label>
										<textarea class="form-control" aria-label="With textarea" name="descripcion" placeholder="Descripción del reclamo"></textarea>
									</div>
									<div class="form-group w-100 mt-3 mb-1">
									<div class="w-100">
										<input type="submit" class="btn btn-success w-100" name="" style=" font-size: 16px;" value="Enviar">
									</div>
								</div>
						</form>

						<div class="row w-100 m-0 p-0">
							<button type="button" name="button" class="btn btn-danger">
							    <a class="navbar-brand" style="color: white; font-size: 16px;" href="../controllers/misviajes.php">Volver a mis viajes</a>
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
