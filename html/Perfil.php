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


		<div class="row w-100 m-0 p-3">

			<div class="row w-100 m-0 p-2 bg-dark">

				<div class="col-6 text-center">
					<h3 class="text-white"><strong>Datos Actuales del Usuario</strong></h3>
				</div>
				<div class="col-6">
					<?php if (isset($this->dni) && isset($this->id_vuelo)) { ?>
						<?php if ($this->redireccion == 'reserva'){ ?>
								<button type="button" class="btn btn-outline-success" name="button">
									<a style="text-decoration:none; color:white;" href="../controllers/reserva.php?id_vuelo=<?= $this->id_vuelo ?>">Finalizar Reserva</a>
								</button>
						<?php }elseif ($this->redireccion == 'favorito'){ ?>
								<button type="button" class="btn btn-outline-success" name="button">
									<a style="text-decoration:none; color:white;" href="../controllers/favorito.php?id_vuelo=<?= $this->id_vuelo ?>">Guardar Favorito</a>
								</button>
						<?php } ?>

					<?php } ?>
						<button type="button" class="btn btn-outline-danger" name="button">
							<a style="text-decoration:none; color:white;" href="../controllers/principal.php">Volver a Principal</a>
						</button>
				</div>

			</div>

			<div class="row w-100 m-0 mt-1 p-0">

				<table class="table table-hover table-dark">
					<thead>
						<tr>
							<th scope="col">Nombre</th>
							<th scope="col">Apellido</th>
							<th scope="col">Mail</th>
							<th scope="col">DNI</th>
							<th scope="col">Direccion</th>
							<th scope="col">Telefono</th>
						</tr>
					</thead>

					<tbody>
						<tr class="table-primary">
							<th scope="row"><?= $this->nombre ?></th>
							<td><?= $this->apellido ?></td>
							<td><?= $this->mail ?></td>
							<td><?= $this->dni ?></td>
							<td><?= $this->direccion ?></td>
							<td><?= $this->telefono ?></td>
						</tr>
					</tbody>
				</table>

			</div>

		</div>

		<div class="row w-100 m-0 p-3">

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
								<div class="row">
									<div class="col-6">
										<div class="form-group w-75 my-2">
											<label for="nombre" style="color: black;"><strong>Nombre:</strong></label>
											<input type="text" class="form-control" name="nombre" id="nombre" value="<?= $this->nombre ?>">
										</div>
									</div>
									<div class="col-6">
										<div class="form-group w-75 my-2">
											<label for="apellido" style="color: black;"><strong>Apellido:</strong></label>
											<input type="text" class="form-control" name="apellido" id="apellido" value="<?= $this->apellido ?>">
										</div>
									</div>
								</div>
								<div class="row">
									<div class="col-6">
										<div class="form-group w-75 my-2">
											<label for="mail" style="color: black;"><strong>Mail:</strong></label>
											<input type="text" class="form-control" name="mail" id="mail" value="<?= $this->mail ?>">
										</div>
									</div>
									<div class="col-6">
										<div class="form-group w-75 my-2">
											<?php if($this->dni == 0){ ?>
												<label for="dni" style="color: black;"><strong>Dni:</strong></label>
												<input type="number" class="form-control" name="dni" id="dni" maxlength="10">
											<?php }else{ ?>
												<label for="dni" style="color: black;"><strong>Dni:</strong></label>
												<input type="number" class="form-control" name="dni" id="dni" maxlength="10" value="<?= $this->dni ?>">
											<?php } ?>
										</div>
									</div>
								</div>
								<div class="row">
									<div class="col-6">
										<div class="form-group w-75 my-2">
											<label for="direccion" style="color: black;"><strong>Direccion:</strong></label>
											<input type="text" class="form-control" name="direccion" id="direccion" value="<?= $this->direccion ?>">
										</div>
									</div>
									<div class="col-6">
										<div class="form-group w-75 my-2">
											<label for="telefono" style="color: black;"><strong>Telefono:</strong></label>
											<input type="text" class="form-control" name="telefono" id="telefono" value="<?= $this->telefono ?>">
										</div>
									</div>
								</div>

								<div class="form-group w-25 my-2">
									<input type="submit" class="form-control btn btn-success" name="" value="Modificar">
								</div>
							</form>
						</div>
					</div>

			</div>

		</div>

	</div>


	<?php require('../html/Footer.php'); ?>

</div>
</body>
</html>
