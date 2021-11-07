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
<body style="background-image: url('../media/back.jpg');background-repeat: no-repeat;background-attachment: fixed;background-size: cover;">

	<?php require('../html/Header.php');  ?>

	<div class="body">

		<?php if ($this->mensaje) { ?>

			<div class="alert alert-dismissible alert-warning" style="width:100%">
		  	<button type="button" id="BTN" class="btn-close" data-bs-dismiss="alert"></button>
		  	<h4 class="alert-heading">Aviso</h4>
		  	<p class="mb-0"><?= $this->mensaje ?></p>
			</div>
			<script type="text/javascript">
			setTimeout(() => { document.getElementById("BTN").click(); }, 5000);
			</script>
		<?php } ?>

		<div class="row w-auto my-3 mx-5 p-0 border border-2 border-dark rounded">

      <div class="row w-100 m-0 p-2 bg-dark">
        <div class="col-12 text-center">
          <h2 class="text-white"><strong>Datos Actuales del Usuario</strong></h2>
        </div>
      </div>

      <div class="row w-100 m-0 p-3 bg-light">

				<div class="col-1 m-0 p-0"></div>

				<div class="col-4 m-0 p-0">
					<h4 class="mt-3"><strong>Nombre:</strong> <?= $this->nombre ?></h4>
					<h4 class="mt-3"><strong>Apellido:</strong> <?= $this->apellido ?></h4>
					<h4 class="mt-3"><strong>Mail:</strong> <?= $this->mail ?></h4>
					<?php if($this->dni > 0){ ?>
						<h4 class="mt-3"><strong>DNI:</strong> <?= $this->dni ?></h4>
					<?php } ?>
					<h4 class="mt-3"><strong>Direccion:</strong> <?= $this->direccion ?></h4>
					<h4 class="mt-3"><strong>Telefono:</strong> <?= $this->telefono ?></h4>
					<div class="row w-100 my-3 p-2">
						<?php if (isset($this->dni) && isset($this->id_vuelo)) { ?>
							<div class="col-6 p-0 m-0">
								<button type="button" class="btn btn-success" name="button">
									<a style="text-decoration:none; color:white;" href="../controllers/reserva.php?id_vuelo=<?= $this->id_vuelo ?>">Finalizar Reserva</a>
								</button>
							</div>
						<?php } ?>
						<div class="col-6 p-0 m-0">
							<button type="button" class="btn btn-danger" name="button">
								<a style="text-decoration:none; color:white;" href="../controllers/principal.php">Volver a Principal</a>
							</button>
						</div>
					</div>
				</div>

				<div class="col-7 m-0 p-0">
				</nav>
				<nav class="navbar navbar-expand-lg navbar-dark bg-primary" style="width:50%">
				<div class="der">
					<h2 style="color:white">Modificacion de los datos:</h2>
					<form action="../controllers/perfil.php" method="post">
						<input type="text" name="id_vuelo" value="<?= $this->id_vuelo ?>" hidden>
						<?php var_dump($this->id_vuelo); ?>
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

			</div>
		</div>

	<?php require('../html/Footer.php'); ?>

</div>
</body>
</html>
