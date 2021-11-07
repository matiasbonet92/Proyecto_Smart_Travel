<div class="header">
  <a href="../controllers/principal.php">
    <img src="../media/fondo.jpg" style="max-width: 100%">
    </a>
    <?php if (isset($_SESSION['id_login'])) { ?>

      <nav class="navbar navbar-expand-lg navbar-dark bg-primary">
        <div class="container-fluid"  >
          <div class="row w-100">
            <div class="col-3">
              <button type="button" class="btn btn-info m-0 p-1 px-4" name="button">
                <a class="navbar-brand m-0 p-0" style="font-size: 18px;" href="../controllers/reclamos.php">Reclamos</a>
              </button></div>
            <div class="col-6"></div>
            <div class="col-3 text-end">
              <button type="button" class="btn btn-info m-0 p-1 px-4" name="button">
                <a class="navbar-brand m-0 p-0" style="font-size: 18px;" href="../controllers/logout.php">Salir</a>
              </button>
            </div>
          </div>
        </div>
      </nav>

    <?php } ?>
  </div>
