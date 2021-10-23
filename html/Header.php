<div class="header">
    <p>Aca iria el logo</p>
    <?php if (!isset($_SESSION['id_login'])) { ?>
      <button type="button" name="button">
        <a href="../controllers/login.php">Login</a>
      </button>
      <button type="button" name="button">
        <a href="#">Centro de Ayuda</a>
      </button>
    <?php }else{ ?>
      <h2>Bienvenido/a <?= $_SESSION['nombre'] ?></h2>
      <ul>
        <li>Menu
          <ul>
            <li><a href="../controllers/perfil.php">Mi Perfil</a></li>
            <li><a href="../controllers/misviajes.php">Mis Viajes</a></li>
            <li><a href="../controllers/misfavoritos.php">Favoritos</a></li>
          </ul>
        </li>
      </ul>
      <button type="button" name="button">
        <a href="../controllers/logout.php">Salir</a>
      </button>
      <button type="button" name="button">
        <a href="#">Centro de Ayuda</a>
      </button>
    <?php } ?>
  </div>
