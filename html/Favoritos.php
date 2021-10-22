<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<title>favoritos</title>
</head>
<body>

	<?php require('../html/Header.php'); ?>

	<div class="body">
		<h2>Favoritos</h2>
		<?php if(isset($this->favoritos)) { ?>
			<?php foreach($this->favoritos as $fav) { ?>
				<h3>Destino</h3>
	            <p><?= $fav['destino'] ?></p>
	            <p>Saliendo desde <?= $fav['origen'] ?></p>
	            <p>Precio <?= $fav['precio'] ?></p>
	            <button type="button" name="button">
	              <a href="../controllers/resultado_busqueda.php?origen=<?= $fav['origen'] ?>&destino=<?= $fav['destino'] ?>">Ver mas</a>
	            </button>
	            <button type="button" name="button">
	              <a href="../controllers/misfavoritos.php?dni=<?= $fav['dni'] ?>&id_vuelo=<?= $fav['id_vuelos'] ?>">Eliminar</a>
	            </button>
			<?php } ?>
		<?php }elseif(isset($this->mensaje)){ ?> 
			<h2><?= $this->mensaje ?></h2>
		<?php } ?>
		<br><br><button type="button" name="button">
	      <a href="../controllers/principal.php">Volver a Principal</a>
	    </button>
	</div>

	<?php require('../html/Footer.php'); ?>

</body>
</html>