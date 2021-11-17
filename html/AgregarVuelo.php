<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
	<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
	<link rel="stylesheet" type="text/css" href="../css/bootstrap.css">
	<title>SMART TRAVEL - Agregar Vuelo</title>
	<link rel="icon" type="image/png" href="../media/logo.png">
</head>
<body style="background-image: url('../media/back.jpg');background-repeat: no-repeat;background-attachment: fixed;background-size: cover;">
	<?php require '../html/HeaderAdmin.php'; ?>

	<div class="body">
		<?php if(isset($this->resultado)){ ?>
			<div class="alert alert-dismissible alert-warning" style="width:100%">
        <button type="button" id="BTN" class="btn-close" data-bs-dismiss="alert"></button>
        <h4 class="alert-heading">Aviso</h4>
        <p class="mb-0"><?= htmlentities($this->resultado) ?></p>
      </div>
      <script type="text/javascript">
        setTimeout(() => { document.getElementById("BTN").click(); }, 5000);
      </script>
		<?php } ?>
		<div class=" row w-100 h-100 mb-3">
			<div class="col-4 m-0 p-0"></div>
			<div class="col-4 m-0 p-0">
				<div class="container m-0 mt-3 p-3 border border-2 border-dark rounded">
						<h3 style="text-align: center; font-style: bold;">Agregar Vuelo</h3>
						<form action="../controllers/agregarVuelo.php" method="post">

							<div class="row">
								<div class="col-6">
									<div class="form-group w-100 mt-1">
										<div class="w-100">
											<label for="nombre" style="color:black;">Nombre del Vuelo:</label>
											<input type="text" class="form-control" name="nombre_vuelo" placeholder="Nombre del Vuelo:">
										</div>
									</div>
								</div>
								<div class="col-6">
									<div class="form-group w-100 mt-1">
										<div class="w-100">
											<label for="origen" style="color:black;">Origen:</label>
											<input type="text" class="form-control" name="origen" placeholder="Origen:">
										</div>
									</div>
								</div>
							</div>
							<div class="row">
								<div class="col-6">
									<div class="form-group w-100 mt-1">
										<div class="w-100">
											<label for="fecha_origen" style="color:black;">Fecha Origen:</label>
											<input type="date" min=<?php $hoy = date("Y-m-d"); echo $hoy; ?> class="form-control" name="fecha_origen" placeholder="Fecha de Origen:" >
										</div>
									</div>
								</div>
								<div class="col-6">
									<div class="form-group w-100 mt-1">
										<div class="w-100">
											<label for="destino" style="color:black;">Destino:</label>
											<input type="text" class="form-control" name="destino" placeholder="Destino:" >
										</div>
									</div>
								</div>
							</div>
							<div class="row">
								<div class="col-6">
									<div class="form-group w-100 mt-1">
										<div class="w-100">
											<label for="fecha_destino" style="color:black;">Fecha Destino:</label>
											<input type="date" min=<?php $hoy = date("Y-m-d"); echo $hoy; ?> class="form-control" name="fecha_destino" placeholder="Fecha Destino:" >
										</div>
									</div>
								</div>
								<div class="col-6">
									<div class="form-group w-100 mt-1">
										<div class="w-100">
											<label for="precio" style="color:black;">Precio:</label>
											<input type="number" class="form-control" name="precio" placeholder="Precio:" >
										</div>
									</div>
								</div>
							</div>
							<div class="row">
								<div class="col">
									<div class="form-group w-100 mt-1">
										<div class="w-100">
											<label for="descripcion_vuelo" style="color:black;">Descripcion Vuelo:</label>
											<textarea rows="5" type="text" class="form-control" name="descripcion_vuelo" placeholder="Descripción:" ></textarea>
										</div>
									</div>
								</div>
							</div>

						<div class="form-group w-100 mt-3 mb-1">
								<div class="w-100">
									<input type="submit" class="btn btn-success w-100" name="" style=" font-size: 16px;" value="Crear">
								</div>
							</div>

							<input type="text" class="form-control" name="id_empresa" hidden value="<?= htmlentities($this->id_empresa) ?>">

						</form>

						<div class="row w-100 m-0 p-0">
							<button type="button" name="button" class="btn btn-danger">
							    <a class="navbar-brand" style="color: white; font-size: 16px;" href="../controllers/administrador.php">Volver a Empresas</a>
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
