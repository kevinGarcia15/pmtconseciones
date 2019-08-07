<?php
defined('BASEPATH') OR exit('No direct script access allowed');
$mensaje = isset($mensaje) ? $mensaje : "";
?><!DOCTYPE html>
<html lang="en">
<head>
	<?php $this->load->view('header'); ?>
	<title>Crear Usuario</title>
</head>
<body>

<div id="container">
	<?php $this->load->view('menu'); ?>
	<header>
		<h1><img width="70" src="<?=$base_url?>/recursos/img/2019.png"/> Crear Usuario</h1>
	</header>

	<div  id="body">
		<form  id="subir" action="<?=$base_url?>/informes/Email/" method="POST">
			<table border="1">
				<div class="form-group">
					<label for="comment">Ingrese Asunto:</label>
						<input type="text" class="form-control" placeholder="Asunto" name="asunto" required maxlength="50" size="50" value="<?=$asunto?>">
				  <label for="comment">Ingrese mensaje:</label>
				  <textarea class="form-control" rows="5" id="comment" name="mensaje" value="<?=$mensaje?>"></textarea>
				</div>
				<tr>
					<td colspan="2">
						<input onclick="mensaje()" type="submit" class="btn btn-primary btn-md" role="button" name="enviar" value="Enviar">
					</td>
					<?php echo $confirmacion; ?>
				</tr>
			</table>
		</form>
		<div class="label label-danger label-md" onclick="$(this).hide(1000)"><?=$mensaje?></div>
	</div>
	<footer><?php $this->load->view('footer') ?></footer>
</div>

</body>
<script type="text/javascript">
function mensaje(){
	// confirm dialog
alertify.confirm("¿Está seguro de enviar el mensaje?", function (e) {
		if (e) {
				document.getElementById("subir").submit();
		} else {
				// user clicked "cancel"
		}
});
}
</script>
</html>
