<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class conductor_model extends CI_Model{

	//Constructor
	function __construct(){
		parent::__construct();
		$this->load->database();
	}

function seleccionarLicencia() {
	$sql = "SELECT id_tipo, tipo
			FROM 	tipo_licencia
			order by tipo ASC
			LIMIT 	10";

	$dbres = $this->db->query($sql);

	$rows = $dbres->result_array();

	return $rows;
}
	function crear_conductor($licencia,$domicilio, $telefono,$id_persona,$id_tipo_licencia,$aldea_id_aldea,$id_ayudante) {
		$sql = "INSERT INTO piloto(numero_licencia, domicilio, telefono,persona_id_persona,
																	tipo_licencia_id_tipo, canton_aldea_id_canton_aldea,
																	ayudante_id_ayudante)
				VALUES (?, ?, ?, ?, ?, ?, ?)";

		$valores = array($licencia,$domicilio, $telefono,$id_persona,$id_tipo_licencia,$aldea_id_aldea,$id_ayudante);

		$dbres = $this->db->query($sql, $valores);

		return $dbres;
	}
	function seleccionar_id_conductor() {
			$sql = "SELECT MAX(id_piloto) as id_piloto FROM piloto
							LIMIT 	1";

			$dbres = $this->db->query($sql);

			$rows = $dbres->result_array();

			return $rows[0]['id_piloto'];
		}
}
