<?php
defined('BASEPATH') OR exit('No direct script access allowed');
$mensaje = isset($mensaje) ? $mensaje : "";

$corredores_Femeninas = 0;
$corredores_Masculino = 0;
$corredores_Libre = 0;
$NombreRama = array();
$Valores = array();

foreach ($arr as $a) {
	if ($a['Rama'] == 'Femenina') {
		$corredores_Femeninas = $corredores_Femeninas + 1;
	}
	if ($a['Rama'] == 'Master Masculina') {
		$corredores_Masculino = $corredores_Masculino + 1;# code...
	}
	if ($a['Rama'] == 'Libre') {
		$corredores_Libre = $corredores_Libre + 1;# code...
	}
	$NombreRama[] = $a['Rama'];
}
$NombreRamaJson = json_encode($NombreRama);
$ValoresJson = json_encode($corredores_Femeninas,$corredores_Masculino,$corredores_Libre)

?><!DOCTYPE html>
<html lang="en">
<head>
	<?php $this->load->view('header'); ?>
	<title>Gráficas</title>
</head>
		<body>

		<div id="container">
			<?php $this->load->view('menu'); ?>
			<header>
				<h1><img width="70" src="<?=$base_url?>/recursos/img/cor.png"/>Gráficas</h1>
			</header>
			<div  id="body">
				<div class="container">
				  <div class="row justify-content-md-center">
						<h1 style="text-align: center;">Corredores por categoría</h1>
				    <div  class="col-md-auto">
							<div id="grafica"class="">

							</div>
				    </div>
				</div>
			</div>
			</div>
			<footer><?php $this->load->view('footer') ?></footer>
		</div>
	</body>
	<script type="text/javascript">
		function CrearCadenaJson(json){
			var parsed = JSON.parse(json);
			var arr = [];
			for (var x in parsed) {
				arr.push(parsed[x]);
			}
			return arr;
		}

			var data = [{
				values: [<?php echo $corredores_Femeninas; ?>, <?php echo $corredores_Libre; ?>, <?php echo $corredores_Masculino; ?>],
				labels: ['Femenina', 'Libre', 'Master Masculina'],
				type: 'pie'
				}];

				var layout = {
				height: 800,
				width: 1000
				};

			Plotly.newPlot('grafica', data, layout);
	</script>
</html>
