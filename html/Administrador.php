<!DOCTYPE html>
<html >
  <head>
    <meta charset="utf-8">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
    <link rel="stylesheet" type="text/css" href="../css/bootstrap.css">
    <title>SMART TRAVEL - Admin</title>
    <link rel="icon" type="image/png" href="../media/logo.png">
  </head>
  <body>

    <?php require ('../html/HeaderAdmin.php'); ?>

    <div class="body">

      <div class="row w-100 m-0 p-1">
        <?php if (isset($this->empresas)) { ?>

          <div class="row w-100 m-0 mt-3 p-2 text-center">
            <h2>Listado de Empresas</h2>
          </div>

          <?php foreach ($this->empresas as $empresa) { ?>

            <div class="col-4 w-25 h-100 text-center p-5">
              <button type="button" class="btn btn-outline-primary" name="button">
                <a href="../controllers/administrador.php?id_empresa=<?= $empresa['id_empresa'] ?>" style="color: black; text-decoration: none;"><?= $empresa['nombre'] ?></a>
              </button>
            </div>

          <?php } ?>

          <div class="col-4 w-25 h-100 text-center p-5">
            <button type="button" class="btn btn-outline-primary" name="button">
              <a href="#" style="color: black; text-decoration: none;">Nueva Empresa</a>
            </button>
          </div>

        <?php }elseif (isset($this->vuelos_empresa)) { ?>

          <div class="row w-100 m-0 mt-3 p-2 text-center">
            <h2>Listado de Vuelos</h2>
          </div>

            <table class="table table-hover w-100">
              <thead>
                <tr>
                  <th scope="col">ID</th>
                  <th scope="col">Nombre</th>
                  <th scope="col">Origen</th>
                  <th scope="col">Fecha Origen</th>
                  <th scope="col">Destino</th>
                  <th scope="col">Fecha Destino</th>
                  <th scope="col">Precio</th>
                  <th scope="col">Descripcion Vuelo</th>
                </tr>
              </thead>
              <?php foreach ($this->vuelos_empresa as $vuelos) { ?>

                <tbody>
                  <tr class="table-active">
                    <th scope="row"><?= $vuelos['id_vuelos'] ?></th>
                    <td><?= $vuelos['nombre'] ?></td>
                    <td><?= $vuelos['origen'] ?></td>
                    <td><?= $vuelos['fecha_origen'] ?></td>
                    <td><?= $vuelos['destino'] ?></td>
                    <td><?= $vuelos['fecha_destino'] ?></td>
                    <td><?= $vuelos['precio'] ?></td>
                    <td><?= $vuelos['descripcion_vuelo'] ?></td>
                  </tr>
                </tbody>

              <?php } ?>
            </table>
            <div class="col-4 w-25 h-100 text-center p-5">
              <button type="button" class="btn btn-outline-primary" name="button">
                <a href="#" style="color: black; text-decoration: none;">Agregar Vuelo</a>
              </button>
            </div>
            <div class="col-4 w-25 h-100 text-center p-5">
              <button type="button" class="btn btn-outline-primary" name="button">
                <a href="../controllers/administrador.php" style="color: black; text-decoration: none;">Volver a Principal</a>
              </button>
            </div>

        <?php } ?>

      </div>
    </div>

    <?php require ('../html/Footer.php'); ?>

  </body>
</html>
