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

      <?php if(isset($this->resultado)){ ?>
        <div class="row w-100 m-0 p-0">
          <div class="alert alert-dismissible alert-warning m-0 w-100">
              <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
              <h4 class="alert-heading">Aviso</h4>
              <p class="mb-0"><?= htmlentities($this->resultado) ?></p>
          </div>
        </div>
      <?php } ?>

      <?php if(isset($this->reclamos)) { ?>
        <div class="row w-100 m-0 mt-3 p-2 text-center">
          <div class="col-8">
              <h2><strong>Listado de Recalmos</strong></h2>
          </div>
          <div class="col-1">
            <ul class="navbar-nav border border-1 border-dark rounded">
              <li class="nav-item dropdown">
                <a class="nav-link dropdown-toggle text-black" data-bs-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">Filtrar</a>
                <div class="dropdown-menu">
                  <a class="dropdown-item" href="../controllers/reclamos.php?filtro=asignado">Asignados</a>
                  <div class="dropdown-divider"></div>
                  <a class="dropdown-item" href="../controllers/reclamos.php?filtro=resuelto">Resueltos</a>
                  <div class="dropdown-divider"></div>
                  <a class="dropdown-item" href="../controllers/reclamos.php?filtro=todo">Todos</a>
                </div>
              </li>
            </ul>
          </div>
          <div class="col-3">
            <button type="button" class="btn btn-outline-success" name="button">
              <a href="../controllers/administrador.php" style="color: black; text-decoration: none; font-size: 16px;">Volver al Administrador
                <img src="../media/volver.png" alt="" width="30px" height="30px">
              </a>
            </button>
          </div>
        </div>

        <table class="table table-dark align-middle text-center">
          <thead>
            <tr>
              <th scope="col">ID Reclamo</th>
              <th scope="col">Asunto</th>
              <th scope="col">Descripcion</th>
              <th scope="col">Estado</th>
              <th scope="col">Resolver</th>
              <th scope="col">Eliminar</th>
            </tr>
          </thead>

          <?php foreach($this->reclamos as $r) { ?>

            <tbody>
              <tr class="table-primary">
                <th scope="row"><?= htmlentities($r['id_reclamos']) ?></th>
                <td><?= htmlentities($r['asunto']) ?></td>
                <td><?= htmlentities($r['descripcion_reclamo']) ?></td>
                <?php if (htmlentities($r['estado'])=='A'){ ?>
                  <th class="p-0 m-0 bg-warning">Asignado</th>
                  <td>
                    <button type="button" class="btn btn-outline-success" name="button">
                      <a href="../controllers/reclamos.php?resolver=<?= htmlentities($r['id_reclamos']) ?>">
                        <img src="../media/garrapata.png" alt="" width="30px" height="30px">
                      </a>
                    </button>
                  </td>
                <?php }else{ ?>
                  <th class="p-0 m-0 bg-success">Resuelto</th>
                  <td></td>
                <?php } ?>

                <td>
                  <button type="button" class="btn btn-outline-danger" name="button">
                    <a href="../controllers/reclamos.php?id_reclamos=<?= htmlentities($r['id_reclamos']) ?>">
                      <img src="../media/eliminar.svg" alt="" width="30px" height="30px">
                    </a>
                  </button>
                </td>

              </tr>
            </tbody>

          <?php } ?>
        </table>

      <?php }elseif (isset($this->mensaje)){ ?>

        <div class="alert alert-dismissible alert-warning" style="width:100%">
          <button type="button" id="BTN" class="btn-close" data-bs-dismiss="alert"></button>
          <h4 class="alert-heading">Aviso</h4>
          <p class="mb-0"><?= htmlentities($this->mensaje) ?></p>
        </div>
        <script type="text/javascript">
          setTimeout(() => { document.getElementById("BTN").click(); }, 5000);
        </script>

        <div class="row w-100 m-0 mt-3 p-2 text-center">
          <div class="col-9">
              <h2><strong>Listado de Reclamos</strong></h2>
          </div>
          <div class="col-3">
            <button type="button" class="btn btn-outline-success" name="button">
              <a href="../controllers/administrador.php" style="color: black; text-decoration: none; font-size: 16px;">Volver al Administrador
                <img src="../media/volver.png" alt="" width="30px" height="30px">
              </a>
            </button>
          </div>
        </div>

      <?php } ?>

    </div>

    <?php require('../html/Footer.php'); ?>

    </body>
</html>
