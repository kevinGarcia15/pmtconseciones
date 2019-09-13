<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class ayudante_model extends CI_Model{

	//Constructor
	function __construct(){
		parent::__construct();
		$this->load->database();
	}
	function seleccionarAyudanteEditar($id){
		$sql = "SELECT  con.id_consecion id_consecion, p.id_persona id_persona, p.nombre nombre_ayudante, p.apellido, p.fecha_nacimiento,
						ayu.id_ayudante,ayu.domicilio, ayu.telefono, ayu.cui,mun.nombre_mun,mun.id_municipio, d.nombre_depto,d.id_departamento
				FROM 	consecion con
				join piloto pil on con.piloto_id_piloto = pil.id_piloto
				join ayudante ayu on pil.ayudante_id_ayudante = ayu.id_ayudante
				join persona p on p.id_persona = ayu.persona_id_persona
				join municipio mun on mun.id_municipio = ayu.municipio_id_municipio
				join departamento d on d.id_departamento = mun.departamento_id_departamento
				where con.id_consecion = ?
				LIMIT 	1";
		$dbres = $this->db->query($sql,array($id));

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

function actualizar_ayudante($id,$cui,$domicilio,$telefono,$id_municipio) {
$sql = "UPDATE ayudante
				SET cui = '$cui', domicilio = '$domicilio', telefono = '$telefono', municipio_id_municipio = '$id_municipio'
				WHERE id_ayudante = '$id'
				";

$dbres = $this->db->query($sql);
return $dbres;
}

}
