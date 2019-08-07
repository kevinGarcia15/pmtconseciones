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
				<form class="form-container" action="<?=$base_url?>/usuario/login/" method="POST">
					<div class="form-group">
						<label for="user1">Usuario</label>
						<input type="text" class="form-control" placeholder="Usuario" name="usuario">
					</div>
					<div class="form-group">
						<label for="Pasword">Contraseña</label>
						<input type="password" class="form-control" placeholder="Contraseña" name="clave" required>
					</div>
					<td colspan="2">
						<center><input type="submit" class="btn btn-info btn-md" role="button" name="login" value="Login"></center>
					</td>
				</form>
				<div class="label label-danger label-md" onclick="$(this).hide(1000)"><?=$mensaje?></div>
			</div>
		</div>
	</div>
</div>

</body>
</html>
