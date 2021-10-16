<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
  <div class="header">
    <p>Aca iria el logo</p>
    <button type="button" name="button">
      <a href="#">Login</a>
    </button>
    <button type="button" name="button">
      <a href="#">Centro de Ayuda</a>
    </button>
  </div>
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
  </div>
  <div class="footer">
    <p>Aca iria el pie de pagina</p>
  </div>
</body>
</html>
