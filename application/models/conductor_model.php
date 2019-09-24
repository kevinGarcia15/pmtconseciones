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

		function seleccionarPilotoEditar($licencia){
			$sql = "SELECT  con.id_consecion id_consecion,pil.id_piloto, pil.numero_licencia licencia,pil.telefono,
							pil.domicilio, p.id_persona id_persona, p.nombre nombre_pil, p.apellido, p.fecha_nacimiento,
							mun.nombre_mun,mun.id_municipio, d.nombre_depto,d.id_departamento, tipo.id_tipo, tipo.tipo
					FROM 	consecion con
					join piloto pil on con.piloto_id_piloto = pil.id_piloto
					join tipo_licencia tipo on tipo.id_tipo = pil.tipo_licencia_id_tipo
					join persona p on p.id_persona = pil.persona_id_persona
					join municipio mun on mun.id_municipio = pil.municipio_id_municipio
					join departamento d on d.id_departamento = mun.departamento_id_departamento
					where pil.numero_licencia = ?
					LIMIT 	1";
			$dbres = $this->db->query($sql,array($licencia));

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

	function actualizar_conductor($id,$licencia,$domicilio,$telefono,$id_tipo, $id_municipio) {
	$sql = "UPDATE piloto
					SET numero_licencia = '$licencia', domicilio = '$domicilio', telefono = '$telefono', tipo_licencia_id_tipo = '$id_tipo'
					, municipio_id_municipio = '$id_municipio'
					WHERE id_piloto = '$id'
					";

	$dbres = $this->db->query($sql);
	return $dbres;
	}

	function seleccionarLicenciaConductor($licencia) {
		$sql = "SELECT 	numero_licencia
						FROM 	piloto
						WHERE 	numero_licencia = ?
						LIMIT 1 ;";

		$dbres = $this->db->query($sql, array($licencia));

		$rows = $dbres->result_array();
		return $rows;
	}
}
