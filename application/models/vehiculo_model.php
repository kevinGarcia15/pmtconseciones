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

}
