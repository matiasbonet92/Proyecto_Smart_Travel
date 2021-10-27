<div class="header">
    <img src="../media/fondo.jpg" style="max-width: 100%">
    <?php if (isset($_SESSION['id_login'])) { ?>

      <nav class="navbar navbar-expand-lg navbar-dark bg-primary">
        <div class="container-fluid"  >
          <div class="row w-100">
            <div class="col-9"></div>
            <div class="col-3 text-end">
              <a class="navbar-brand" href="../controllers/logout.php">Salir</a>
            </div>
          </div>
        </div>
      </nav>

    <?php } ?>
  </div>
