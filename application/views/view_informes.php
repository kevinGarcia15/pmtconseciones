<?php
defined('BASEPATH') OR exit('No direct script access allowed');
$mensaje = isset($mensaje) ? $mensaje : "";
if (count($arr) < 1) {
	$mensaje = "No hay usuarios activos!";
}

$htmltrow = "<tr>
				<td>%s</td>
				<td>%s</td>
				<td>%s</td>
				<td>%s años</td>
				<td>%s</td>
				<td>%s</td>
				<td><a class='btn btn-light' href=\"${base_url}/corredor/detalles/%s\">ver mas</a></td>
				<td><a class='btn btn-secondary' href=\"${base_url}/corredor/editar/%s\">editar</a></td>
			 	</tr>";
$htmltrows = "";

$corredores_Femeninas = 0;
$corredores_Masculino = 0;
$corredores_Libre = 0;
$rama = "";

foreach ($arr as $a) {
	$htmltrows .= sprintf($htmltrow,
		$a['numero'], htmlspecialchars($a['Nombre']), htmlspecialchars($a['Rama']),htmlspecialchars($a['edad']),
		htmlspecialchars($a['pais']),$a['fecha_participacion'],$a['id_corredor'],$a['id_corredor']);

	if ($a['Rama'] == 'Femenina') {
		$corredores_Femeninas = $corredores_Femeninas + 1;
	}
	if ($a['Rama'] == 'Master Masculina') {
		$corredores_Masculino = $corredores_Masculino + 1;# code...
	}
	if ($a['Rama'] == 'Libre') {
		$corredores_Libre = $corredores_Libre + 1;# code...
	}
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
	<?php $this->load->view('header'); ?>
	<title>Nomina de corredores</title>
</head>
<body>
<div id="container">
	<?php $this->load->view('menu'); ?>
	<header>
		<h1><img width="70" src="<?=$base_url?>/recursos/img/logo.png"/>Nomina de corredores</h1>
	</header>

	<div id="body">
		<?php
			$numero  = count($arr);
		?>
		<h1 style="text-align: left; font-size: 15px">El número Total de corredores es: <?php echo $numero; ?>
			<br>
			<br>El número de corredores en la rama Femenina es de: <?php echo $corredores_Femeninas; ?>
			<br>El número de corredores en la rama Master Masculina es de: <?php echo $corredores_Masculino; ?>
			<br>El número de corredores en la rama Libre es de: <?php echo $corredores_Libre; ?>
		</h1>
<div class="container">
  <div class="row">
    <div class="col-sm-4">
			<form action="<?=$base_url?>/informes/categoria"  method="POST">
				<td><strong>Seleccione la categoría</strong></td>
					<select  class="form-control" onchange="consultaCategoría()" name="selectCategoria">
						<option value="Todos" <?php if($_POST['selectCategoria']=="Todos"){echo "selected"; $rama = "Todos";}  ?>>Todos</option>
						<option value="Libre" <?php if($_POST['selectCategoria']=="Libre"){echo "selected"; $rama = "Libre";} ?>>Libre</option>
						<option value="Femenina" <?php if($_POST['selectCategoria']=="Femenina"){echo "selected";$rama = "Femenina";} ?>>Femenina</option>
						<option value="Master Masculina" <?php if($_POST['selectCategoria']=="Master Masculina"){echo "Master Masculina";} ?>>Master Masculina</option>
					</select>
    </div>
    <div class="col-sm-2"><br>
			<input type="submit" class="btn btn-default btn-xs" role="button" name="BtnCategoria" value="Ir">
			</form>
    </div>
    <div class="col-sm">
    </div>
  </div>
</div>
<hr><div class="table-responsive">
	<table class="table table-bordered">
		<thead>
			<th>Número del Atleta</th>
			<th>Nombre</th>
			<th>Categoría</th>
			<th>Edad</th>
			<th>País</th>
			<th>Año de participación</th>
			<th>Detalle</th>
			<th>Actualizar</th>
		</thead>
		<tbody>
			<?=$htmltrows?>
		</tbody>
	</table>
</div>
    <br><a class='btn btn-primary btn-md' href="<?=$base_url?>/informes/descargar?rama=<?php echo $rama; ?>">Descargar</a>
		<a class='btn btn-primary btn-md' href="<?=$base_url?>/informes/Email">Enviar correo invitación</a>
    <div class="label label-danger label-md" onclick="$(this).hide(1000)"><?=$mensaje?></div>
	</div>
	<footer><?php $this->load->view('footer') ?></footer>
</div>
<script type="text/javascript">
	function consultaCategoría(){
		document.getElementById("selectCategoria").submit();
	}
 </script>
</body>
</html>
