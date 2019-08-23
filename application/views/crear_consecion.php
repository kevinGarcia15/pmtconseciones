<?php
defined('BASEPATH') OR exit('No direct script access allowed');
$mensaje = isset($mensaje) ? $mensaje : "";
?><!DOCTYPE html>
<html lang="en">
<head>
	<?php $this->load->view('header'); ?>
	<title>Ingresar Conseción</title>
</head>
<body>

<div id="container">
	<?php $this->load->view('menu'); ?>
	<header>
		<h1><img width="70" src="<?=$base_url?>/recursos/img/logo.png"/> Ingreso de conseción</h1>
	</header>

	<div  id="body">
		<form  id="subir" action="<?=$base_url?>/consecion/crear/" method="POST">
			<h1>Ingreso de datos de la conseción</h1>
			<table class="table table-bordered" border="1">
				<tr>
					<td><strong>Ingrese No. de la consecion<strong style="color: red; font-size: 20px">*</strong></strong></td>
					<td>
						<input type="number" class="form-control" placeholder="numero" name="numero_consecion" min="100" required value="<?=$numero_consecion?>">
					</td>
				</tr>
				<tr>
					<td><strong>Seleccionar la ruta que cubre</strong></td>
					<td>
						<select class="custom-select" name="ruta_id_ruta">
							<?php foreach ($ruta as $key) {?>
							<option value="<?php echo $key['id_ruta']; ?>"><?php echo $key['nombre']; ?></option>
							<?php	} ?>
						</select>Ingresar ruta nueva
						<!-- Boton que activa la ventana emergente-->
						<img type="button" data-toggle="modal" data-target="#exampleModal" data-whatever="@mdo" src="<?=$base_url?>/recursos/img/plus.png" style="width: 24px;" alt=""><br>

					</td>
				</tr>
				<tr>
					<td><strong>Ingrese una descripción</strong></td>
					<td>
						<textarea class="form-control" id="message-text" name="descripcion" value="<?php $descripcion ?>"></textarea>
					</td>
				</tr>
				</tr>
				<?php
					 echo '<b>Datos form1</b>';
					 print_r($this->session->userdata());
					 echo '<pre>';
				?>
			</table>
			<td colspan="2">
				<input class="btn btn-primary btn-md" type="submit" role="button" name="finalizar" value="Finalizar">
				<input class="btn btn-danger btn-md"  role="button" onclick="mensaje()"  name="cancelar" value="Cancelar">
			</td>
		</form>
		<!-- inicio del formulario emergente-->
		<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
			<div class="modal-dialog" role="document">
				<div class="modal-content">
					<div class="modal-header">
						<h5 class="modal-title" id="exampleModalLabel" style="color:white;">Crear Ruta</h5>
						<button type="button" class="close" data-dismiss="modal" aria-label="Close">
							<span aria-hidden="true">&times;</span>
						</button>
					</div>
					<div class="modal-body">
						<form id="subir" action="<?=$base_url?>/consecion/crearRuta/" method="POST">
							<div class="form-group">
								<label for="recipient-name" class="col-form-label" style="color:white;">Ingrese nombre de la ruta</label>
								<input type="text" class="form-control" id="recipient-name" name="ruta" value="<?php $rut ?>">
							</div>
							<div class="form-group">
								<label for="message-text" class="col-form-label" style="color:white;">ingrese una descripción</label>
								<textarea class="form-control" id="message-text" name="descripcion" value="<?php $descripcion ?>"></textarea>
							</div>
							<div class="modal-footer">
								<button type="button" class="btn btn-secondary" data-dismiss="modal" style="color:white;">Cerrar</button>
								<button  type="submit" class="btn btn-primary" name="guardar" value="Guardar" style="color:white;">Guardar</button>
								<?php $ruta ?>
							</div>
						</form>
					</div>
				</div>
			</div>
		</div>
		<!-- Fin ventana emergente-->
		<?php $mensaje ?>
		<div class="label label-danger label-md" onclick="$(this).hide(1000)"><?=$mensaje?></div>
	</div>

	<footer><?php $this->load->view('footer') ?></footer>
</div>

</body>


<script type="text/javascript">
function mensaje(){
	// confirm dialog
alertify.confirm("¿Está seguro de omitir?", function (e) {
		if (e) {
			document.getElementById("subir").submit(); //Sube el documento
		}else{
		}
	});
}
</script>
</html>
