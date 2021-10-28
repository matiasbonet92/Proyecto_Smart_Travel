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
              <a class="navbar-brand" href="../controllers/login.php">Login</a>
              <a class="navbar-brand" href="#">Centro de Ayuda</a>
            </div>
          </div>
        </div>
      </nav>

    <?php }else{ ?>
      <nav class="navbar navbar-expand-lg navbar-dark bg-primary">
        <h2 style="width:30%;color:white">Bienvenido/a <?= $_SESSION['nombre'] ?></h2>

          <div  style="width:10%">
            <ul class="navbar-nav">
              <li class="nav-item dropdown">
                <a class="nav-link dropdown-toggle" data-bs-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">Menu</a>
                <div class="dropdown-menu">
                  <a class="dropdown-item" href="../controllers/perfil.php">Mi perfil</a>
                  <div class="dropdown-divider"></div>
                  <a class="dropdown-item" href="../controllers/misviajes.php">Mis Viajes</a>
                  <div class="dropdown-divider"></div>
                  <a class="dropdown-item" href="../controllers/misfavoritos.php">Favoritos</a>
                </div>
              </li>
            </ul>
          </div>

          <div style="width:55%;float:right">
            <button type="button" style="float:right" class="btn btn-secondary my-2 my-sm-0" name="button">
              <a class="navbar-brand" href="../controllers/logout.php">Salir</a>
            </button>
            <button type="button" style="float:right" class="btn btn-secondary my-2 my-sm-0" name="button">
              <a class="navbar-brand" href="#">Centro de Ayuda</a>
            </button>
        </div>
      </nav>
    <?php } ?>
  </div>
