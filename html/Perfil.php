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
			setTimeout(() => { document.getElementById("BTN").click(); }, 2000);
			</script>

		<?php } ?>

		<div class="row w-100 m-0 p-0">

			<div class="col-6 w-50 h-100 p-5">

				<div class="row border border-2 border-dark rounded">

					<div class="row w-100 m-0 p-2 bg-dark">
		        <div class="col-12 text-center">
		          <h3 class="text-white"><strong>Datos Actuales del Usuario</strong></h3>
		        </div>
		      </div>

			    <div class="row w-100 m-0 pt-5 pb-5 ps-5 p-0 bg-light">
						<div class="row w-100 my-3 p-2">
							<?php if (isset($this->dni) && isset($this->id_vuelo)) { ?>

								<?php if ($this->redireccion == 'reserva'){ ?>
									<div class="col-6 p-0 m-0">
										<button type="button" class="btn btn-success" name="button">
											<a style="text-decoration:none; color:white;" href="../controllers/reserva.php?id_vuelo=<?= $this->id_vuelo ?>">Finalizar Reserva</a>
										</button>
									</div>
								<?php }elseif ($this->redireccion == 'favorito'){ ?>
									<div class="col-6 p-0 m-0">
										<button type="button" class="btn btn-success" name="button">
											<a style="text-decoration:none; color:white;" href="../controllers/favorito.php?id_vuelo=<?= $this->id_vuelo ?>">Guardar Favorito</a>
										</button>
									</div>
								<?php } ?>

							<?php } ?>
								<div class="col-6 p-0 m-0">
									<button type="button" class="btn btn-danger" name="button">
										<a style="text-decoration:none; color:white;" href="../controllers/principal.php">Volver a Principal</a>
									</button>
								</div>
						</div>
						<div class="col-12 m-0 p-0">
							<h4 class="mt-3"><strong>Nombre:</strong> <?= $this->nombre ?></h4>
							<h4 class="mt-3"><strong>Apellido:</strong> <?= $this->apellido ?></h4>
							<h4 class="mt-3"><strong>Mail:</strong> <?= $this->mail ?></h4>
							<?php if($this->dni > 0){ ?>
								<h4 class="mt-3"><strong>DNI:</strong> <?= $this->dni ?></h4>
							<?php } ?>
							<h4 class="mt-3"><strong>Direccion:</strong> <?= $this->direccion ?></h4>
							<h4 class="mt-3"><strong>Telefono:</strong> <?= $this->telefono ?></h4>

						</div>
					</div>

				</div>

			</div>

			<div class="col-6 w-50 p-5">

				<div class="row border border-2 border-dark rounded">

					<div class="row w-100 m-0 p-2 bg-dark">
						<div class="col-12 text-center">
							<h3 class="text-white"><strong>Modificacion de Datos</strong></h3>
						</div>
					</div>

					<div class="row w-100 m-0 p-3 bg-light">
						<div class="col-12 m-0 p-0">
							<form action="../controllers/perfil.php" method="post">
								<input type="text" name="id_vuelo" value="<?= $this->id_vuelo ?>" hidden>
								<input type="text" name="redireccion" value="<?= $this->redireccion ?>" hidden>
								<div class="form-group w-100 my-2">
									<label for="nombre" style="color: black;"><strong>Nombre:</strong></label>
									<input type="text" class="form-control" name="nombre" id="nombre" value="<?= $this->nombre ?>">
								</div>
								<div class="form-group w-100 my-2">
									<label for="apellido" style="color: black;"><strong>Apellido:</strong></label>
									<input type="text" class="form-control" name="apellido" id="apellido" value="<?= $this->apellido ?>">
								</div>
								<div class="form-group w-100 my-2">
									<label for="mail" style="color: black;"><strong>Mail:</strong></label>
									<input type="text" class="form-control" name="mail" id="mail" value="<?= $this->mail ?>">
								</div>
								<div class="form-group w-100 my-2">
								<?php if($this->dni == 0){ ?>
									<label for="dni" style="color: black;"><strong>Dni:</strong></label>
									<input type="number" class="form-control" name="dni" id="dni" maxlength="10">
								<?php }else{ ?>
									<label for="dni" style="color: black;"><strong>Dni:</strong></label>
									<input type="number" class="form-control" name="dni" id="dni" maxlength="10" value="<?= $this->dni ?>">
								<?php } ?>
								</div>
								<div class="form-group w-100 my-2">
									<label for="direccion" style="color: black;"><strong>Direccion:</strong></label>
									<input type="text" class="form-control" name="direccion" id="direccion" value="<?= $this->direccion ?>">
								</div>
								<div class="form-group w-100 my-2">
									<label for="telefono" style="color: black;"><strong>Telefono:</strong></label>
									<input type="text" class="form-control" name="telefono" id="telefono" value="<?= $this->telefono ?>">
								</div>
								<div class="form-group w-100 my-2">
								<input type="submit" class="form-control btn btn-success" name="" value="Modificar">
							</form>
						</div>
					</div>
				</div>

			</div>

		</div>

	</div>
</div>


	<?php require('../html/Footer.php'); ?>

</div>
</body>
</html>
