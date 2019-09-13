<?php
defined('BASEPATH') OR exit('No direct script access allowed');
$mensaje = isset($mensaje) ? $mensaje : "";
?><!DOCTYPE html>
<html lang="en">
<head>
	<?php $this->load->view('header'); ?>
	<title>Ingresar Contratista</title>
</head>
<body>

<div id="container">
	<?php $this->load->view('menu'); ?>
	<header>
		<h1><img width="70" src="<?=$base_url?>/recursos/img/logo.png"/> Actualización de datos</h1>
	</header>

	<div  id="body">
		<form  id="subir" action="<?=$base_url?>/contratista/editar" method="POST">
			<?php foreach ($arr as $a) {?>

			<table class="table table-bordered" border="1">
				<tr>
					<td><strong>Ingrese No. de documento DPI<strong style="color: red; font-size: 20px">*</strong></strong></td>
					<td>
						<input  type="number" class="form-control"
							placeholder="CUI" name="CUI_contratista" min="999999999999" max="9999999999999" required
							value="<?php echo $a['cui']?>">
					</td>
				</tr>
				<tr>
					<td><strong>Nombre<strong style="color: red; font-size: 20px">*</strong></strong></td>
					<td>
						<input id="names" type="text" class="form-control" placeholder="Nombre" name="nombre_contratista"
							required maxlength="50" size="50" value="<?php echo $a['nombre_con'];  ?>">
					</td>
				</tr>
				<tr>
					<td><strong>Apellido<strong style="color: red; font-size: 20px">*</strong></strong></td>
					<td>
						<input id="names" style="text-transform: capitalize;"type="text" class="form-control" placeholder="Apellido" name="apellido_contratista"
							required maxlength="50" size="50"  value="<?php echo $a['apellido']; ?>">
					</td>
				</tr>
				<tr>
					<td><strong>Fecha de nacimiento<strong style="color: red; font-size: 20px">*</strong></strong></td>
					<td>
						<input id="fecha" onchange="validarFecha()" type="date" class="form-control" name="fecha_nacimiento_contratista"
							 required value="<?php echo $a['fecha_nacimiento']; ?>">
					</td>
				</tr>
				<tr>
					<td><strong>Números de teléfono</strong></td>
					<td>
						<input type="number" required class="form-control" min="10000000" max="99999999" placeholder="Número de teléfono" name="telefono_contratista"
					 		value="<?php echo $a['telefono'];?>"><br>
						<input type="number" class="form-control" min="10000000" max="99999999" placeholder="ingrese otro número (opcional)" name="telefono2_contratista"
						 value="<?php echo $a['telefono2'];?>">
					</td>
				</tr>
				<tr>
					<td><strong>Seleccionar Municipio</strong></td>
					<td>
						<select class="custom-select" name="municipio" >
							<?php foreach ($municipio as $key) {?>
								<?php if ($a['municipio_id_municipio'] == $key['id_municipio']){ ?>
									<option selected value="0">Seleccionar</option>
								<?php }else{ ?>
									<option  value="<?php echo $key['id_municipio']; ?>"><?php echo $key['nombre_mun']; ?></option>
								<?php } ?>
							<?php	} ?>
						</select>
					</td>
				</tr>
				<tr>
					<td><strong>Seleccionar Aldea o Caserío</strong></td>
					<td>
						<select class="custom-select" name="aldea" id="aldea">
							<?php foreach ($aldea as $key) {?>
								<?php if ($a['aldea_contra'] == $key['id_canton_aldea']){ ?>
									<option selected value="<?php echo $key['id_canton_aldea']; ?>"><?php echo $key['nombre']; ?></option>
									<?php }else{ ?>
									<option  value="<?php echo $key['id_canton_aldea']; ?>"><?php echo $key['nombre']; ?></option>
								<?php } ?>
							<?php	} ?>
						</select>
					</td>
				</tr>
				<tr>
					<td><strong>Ingrese lugar de domicilio<strong style="color: red; font-size: 20px">*</strong></strong></td>
					<td>
						<input type="text" class="form-control" placeholder="Domicilio" name="domicilio_contratista"
							 required value="<?php echo $a['domicilio'];?>">
					</td>
				</tr>
				</tr>
			</table>
			<td colspan="2">
				<input class="btn btn-primary btn-md"  role="button"  type="submit" required name="actualizar" value="Actualizar">
				<input class="btn btn-danger btn-md"  role="button"  type="submit"  name="cancelar" value="Cancelar">
				<input  type="hidden"  name="id_persona" value="<?=$a['id_persona']?>">
				<input  type="hidden"  name="id_contratista" value="<?=$a['id_contratista']?>">
				<input  type="hidden"  name="id_consecion" value="<?=$a['id_consecion']?>">
			</td>
			<?php  }?>
		</form>
		<?php $mensaje ?>
		<div class="label label-danger label-md" onclick="$(this).hide(1000)"><?=$mensaje?></div>
	</div>
	<hr><hr><hr>
	<footer><?php $this->load->view('footer') ?></footer>
</div>
</body>


<script type="text/javascript">
function validarFecha()
{
	var hoy = new Date();
	let fecha_form_usuario = document.getElementById('fecha').value;
	let fecha_form = new Date(fecha_form_usuario);

// Comparamos solo las fechas => no las horas!!
hoy.setHours(0,0,0,0);  // Lo iniciamos a 00:00 horas

if (fecha_form >= hoy) {
  alert('Fecha no valida');
	  document.getElementById("fecha").value = "";
}
else {

}
}

</script>
</html>
