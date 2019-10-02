<?php
defined('BASEPATH') OR exit('No direct script access allowed');
$mensaje = isset($mensaje) ? $mensaje : "";
?><!DOCTYPE html>
<html lang="en">
<head>
	<?php $this->load->view('header'); ?>

	<title>Autenticación</title>
</head>
<body>
<div id="container">
	<?php $this->load->view('menu'); ?>

		<br>
	<header>
		<center><h3 style="color: black"><img width="70" src="<?=$base_url?>/recursos/img/logo.png"/>PMT Totonicapán</h3></center>
	</header>
	<br><hr><br>
	<div class="abs-center">
		<div id="container-fluid bg">
			<div class="row">
				<form class="form-container" action="<?=$base_url?>/usuario/enviarEmail/" method="POST">
					<div class="form-group">
						<label for="user1" id="email">Ingrese Corrreo electronico</label>
						<input type="email" required class="form-control" placeholder="E-mail" name="email">
					</div>
					<div class="form-group">
						<label for="user1" id="email">Ingrese su numero de DPI</label>
						<input min="1000000000000" max="9999999999999" type="number" class="form-control" placeholder="CUI" name="CUI" required value="">
					</div>
					<td colspan="2">
						<center><input type="submit" class="btn btn-info btn-md" role="button" name="Enviar" value="Enviar"></center>
						<?php if (isset($boton)) {echo $boton;}?>
					</td>
					<?php echo $mensaje; ?>
				</form>
			</div>
		</div>
	</div>
</div>
</body>
<script type="text/javascript">

</script>
</html>
