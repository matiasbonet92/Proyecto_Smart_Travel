<div class="header">
  <a href="../controllers/principal.php">
    <img src="../media/fondo.jpg" style="max-width: 100%">
    </a>
    <?php if (!isset($_SESSION['id_login'])) { ?>

      <nav class="navbar navbar-expand-lg navbar-dark bg-primary">
        <div class="container-fluid"  >
          <div class="row w-100">
            <div class="col-9"></div>
            <div class="col-3 text-end">
              <button type="button" class="btn btn-info m-0 p-1 px-4" name="button">
                <a class="navbar-brand m-0 p-0" style="font-size: 18px;" href="#">Centro de Ayuda</a>
              </button>
              <button type="button" class="btn btn-success m-0 p-1 px-4" name="button">
                <a class="navbar-brand m-0 p-0" style="font-size: 18px;" href="../controllers/login.php">Login</a>
              </button>
            </div>
          </div>
        </div>
      </nav>

    <?php }else{ ?>

      <nav class="navbar navbar-expand-lg navbar-dark bg-primary m-0 p-0 w-100">
          <div class="row w-100 p-1 m-0">

            <div class="col-1 p-0 m-0 ps-3">
              <ul class="navbar-nav">
                <li class="nav-item dropdown">
                  <a class="nav-link dropdown-toggle" data-bs-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">Menu</a>
                  <div class="dropdown-menu">
                    <a class="dropdown-item" href="../controllers/perfil.php">Mi perfil</a>
                    <div class="dropdown-divider"></div>
                    <a class="dropdown-item" href="../controllers/misviajes.php">Mis Viajes</a>
                    <div class="dropdown-divider"></div>
                    <a class="dropdown-item" href="../controllers/misreclamos.php">Mis Reclamos</a>
                    <div class="dropdown-divider"></div>
                    <a class="dropdown-item" href="../controllers/misfavoritos.php">Mis Favoritos</a>
                  </div>

                </li>
              </ul>
            </div>

            <div class="col-8 m-0 p-0">
              <h3 style="color:white; text-align: center;">Bienvenido/a <?= $_SESSION['nombre'] ?></h3>
            </div>

            <div class="col-3 m-0 p-0 ps-5">
              <button type="button" class="btn btn-info m-0 p-1 px-4" name="button">
                <a class="navbar-brand m-0 p-0" style="font-size: 18px;" href="#">Centro de Ayuda</a>
              </button>
              <button type="button" class="btn btn-danger m-0 p-1 px-4" name="button">
                <a class="navbar-brand m-0 p-0" style="font-size: 18px;" href="../controllers/logout.php">Salir</a>
              </button>
            </div>

          </div>
      </nav>

    <?php } ?>
  </div>
