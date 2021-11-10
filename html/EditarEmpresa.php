<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
	<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
	<link rel="stylesheet" type="text/css" href="../css/bootstrap.css">
	<title>SMART TRAVEL - Agregar Empresa</title>
	<link rel="icon" type="image/png" href="../media/logo.png">
</head>
<body style="background-image: url('../media/back.jpg');background-repeat: no-repeat;background-attachment: fixed;background-size: cover;">
	<?php require '../html/HeaderAdmin.php'; ?>

	<div class="body">
		<?php if(isset($this->resultado)){ ?>
			<div class="alert alert-dismissible alert-warning" style="width:100%">
        <button type="button" id="BTN" class="btn-close" data-bs-dismiss="alert"></button>
        <h4 class="alert-heading">Aviso</h4>
        <p class="mb-0"><?= $this->resultado ?></p>
      </div>
      <script type="text/javascript">
        setTimeout(() => { document.getElementById("BTN").click(); }, 5000);
      </script>
		<?php } ?>
		<div class=" row w-100 h-100 mb-3">
			<div class="col-4 m-0 p-0"></div>
			<div class="col-4 m-0 p-0">
        <?php foreach ($this->datos_empresa as $datos) { ?>
  				<div class="container m-0 mt-3 p-3 border border-2 border-dark rounded">
  						<h3 style="text-align: center; font-style: bold;">Agregar Empresa</h3>
  						<form action="../controllers/editarEmpresa.php" method="post">
                <input type="text" name="id_empresa" value="<?= $datos['id_empresa'] ?>" hidden>
  							<div class="form-group w-100">
  								<div class="w-100">
  									<label for="nombre" style="color:black;">Nombre:</label>
  									<input type="text" class="form-control" name="nombre" value="<?= $datos['nombre'] ?>">
  								</div>
  							</div>
  							<div class="form-group w-100 mt-1">
  								<div class="w-100">
  									<label for="contacto" style="color:black;">Contacto:</label>
  									<input type="text" class="form-control" name="contacto" value="<?= $datos['contacto'] ?>">
  								</div>
  							</div>
                <div class="form-group w-100 mt-1">
  								<div class="w-100">
  									<label for="direccion" style="color:black;">Direccion:</label>
  									<input type="text" class="form-control" name="direccion" value="<?= $datos['direccion'] ?>">
  								</div>
  							</div>
  							<div class="form-group w-100 mt-3">
  								<div class="w-100">
  									<input type="submit" class="btn btn-success w-100" name="" style=" font-size: 16px;" value="Modificar">
  								</div>
  							</div>
  						</form>

						<div class="row w-100 m-0 p-0">
							<button type="button" name="button" class="btn btn-danger">
							    <a class="navbar-brand" style="color: white; font-size: 16px;" href="../controllers/administrador.php">Volver a Empresas</a>
							</button>
						</div>
          <?php } ?>
					</div>
			</div>
			<div class="col-4 m-0 p-0"></div>
		</div>
</div>

	<?php require '../html/Footer.php'; ?>
</body>
</html>
