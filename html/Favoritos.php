<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
	<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
	<link rel="stylesheet" type="text/css" href="../css/bootstrap.css">
	<title>SMART TRAVEL - Favoritos</title>
	<link rel="icon" type="image/png" href="../media/logo.png">
</head>
<body style="background-image: url('../media/back.jpg');background-repeat: no-repeat;background-attachment: fixed;background-size: cover;">

	<?php require('../html/Header.php'); ?>

	<div class="body">

			<div class="row w-100 m-0 p-0">

				<?php if(isset($this->favoritos)){ ?>

					<div class="row w-100 m-0 mt-3 p-2 text-center">
						<div class="col-9">
								<h2><strong>Mis Favoritos</strong></h2>
						</div>
						<div class="col-3">
							<button type="button" class="btn btn-outline-success" name="button">
								<a href="../controllers/principal.php" style="color: black; text-decoration: none; font-size: 16px;">Volver al Principal
									<img src="../media/volver.png" alt="" width="30px" height="30px">
								</a>
							</button>
						</div>
					</div>

					<table class="table table-hover table-dark">
						<thead>
							<tr>
								<th scope="col">Destino</th>
								<th scope="col">Origen</th>
								<th scope="col">Fecha Origen</th>
								<th scope="col">Destino</th>
								<th scope="col">Fecha Destino</th>
								<th scope="col">Precio</th>
								<th scope="col">Ver Mas</th>
								<th scope="col">Eliminar</th>
							</tr>
						</thead>

						<?php foreach($this->favoritos as $fav) { ?>

							<tbody>
								<tr class="table-primary">
									<th scope="row"><?= htmlentities($fav['destino']) ?></th>
									<td><?= htmlentities($fav['origen']) ?></td>
									<td><?= htmlentities($fav['fecha_origen']) ?></td>
									<td><?= htmlentities($fav['destino']) ?></td>
									<td><?= htmlentities($fav['fecha_destino']) ?></td>
									<td><?= htmlentities($fav['precio']) ?></td>

									<td>
										<button type="button" class="btn btn-outline-info" name="button">
											<a href="../controllers/resultado_busqueda.php?origen=<?= htmlentities($fav['origen']) ?>&destino=<?= htmlentities($fav['destino']) ?>">
												<img src="../media/vuelo.png" alt="" width="30px" height="30px">
											</a>
										</button>
									</td>

									<td>
										<button type="button" class="btn btn-outline-danger" name="button">
											<a href="../controllers/misfavoritos.php?dni=<?= htmlentities($fav['dni']) ?>&id_vuelo=<?= htmlentities($fav['id_vuelos']) ?>">
												<img src="../media/eliminar.svg" alt="" width="30px" height="30px">
											</a>
										</button>
									</td>

								</tr>
							</tbody>

						<?php } ?>
					</table>

				<?php }elseif (isset($this->mensaje)){ ?>

					<div class="alert alert-dismissible alert-warning" style="width:100%">
						<button type="button" id="BTN" class="btn-close" data-bs-dismiss="alert"></button>
						<h4 class="alert-heading">Aviso</h4>
						<p class="mb-0"><?= htmlentities($this->mensaje) ?></p>
					</div>
					<script type="text/javascript">
						setTimeout(() => { document.getElementById("BTN").click(); }, 5000);
					</script>

					<div class="row w-100 m-0 mt-3 p-2 text-center">
						<div class="col-9">
								<h2><strong>Mis Favoritos</strong></h2>
						</div>
						<div class="col-3">
							<button type="button" class="btn btn-outline-success" name="button">
								<a href="../controllers/principal.php" style="color: black; text-decoration: none; font-size: 16px;">Volver al Principal
									<img src="../media/volver.png" alt="" width="30px" height="30px">
								</a>
							</button>
						</div>
					</div>

				<?php } ?>

			</div>

		</div>

	<?php require('../html/Footer.php'); ?>

</body>
</html>
