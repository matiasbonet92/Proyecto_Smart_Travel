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
  <body style="background-image: url('../media/back.jpg');background-repeat: no-repeat;background-attachment: fixed;background-size: cover;">

    <?php require ('../html/HeaderAdmin.php'); ?>

    <div class="body">

      <div class="row w-100 m-0 p-1">
        <?php if (isset($this->empresas)) { ?>

          <?php if(isset($this->resultado)){ ?>
            <div class="alert alert-dismissible alert-warning" style="width:100%">
              <button type="button" id="BTN" class="btn-close" data-bs-dismiss="alert"></button>
              <h4 class="alert-heading">Aviso</h4>
              <p class="mb-0"><?= htmlentities($this->resultado) ?></p>
            </div>
            <script type="text/javascript">
              setTimeout(() => { document.getElementById("BTN").click(); }, 5000);
            </script>
          <?php } ?>

          <div class="row w-100 m-0 mt-3 p-2 text-center">
            <div class="col-9">
                <h2>Listado de Empresas</h2>
            </div>
            <div class="col-3">
              <button type="button" class="btn btn-outline-success" name="button">
                <a href="../controllers/agregarEmpresa.php" style="color: black; text-decoration: none; font-size: 16px;">Agregar Empresa
                  <img src="../media/plus.png" alt="" width="30px" height="30px">
                </a>
              </button>
            </div>
          </div>
          <div class="row w-100 m-0 p-0 mt-2">
            <table class="table table-hover table-dark">
              <thead>
                <tr>
                  <th scope="col">ID</th>
                  <th scope="col">Nombre</th>
                  <th scope="col">Contacto</th>
                  <th scope="col">Direccion</th>
                  <th scope="col">Vuelos</th>
                  <th scope="col">Editar</th>
                  <th scope="col">Eliminar</th>
                </tr>
              </thead>
              <?php foreach ($this->empresas as $empresa) { ?>

                <tbody>
                  <tr class="table-primary">
                    <th scope="row"><?= htmlentities($empresa['id_empresa']) ?></th>
                    <td><?= htmlentities($empresa['nombre']) ?></td>
                    <td><?= htmlentities($empresa['contacto']) ?></td>
                    <td><?= htmlentities($empresa['direccion']) ?></td>
                    <td>
                      <button type="button" class="btn btn-outline-primary" name="button">
                        <a href="../controllers/administrador.php?id_empresa=<?= htmlentities($empresa['id_empresa']) ?>">
                          <img src="../media/vuelo.png" alt="" width="30px" height="30px">
                        </a>
                      </button>
                    </td>
                    <td>
                      <button type="button" class="btn btn-outline-warning" name="button">
                        <a href="../controllers/editarEmpresa.php?id_empresa=<?= htmlentities($empresa['id_empresa']) ?>">
                          <img src="../media/boligrafo.svg" alt="" width="30px" height="30px">
                        </a>
                      </button>
                    </td>
                    <td>
                      <button type="button" class="btn btn-outline-danger" name="button">
                        <a href="../controllers/eliminarEmpresa.php?id_empresa=<?= htmlentities($empresa['id_empresa']) ?>">
                          <img src="../media/eliminar.svg" alt="" width="30px" height="30px">
                        </a>
                      </button>
                    </td>
                  </tr>
                </tbody>

              <?php } ?>
            </table>
          </div>

        <?php }elseif (isset($this->vuelos_empresa)) { ?>

          <?php if(isset($this->resultado)){ ?>
            <div class="alert alert-dismissible alert-warning" style="width:100%">
              <button type="button" id="BTN" class="btn-close" data-bs-dismiss="alert"></button>
              <h4 class="alert-heading">Aviso</h4>
              <p class="mb-0"><?= htmlentities($this->resultado) ?></p>
            </div>
            <script type="text/javascript">
              setTimeout(() => { document.getElementById("BTN").click(); }, 5000);
            </script>
          <?php } ?>

          <div class="row w-100 m-0 mt-3 p-2 text-center">
            <div class="col-6">
              <?php foreach ($this->nombre_empresa as $nombre) { ?>
                <h2>Listado de Vuelos de <?= htmlentities($nombre['nombre']) ?></h2>
              <?php } ?>
            </div>
            <div class="col-3">
              <button type="button" class="btn btn-outline-success" name="button">
                <a href="../controllers/agregarVuelo.php?id_empresa=<?= htmlentities($this->id_empresa) ?>" style="color: black; text-decoration: none; font-size: 16px;">Agregar Vuelo
                  <img src="../media/plus.png" alt="" width="30px" height="30px">
                </a>
              </button>
            </div>
            <div class="col-3">
              <button type="button" class="btn btn-outline-primary" name="button">
                <a href="../controllers/administrador.php" style="color: black; text-decoration: none;">Volver a Empresas
                  <img src="../media/aeropuerto.png" alt="" width="30px" height="30px">
                </a>
              </button>
            </div>
          </div>

          <div class="row w-100 m-0 p-0 mt-2">
            <table class="table table-hover table-dark w-100">
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
                  <th scope="col">Editar</th>
                  <th scope="col">Eliminar</th>
                </tr>
              </thead>
              <?php foreach ($this->vuelos_empresa as $vuelos) { ?>

                <tbody>
                  <tr class="table-active table-light">
                    <th scope="row"><?= htmlentities($vuelos['id_vuelos']) ?></th>
                    <td><?= htmlentities($vuelos['nombre']) ?></td>
                    <td><?= htmlentities($vuelos['origen']) ?></td>
                    <td><?= htmlentities($vuelos['fecha_origen']) ?></td>
                    <td><?= htmlentities($vuelos['destino']) ?></td>
                    <td><?= htmlentities($vuelos['fecha_destino']) ?></td>
                    <td><?= htmlentities($vuelos['precio']) ?></td>
                    <td><?= htmlentities($vuelos['descripcion_vuelo']) ?></td>

                    <td>
                      <button type="button" class="btn btn-outline-warning" name="button">
                        <a href="../controllers/editarVuelo.php?id_vuelo=<?= htmlentities($vuelos['id_vuelos']) ?>&id_empresa=<?= htmlentities($vuelos['id_empresa']) ?>">
                          <img src="../media/boligrafo.svg" alt="" width="30px" height="30px">
                        </a>
                      </button>
                    </td>
                    <td>
                      <button type="button" class="btn btn-outline-danger" name="button">
                        <a href="../controllers/eliminarVuelo.php?id_vuelo=<?= htmlentities($vuelos['id_vuelos']) ?>&id_empresa=<?= htmlentities($vuelos['id_empresa']) ?>">
                          <img src="../media/eliminar.svg" alt="" width="30px" height="30px">
                        </a>
                      </button>
                    </td>

                  </tr>
                </tbody>

              <?php } ?>
            </table>
          </div>

        <?php } ?>

      </div>
    </div>

    <?php require ('../html/Footer.php'); ?>

  </body>
</html>
