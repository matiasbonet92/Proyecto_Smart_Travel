<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- <link rel="stylesheet" type="text/css" href="../css/bootstrap.css"> -->
    <title>Document</title>
</head>
<body>
  <?php require '../html/Header.php'; ?>
  
  <div class="body">
    <form class="form-busqueda" action="../controllers/resultado_busqueda.php" method="post">
      <h2>Buscar Vuelos</h2>
      <label for="origen">Origen:</label>
      <input type="text" name="origen" placeholder="Ingrese un origen" value="">
      <label for="destino">Destino:</label>
      <input type="text" name="destino" placeholder="Ingrese un destino" value="">
      <label for="fecha">Fecha:</label>
      <input type="date" name="fecha" value="">
      <label for="no-fecha">No he decidido la fecha aun:</label>
      <input type="checkbox" name="no-fecha" value="" checked>
      <input type="submit" name="" value="Buscar">
    </form>

    <?php if (isset($this->favoritos)) { ?>

        <h2>Favoritos</h2>
        <?php foreach($this->favoritos as $fav){ ?>
          <h3>Destino</h3>
          <p><?= $fav['destino'] ?></p>
          <p>Saliendo desde <?= $fav['origen'] ?></p>
          <p>Precio <?= $fav['precio'] ?></p>
          <button type="button" name="button">
            <a href="../controllers/resultado_busqueda.php?origen=<?= $fav['origen'] ?>&destino=<?= $fav['destino'] ?>">Ver mas</a>
          </button>
        <?php } ?>
            
        <h2>Destacados</h2>
        <?php foreach($this->vuelos_precio_minimo as $v){ ?>
            <h3>Destino</h3>
            <p><?= $v['destino'] ?></p>
            <p>Saliendo desde <?= $v['origen'] ?></p>
            <p>Precio desde <?= $v['precio_minimo'] ?></p>
            <button type="button" name="button">
              <a href="../controllers/resultado_busqueda.php?origen=<?= $v['origen'] ?>&destino=<?= $v['destino'] ?>">Ver mas</a>
            </button>
        <?php } ?>

    <?php }else{ ?>

      <h2>Destacados</h2>
      <?php foreach($this->vuelos_precio_minimo as $v){ ?>
          <h3>Destino</h3>
          <p><?= $v['destino'] ?></p>
          <p>Saliendo desde <?= $v['origen'] ?></p>
          <p>Precio desde <?= $v['precio_minimo'] ?></p>
          <button type="button" name="button">
            <a href="../controllers/resultado_busqueda.php?origen=<?= $v['origen'] ?>&destino=<?= $v['destino'] ?>">Ver mas</a>
          </button>
      <?php } ?>
      
    <?php } ?>
  </div>
  
  <?php require '../html/Footer.php'; ?>

</body>
</html>
