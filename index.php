<!DOCTYPE html>
<html lang="es">
<?php include('db/datos.php');
      session_start();?>
<?php $_SESSION['vista']='home'; ?>
<!-- header -->
	<?php echo include('elements/header.php'); ?>
<!-- header -->

<!-- lightbox -->
  <?php echo include('elements/lightbox-registro.php'); ?>
<!-- lightbox -->
<body>

	<div id="home">
		<h3>Lugar ideal para crear tu avace Programatico</h3>
		<div class="container">
			 <!-- slider -->
			     <?php echo include('elements/slider.php'); ?>
	 		 <!-- slider -->
		</div>
	</div>

</body>

<!-- footer -->
<?php echo include('elements/footer.php'); ?>
<!-- footer -->

<?php
 ?>
</html>
