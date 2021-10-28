<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
    <link rel="stylesheet" type="text/css" href="../css/bootstrap.css">
  	<title>SMART TRAVEL - Resultado de busqueda</title>
  	<link rel="icon" type="image/png" href="../media/logo.png">
</head>
<body style="background-image: url('../media/back.jpg');background-repeat: no-repeat;background-attachment: fixed;background-size: cover;">
  <?php require '../html/Header.php'; ?>

  <div class="body">
    <nav class="navbar navbar-expand-lg navbar-dark bg-primary">
    <h2 style="color:white">Resultados</h2>

    <div style="width:70%;float:right">
    <button type="button" style="float:right" class="btn btn-secondary my-2 my-sm-0" name="button">
      <a class="navbar-brand" href="../controllers/principal.php">Volver a Buscar</a>
    </button>
  </div>
    </nav>
    <?php if (is_array($this->resultado)) { ?>
      <?php foreach($this->resultado as $r){ ?>
        <nav class="navbar navbar-expand-lg navbar-dark bg-primary">
          <div class="izq">
          <h3 style="color:white">Destino</h3>
          <p style="color:white"><?= $r['destino'] ?></p>
          <p style="color:white">Saliendo desde: <?= $r['origen'] ?></p>
          <p style="color:white">Precio: <?= $r['precio'] ?></p>
          <button type="button" class="btn btn-secondary my-2 my-sm-0" name="button">
            <a class="navbar-brand" href="../controllers/info_vuelo.php?id_vuelo=<?= $r['id_vuelos'] ?>">Mas Informacion</a>
          </button>
          <button type="button" class="btn btn-secondary my-2 my-sm-0" name="button">
            <a class="navbar-brand" href="../controllers/favorito.php?id_vuelo=<?=$r['id_vuelos']?>">Favoritos</a>
          </button>
        </div>
        </nav>
      <?php } ?>
    <?php }else{ ?>
              <div class="alert alert-dismissible alert-warning" style="width:100%">
              <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
              <h1 class="alert-heading"><?= $this->resultado ?></h1>
              </div>
    <?php } ?>
  </div>

  <?php require '../html/Footer.php'; ?>

</body>
</html>
