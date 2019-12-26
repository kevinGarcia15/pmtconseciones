<?php
defined('BASEPATH') OR exit('No direct script access allowed');
$mensaje = isset($mensaje) ? $mensaje : "";
if (count($arr) < 1) {
	$mensaje = "Sin registros!";
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
	<?php $this->load->view('header'); ?>
	<title>Lista de conseciones</title>
</head>
<body>
<div id="container">
	<?php $this->load->view('menu'); ?>
	<header>
		<h1><img width="70" src="<?=$base_url?>/recursos/img/logo.png"/>Lista de conseciones</h1>
	</header>

	<div id="body">
<div class="container">
	<div class=""><?php $total = count($arr); ?>
		<h5>EL total de <?php echo $tipo_vehiculo.' es de: '.$total ;?></h5>
	</div>
<hr><div class="table-responsive">
	<table class="table table-bordered">
		<thead>
			<?php
			foreach ($nombre_tabla as $key) {
				if ($key != "") {
					echo "<th>".$key."</th>";
				}
			}
			 ?>
		</thead>
		<tbody>
			<?php
			foreach ($arr as $a) {
				echo "<tr>";
				foreach ($nombre_tabla as $key) {
					if ($key != "") {
						echo "<td>".$a[$key];"</td>";
					}
				}
				echo "</tr>";
			}
			 ?>
		</tbody>
	</table>
</div>
    <br><a class='btn btn-primary btn-md' href="<?=$base_url?>/informes/informes">Listo</a>
	</div>
	<br><br><br><br>
	<footer><?php $this->load->view('footer') ?></footer>
</div>
<script type="text/javascript">
 </script>
</body>
</html>
