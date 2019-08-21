<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class ayudante_model extends CI_Model{

	//Constructor
	function __construct(){
		parent::__construct();
		$this->load->database();
	}

function seleccionarAldea($id) {
	$sql = "SELECT id_canton_aldea, nombre
			FROM 	canton_aldea
			where municipio_id_municipio = ?
			order by nombre ASC
			LIMIT 	100";

	$dbres = $this->db->query($sql, $id);

	$rows = $dbres->result_array();

	return $rows;
}

function seleccionarMunicipio() {
	$sql = "SELECT id_municipio, nombre_mun
			FROM 	municipio
			order by nombre_mun ASC
			LIMIT 	500";

	$dbres = $this->db->query($sql);

	$rows = $dbres->result_array();

	return $rows;
}

	function crear_persona($nombre,$apellido, $fecha_nacimiento) {
		$sql = "INSERT INTO persona(nombre,apellido,fecha_nacimiento)
				VALUES (?, ?, ?)";

		$valores = array($nombre,$apellido, $fecha_nacimiento);

		$dbres = $this->db->query($sql, $valores);

		return $dbres;
	}
	function seleccionar_id_persona() {
			$sql = "SELECT MAX(id_persona) as id_persona FROM persona
							LIMIT 	1";

			$dbres = $this->db->query($sql);

			$rows = $dbres->result_array();

			return $rows[0]['id_persona'];
		}

		function seleccionar_id_ayudante() {
				$sql = "SELECT MAX(id_ayudante) as id_ayudante FROM ayudante
								LIMIT 	1";

				$dbres = $this->db->query($sql);

				$rows = $dbres->result_array();

				return $rows[0]['id_ayudante'];
			}



function crear_ayudante($telefono_ayudante,$cui, $domicilio_ayudante, $persona_id_persona, $aldea_id_aldea) {
	$sql = "INSERT INTO ayudante(telefono,cui,domicilio,persona_id_persona,canton_aldea_id_canton_aldea)
			VALUES (?, ?, ?, ?, ?)";

	$valores = array($telefono_ayudante,$cui, $domicilio_ayudante, $persona_id_persona, $aldea_id_aldea);

	$dbres = $this->db->query($sql, $valores);

	return $dbres;
}

	function seleccionarCuiContratista($CUI) {
		$sql = "SELECT 	c.id_ayudante,c.cui,c.telefono, c.domicilio, p.nombre, p.apellido, p.fecha_nacimiento
						FROM 	ayudante c
						join persona p on p.id_persona = c.persona_id_persona
						WHERE 	c.cui = ?
						LIMIT 1 ;";

		$dbres = $this->db->query($sql, array($CUI));

		$rows = $dbres->result_array();
		return $rows;
	}


}
