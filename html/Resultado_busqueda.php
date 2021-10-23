<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
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
