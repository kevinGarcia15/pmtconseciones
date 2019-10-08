<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class vehiculo_model extends CI_Model{

	//Constructor
	function __construct(){
		parent::__construct();
		$this->load->database();
	}

function seleccionarColor() {
	$sql = "SELECT id_color, color
			FROM 	color
			order by color ASC
			LIMIT 	20";

	$dbres = $this->db->query($sql);

	$rows = $dbres->result_array();

	return $rows;
}
function seleccionarTipo() {
	$sql = "SELECT id_tipo, tipo_vehiculo
			FROM 	tipo
			order by tipo_vehiculo ASC
			LIMIT 	20";

	$dbres = $this->db->query($sql);

	$rows = $dbres->result_array();

	return $rows;
}

function seleccionarMarca() {
	$sql = "SELECT id_marca, nombre
			FROM 	marca
			order by nombre ASC
			LIMIT 	20";

	$dbres = $this->db->query($sql);

	$rows = $dbres->result_array();

	return $rows;
}


function crear_color($color) {
	$sql = "INSERT INTO color(color)
			VALUES (?)";

	$valores = array($color);

	$dbres = $this->db->query($sql, $valores);

	return $dbres;
}

function seleccionarVehiculoEditar($id) {
	$sql = "SELECT c.id_consecion id_consecion,
									v.id_vehiculo, v.numero_placa placa, v.tarjeta_circulacion tarjeta_circulacion, v.modelo modelo,
									t.tipo_vehiculo tipo, col.color color, v.color_variante color_variante, m.nombre marca

									FROM 	consecion c
										join vehiculo v on v.id_vehiculo = c.vehiculo_id_vehiculo
										join tipo t on t.id_tipo = v.tipo_id_tipo
										join marca m on m.id_marca = v.marca_id_marca
										join color col on col.id_color = v.color_id_color

										where c.id_consecion = ?
										LIMIT 	1";

	$dbres = $this->db->query($sql, $id);

	$rows = $dbres->result_array();

	return $rows;
}
function actualizar_vehiculo($id,$placa, $tarjeta,$modelo,$color,$color_variante,$tipo,$marca) {
$sql = "UPDATE vehiculo
				SET modelo = '$modelo', tarjeta_circulacion = '$tarjeta', color_id_color = '$color',
				color_variante = '$color_variante', numero_placa = '$placa', tipo_id_tipo = '$tipo',
				marca_id_marca = '$marca'
				WHERE id_vehiculo = '$id'
				";

$dbres = $this->db->query($sql);
return $dbres;
}

function seleccionarPlacaVehiculo($placa) {
	$sql = "SELECT 	numero_placa
					FROM 	vehiculo
					WHERE 	numero_placa = ?
					LIMIT 1 ;";

	$dbres = $this->db->query($sql, array($placa));

	$rows = $dbres->result_array();
	return $rows;
}

function seleccionarTarjetaVehiculo($tarjeta) {
	$sql = "SELECT 	tarjeta_circulacion
					FROM 	vehiculo
					WHERE 	tarjeta_circulacion = ?
					LIMIT 1 ;";

	$dbres = $this->db->query($sql, array($tarjeta));

	$rows = $dbres->result_array();
	return $rows;
}

}
