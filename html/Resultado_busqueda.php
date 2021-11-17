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
    <div class="row w-auto my-3 mx-5 p-0 border border-2 border-dark rounded">

      <div class="row w-100 p-2 m-0 text-center bg-dark">
        <h2 class="text-white"><strong>Resultados</strong></h2>
      </div>

      <div class="row w-100 m-0 p-1 text-center bg-light">
        <?php if (is_array($this->resultado)) { ?>
          <?php foreach($this->resultado as $r){ ?>
            <div class="col-4 m-0 p-4">
              <div class="card bg-light border border-3 border-primary rounded p-1">
                <div class="card-header bg-primary text-white" style="text-align:center">
                    <h2><strong><?= htmlentities($r['resultado_vuelos']['destino']) ?></strong></h2>
                </div>
                <div class="card-body text-black" style="text-align:center;">
                  <p><strong>Saliendo desde: <?= htmlentities($r['resultado_vuelos']['origen']) ?></strong></p>
                  <p><strong>Precio: $<?= htmlentities($r['resultado_vuelos']['precio']) ?></strong></p>
                  <p><strong>Quedan <?= htmlentities($r['cant_restante']) ?> lugares disponibles!</strong></p>
                </div>
                <div class="card-footer bg-primary" style="text-align:center">
                  <div class="row w-100 m-0 p-0">
                    <div class="col-10 m-0 p-1">
                      <button type="button" class="btn btn-outline-dark w-75 p-1" name="button">
                        <a style="text-decoration:none; color:white;" href="../controllers/info_vuelo.php?id_vuelo=<?= htmlentities($r['resultado_vuelos']['id_vuelos']) ?>">Mas Informacion</a>
                      </button>
                    </div>
                    <div class="col-2 m-0 p-0">
                      <button type="button" class="btn btn-warning w-75 p-1" name="button">
                        <a style="text-decoration:none; color:white;" href="../controllers/favorito.php?id_vuelo=<?= htmlentities($r['resultado_vuelos']['id_vuelos']) ?>">
                          <img src="../media/favoritos.png" alt="" width="30px" height="30px">
                        </a>
                      </button>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          <?php } ?>
        <?php }else{ ?>
                  <div class="alert alert-dismissible alert-warning" style="width:100%">
                    <button type="button" id="BTN" class="btn-close" data-bs-dismiss="alert"></button>
                    <h1 class="alert-heading"><?= htmlentities($this->resultado) ?></h1>
                  </div>
                  <script type="text/javascript">
                    setTimeout(() => { document.getElementById("BTN").click(); }, 5000);
                  </script>
        <?php } ?>
      </div>

    </div>
  </div>

  <?php require '../html/Footer.php'; ?>

</body>
</html>
