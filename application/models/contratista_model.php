<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class contratista_model extends CI_Model{

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

		function seleccionar_id_contratista() {
				$sql = "SELECT MAX(id_contratista) as id_contratista FROM contratista
								LIMIT 	1";

				$dbres = $this->db->query($sql);

				$rows = $dbres->result_array();

				return $rows[0]['id_contratista'];
			}



function crear_contratista($telefono_contratista,$cui, $domicilio_contratista, $persona_id_persona, $aldea_id_aldea) {
	$sql = "INSERT INTO contratista(telefono,cui,domicilio,persona_id_persona,canton_aldea_id_canton_aldea)
			VALUES (?, ?, ?, ?, ?)";

	$valores = array($telefono_contratista,$cui, $domicilio_contratista, $persona_id_persona, $aldea_id_aldea);

	$dbres = $this->db->query($sql, $valores);

	return $dbres;
}

	function seleccionarCuiContratista($CUI) {
		$sql = "SELECT 	c.id_contratista,c.cui,c.telefono,c.telefono2, c.domicilio, p.nombre, p.apellido, p.fecha_nacimiento
						FROM 	contratista c
						join persona p on p.id_persona = c.persona_id_persona
						WHERE 	c.cui = ?
						LIMIT 1 ;";

		$dbres = $this->db->query($sql, array($CUI));

		$rows = $dbres->result_array();
		return $rows;
	}

	function seleccionarContratistaEditar($CUI){
		$sql = "SELECT  con.id_consecion id_consecion,c.id_contratista,c.cui cui,c.telefono,c.telefono2, c.domicilio,
						p.id_persona id_persona, p.nombre nombre_con, p.apellido, p.fecha_nacimiento,
						cant.nombre,cant.id_canton_aldea aldea_contra,mun.nombre_mun,mun.id_municipio
				FROM 	consecion con
				join contratista c on c.id_contratista = con.contratista_id_contratista
				join persona p on p.id_persona = c.persona_id_persona
				join canton_aldea cant on cant.id_canton_aldea = c.canton_aldea_id_canton_aldea
				join municipio mun on mun.id_municipio = cant.municipio_id_municipio
 				where c.cui = ?
				LIMIT 	1";
		$dbres = $this->db->query($sql,array($CUI));

		$rows = $dbres->result_array();

		return $rows;
	}


	function seleccionarMunicipioContratista() {
			$sql = "SELECT id_municipio, nombre_mun
					FROM 	municipio
					where id_municipio = 2
					order by nombre_mun ASC
					LIMIT 	500";

		$dbres = $this->db->query($sql);
		$rows = $dbres->result_array();

		return $rows;
	}


	function seleccionarAldeaContratista() {
		$sql = "SELECT id_canton_aldea, nombre
				FROM 	canton_aldea
				order by nombre ASC
				LIMIT 	100";

		$dbres = $this->db->query($sql);

		$rows = $dbres->result_array();

		return $rows;
	}

	function actualizar_persona($id,$nombre, $apellido,$nacimiento) {
	$sql = "UPDATE persona
					SET nombre = '$nombre', apellido = '$apellido', fecha_nacimiento = '$nacimiento'
					WHERE id_persona = '$id'
					";

	$dbres = $this->db->query($sql);
	return $dbres;
}

function actualizar_contratista($id,$cui, $telefono,$telefono2,$domicilio,$id_aldea) {
$sql = "UPDATE contratista
				SET telefono = '$telefono', telefono2 = '$telefono2', cui = '$cui', domicilio = '$domicilio'
				, canton_aldea_id_canton_aldea = '$id_aldea'
				WHERE id_contratista = '$id'
				";

$dbres = $this->db->query($sql);
return $dbres;
}
}
