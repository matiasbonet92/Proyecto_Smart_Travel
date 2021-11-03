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

  <div class="d-grid gap-2" style="background-color: white">
      <button class="btn btn-lg btn-primary"  type="button" style="font-size:40px"disabled >Busqueda de Vuelos</button>
  </div>

  <div class="body">
      <nav class="navbar navbar-expand-lg navbar-dark bg-primary">
        <div class="container-fluid">
            <form class="d-flex" action="../controllers/resultado_busqueda.php" method="post">
              <div class="form-group" style="display:flex;">
                <div class="col-sm-10" style="max-width:20%; max-height:10%;padding-left:10px;">
                  <label for="origen" style="color:white;">Origen:</label>
                  <input type="text" class="form-control" name="origen" placeholder="Ingrese un origen">
                </div>
                <div class="col-sm-10" style="max-width:20%;padding-left:10px;">
                  <label for="destino" style="color:white;">Destino:</label>
                  <input type="text" class="form-control" name="destino" placeholder="Ingrese un destino">
                </div>
                <div class="col-sm-10" style="max-width:20%;padding-left:10px;">
                  <label for="fecha" style="color:white;">Fecha:</label>
                  <input type="date" class="form-control" name="fecha">
                </div>
                <div class="col-sm-10" style="max-width:25%; padding-left:10px;">
                  <br>
                  <label for="no-fecha" style="color:white;">No he decidido la fecha aún:</label>
                </div>
                <div class="col-sm-10" style="max-width:5%;">
                  <br>
                  <input type="checkbox" name="no-fecha" value="" checked >
                </div>
                <div class="col-sm-10" style="max-width:20%;">
                  <br>
                  <input type="submit" class="btn btn-secondary my-2 my-sm-0" name="" value="Buscar">
                </div>
            </div>

            </form>
        </div>
      </nav>

    <?php if (isset($this->favoritos)) { ?>

      <div class="row w-100 p-2 m-0 text-center">
        <h1>Favoritos</h1>
      </div>

      <div class="row w-100 m-0 p-0">
        <?php $cont=0; ?>
        <?php foreach($this->favoritos as $fav){ ?>
        <div class="col-3 m-0 p-4">
          <div class="card bg-light border border-3 border-primary rounded p-1">
            <div class="card-header bg-primary text-white" style="text-align:center">
                <h2><strong><?= $fav['destino'] ?></strong></h2>
            </div>
            <div class="card-body text-black" style="text-align:center;">
              <p><strong>Saliendo desde: <?= $fav['origen'] ?></strong></p>
              <p><strong>Precio desde: <?= $fav['precio'] ?></strong></p>
            </div>
            <div class="card-footer bg-primary" style="text-align:center">
              <button type="button" class="btn btn-outline-dark w-75 p-1" name="button">
                <a style="text-decoration:none; color:white;" href="../controllers/resultado_busqueda.php?origen=<?= $fav['origen'] ?>&destino=<?= $fav['destino'] ?>">Ver mas</a>
              </button>
            </div>
          </div>
        </div>
        <?php } ?>
      </div>

      <div class="row w-100 p-2 m-0 text-center">
        <h1>Destacados</h1>
      </div>

      <div class="row w-100 m-0 p-0">
        <?php $cont=0; ?>
        <?php foreach($this->vuelos_precio_minimo as $v){ ?>
        <div class="col-3 m-0 p-4">
          <div class="card bg-light border border-3 border-primary rounded p-1">
            <div class="card-header bg-primary text-white" style="text-align:center">
                <h2><strong><?= $v['destino'] ?></strong></h2>
            </div>
            <div class="card-body text-black" style="text-align:center;">
              <p><strong>Saliendo desde: <?= $v['origen'] ?></strong></p>
              <p><strong>Precio desde: <?= $v['precio_minimo'] ?></strong></p>
            </div>
            <div class="card-footer bg-primary" style="text-align:center">
              <button type="button" class="btn btn-outline-dark w-75 p-1" name="button">
                <a style="text-decoration:none; color:white;" href="../controllers/resultado_busqueda.php?origen=<?= $v['origen'] ?>&destino=<?= $v['destino'] ?>">Ver mas</a>
              </button>
            </div>
          </div>
        </div>
        <?php $cont = $cont+1; ?>
        <?php if ($cont == 4) break; ?>
        <?php } ?>
      </div>

    <?php }else{ ?>

      <div class="row w-100 p-2 m-0 text-center">
        <h1>Destacados</h1>
      </div>

      <div class="row w-100 m-0 p-0">
        <?php $cont=0; ?>
        <?php foreach($this->vuelos_precio_minimo as $v){ ?>
        <div class="col-3 m-0 p-4">
          <div class="card bg-light border border-3 border-primary rounded p-1">
            <div class="card-header bg-primary text-white" style="text-align:center">
                <h2><strong><?= $v['destino'] ?></strong></h2>
            </div>
            <div class="card-body text-black" style="text-align:center;">
              <p><strong>Saliendo desde: <?= $v['origen'] ?></strong></p>
              <p><strong>Precio desde: <?= $v['precio_minimo'] ?></strong></p>
            </div>
            <div class="card-footer bg-primary" style="text-align:center">
              <button type="button" class="btn btn-outline-dark w-75 p-1" name="button">
                <a style="text-decoration:none; color:white;" href="../controllers/resultado_busqueda.php?origen=<?= $v['origen'] ?>&destino=<?= $v['destino'] ?>">Ver mas</a>
              </button>
            </div>
          </div>
        </div>
        <?php $cont = $cont+1; ?>
        <?php if ($cont == 4) break; ?>
        <?php } ?>
      </div>

    <?php } ?>
  </div>

  <?php require '../html/Footer.php'; ?>

</body>
</html>
