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
    <h2>Resultados</h2>
    <?php foreach($this->resultado as $r){ ?>
        <h3>Destino</h3>
        <p><?= $r['destino'] ?></p>
        <p>Saliendo desde <?= $r['origen'] ?></p>
        <p>Precio <?= $r['precio'] ?></p>
    <?php } ?>
  </div>
  <div class="footer">
    <p>Aca iria el pie de pagina</p>
  </div>
</body>
</html>
