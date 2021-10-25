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
<body>
  <?php require '../html/Header.php'; ?>

  <div class="body">
    <h2>Resultados</h2>
    <button type="button" name="button">
      <a href="../controllers/principal.php">Volver a Buscar</a>
    </button>
    <?php if (is_array($this->resultado)) { ?>
      <?php foreach($this->resultado as $r){ ?>
          <h3>Destino</h3>
          <p><?= $r['destino'] ?></p>
          <p>Saliendo desde <?= $r['origen'] ?></p>
          <p>Precio <?= $r['precio'] ?></p>
          <button type="button" name="button">
            <a href="../controllers/info_vuelo.php?id_vuelo=<?= $r['id_vuelos'] ?>">Mas Informacion</a>
          </button>
          <button type="button" name="button">
            <a href="../controllers/favorito.php?id_vuelo=<?=$r['id_vuelos']?>">Favoritos</a>
          </button>
      <?php } ?>
    <?php }else{ ?>
              <h1><?= $this->resultado ?></h1>
    <?php } ?>
  </div>

  <?php require '../html/Footer.php'; ?>

</body>
</html>
