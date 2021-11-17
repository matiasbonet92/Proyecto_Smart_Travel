<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
    <link rel="stylesheet" type="text/css" href="../css/bootstrap.css">
    <title>SMART TRAVEL</title>
    <link rel="icon" type="image/png" href="../media/logo.png">
</head>
<body style="background-image: url('../media/back.jpg');background-repeat: no-repeat;background-attachment: fixed;background-size: cover;">

  <?php require '../html/Header.php'; ?>

  <div class="body">

    <?php if (isset($this->mensaje)){ ?>

      <div class="alert alert-dismissible alert-warning" style="width:100%">
        <button type="button" id="BTN" class="btn-close" data-bs-dismiss="alert"></button>
        <h4 class="alert-heading">Aviso</h4>
        <p class="mb-0"><?= htmlentities($this->mensaje) ?></p>
      </div>
      <script type="text/javascript">
        setTimeout(() => { document.getElementById("BTN").click(); }, 5000);
      </script>
    <?php } ?>

    <div class="row w-auto my-3 mx-5 p-0 border border-2 border-dark rounded">
      <div class="row w-100 m-0 p-2 bg-dark">
        <div class="col-12 text-center">
          <h2 class="text-white"><strong>Busqueda de Vuelos</strong></h2>
        </div>
      </div>
      <div class="row w-100 m-0 p-3 bg-light">
        <form action="../controllers/resultado_busqueda.php" method="post">
          <div class="form-group w-100" style="display:flex;">
            <div class="col-3 p-1 me-2">
              <label for="origen" class="text-black">Origen:</label>
              <input type="text" class="form-control" name="origen" placeholder="Ingrese un origen">
            </div>
            <div class="col-3 p-1 me-2">
              <label for="destino" class="text-black">Destino:</label>
              <input type="text" class="form-control" name="destino" placeholder="Ingrese un destino">
            </div>
            <div class="col-sm-2 p-1 me-2">
              <label for="fecha" class="text-black">Fecha:</label>
              <input type="date" min=<?php $hoy = date("Y-m-d"); echo $hoy; ?> class="form-control" name="fecha">
            </div>
            <div class="col-3 p-1 pt-2 ps-4 me-2">
              <br>
              <label for="no-fecha" class=" text-black">No he decidido la fecha aún:</label>
              <input type="checkbox" name="no-fecha" value="" checked >
            </div>
            <div class="col-1 p-1">
              <br>
              <input type="submit" class="btn btn-outline-success my-2 my-sm-0" name="" value="Buscar">
            </div>
          </div>
        </form>
      </div>
    </div>

    <div class="row w-auto my-3 mx-5 p-0 border border-2 border-dark rounded">

      <div class="row w-100 p-2 m-0 text-center bg-dark">
        <h2 class="text-white"><strong>Destacados</strong></h2>
      </div>

      <div class="row w-100 m-0 p-1 text-center bg-light">
        <?php $cont=0; ?>
        <?php foreach($this->vuelos_precio_minimo as $v){ ?>
        <div class="col-3 m-0 p-4">
          <div class="card bg-light border border-3 border-primary rounded p-1">
            <div class="card-header bg-primary text-white" style="text-align:center">
                <h2><strong><?= htmlentities($v['destino']) ?></strong></h2>
            </div>
            <div class="card-body text-black" style="text-align:center;">
              <p><strong>Saliendo desde: <?= htmlentities($v['origen']) ?></strong></p>
              <p><strong>Precio desde: $<?= htmlentities($v['precio_minimo']) ?></strong></p>
            </div>
            <div class="card-footer bg-primary" style="text-align:center">
              <button type="button" class="btn btn-outline-dark w-75 p-1" name="button">
                <a style="text-decoration:none; color:white;" href="../controllers/resultado_busqueda.php?origen=<?= htmlentities($v['origen']) ?>&destino=<?= htmlentities($v['destino']) ?>">Ver mas</a>
              </button>
            </div>
          </div>
        </div>
        <?php $cont = $cont+1; ?>
        <?php if ($cont == 4) break; ?>
        <?php } ?>
      </div>

    </div>
  </div>

  <?php require '../html/Footer.php'; ?>

</body>
</html>
