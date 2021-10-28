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
      <div class="d-grid gap-2" style="background-color: white">
        <button class="btn btn-lg btn-primary"  type="button" style="font-size:50px"disabled >Favoritos</button>
      </div>
      <div style=" display:flex;">
        <?php foreach($this->favoritos as $fav){ ?>
          <div class="card text-white bg-primary mb-3" style="margin:10px;">
          <div class="card-header" style="text-align:center"><h3>Destino</h3></div>
          <h2 class="card-title" style="text-align:center"><?= $fav['destino'] ?></h2>

          <div class="card-body">
          <p>Saliendo desde: <?= $fav['origen'] ?></p>
          <p>Precio: <?= $fav['precio'] ?></p>
          </div>
          <button type="button" class="btn btn-primary my-2 my-sm-0" name="button">
            <a style="display:block" href="../controllers/resultado_busqueda.php?origen=<?= $fav['origen'] ?>&destino=<?= $fav['destino'] ?>">Ver mas</a>
          </button>
          </div>
        <?php } ?>
      </div>

        <div class="d-grid gap-2" style="background-color: white">
          <button class="btn btn-lg btn-primary"  type="button" style="font-size:50px"disabled >Destacados</button>
        </div>
        <div style=" display:flex;">
          <?php foreach($this->vuelos_precio_minimo as $v){ ?>
              <div class="card text-white bg-primary mb-3" style="margin:10px;">
              <div class="card-header" style="text-align:center"><h3>Destino</h3></div>
              <h2 class="card-title" style="text-align:center"><?= $v['destino'] ?></h2>
              <div class="card-body">
              <p>Saliendo desde: <?= $v['origen'] ?></p>
              <p>Precio desde: <?= $v['precio_minimo'] ?></p>
              </div>
              <button type="button" class="btn btn-primary my-2 my-sm-0" name="button">
                <a style="display:block" class="navbar-brand" href="../controllers/resultado_busqueda.php?origen=<?= $v['origen'] ?>&destino=<?= $v['destino'] ?>">Ver mas</a>
              </button>
            </div>
          <?php } ?>
          </div>


    <?php }else{ ?>
      <div class="d-grid gap-2" style="background-color: white">
        <button class="btn btn-lg btn-primary"  type="button" style="font-size:50px"disabled >Destacados</button>
      </div>
      <div style=" display:flex;">
        <?php foreach($this->vuelos_precio_minimo as $v){ ?>
          <div class="card text-white bg-primary mb-3" style="margin:10px;">
            <div class="card-header" style="text-align:center"><h3>Destino</h3></div>

            <h2 class="card-title"style="text-align:center"><?= $v['destino'] ?></h2>

            <div class="card-body">
            <p>Saliendo desde: <?= $v['origen'] ?></p>
            <p>Precio desde: <?= $v['precio_minimo'] ?></p>
            </div>
            <button type="button" class="btn btn-primary my-2 my-sm-0" name="button">
              <a style="display:block" class="navbar-brand" href="../controllers/resultado_busqueda.php?origen=<?= $v['origen'] ?>&destino=<?= $v['destino'] ?>">Ver mas</a>
            </button>
          </div>
          <?php } ?>
      </div>


    <?php } ?>
  </div>

  <?php require '../html/Footer.php'; ?>

</body>
</html>
