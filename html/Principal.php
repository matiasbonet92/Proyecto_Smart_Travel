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
    <button type="button" name="button">Boton de Login</button>
    <p>Centro de ayuda</p>
  </div>
  <div class="body">
    <form class="form-busqueda" action="../controllers/resultado_busqueda.php" method="post">
      <h2>Buscar Vuelos</h2>
      <label for="origen">Origen:</label>
      <input type="text" name="origen" placeholder="Ingrese un origen" value="">
      <label for="destino">Origen:</label>
      <input type="text" name="destino" placeholder="Ingrese un destino" value="">
      <label for="fecha">Fecha:</label>
      <input type="date" name="fecha" value="">
      <input type="submit" name="" value="Buscar">
    </form>
    <h2>Destacados</h2>
    <?php foreach($this->vuelos_precio_minimo as $v){ ?>
        <h3>Destino</h3>
        <p><?= $v['destino'] ?></p>
        <p>Saliendo desde <?= $v['origen'] ?></p>
        <p>Precio desde <?= $v['precio_minimo'] ?></p>
    <?php } ?>
  </div>
  <div class="footer">
    <p>Aca iria el pie de pagina</p>
  </div>
</body>
</html>
