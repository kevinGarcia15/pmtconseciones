<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Operaciones_model extends CI_Model{
	
	//Constructor
	function __construct(){
		parent::__construct();
		$this->load->database();
	}

	function guardarOperacion($num_a, $num_b, $operacion, $resultado, $usuario_id) {
		is_numeric($num_a) or exit("Parámetro num a incorrecto");
		is_numeric($num_b) or exit("Parámetro num b incorrecto");
		is_numeric($resultado) or exit("Parámetro resultado incorrecto");

		$sql = "INSERT INTO operaciones (num_a, num_b, operacion, resultado, usuario_id)
				VALUES (?, ?, ?, ?, ?)";

		$valores = array($num_a, $num_b, $operacion, $resultado, $usuario_id);

		$dbres = $this->db->query($sql, $valores);

		return $dbres;//$rows[0]["cnt"];
	}

	function seleccionarLog() {
		$sql = "SELECT A.id_operacion, A.num_a, A.num_b, A.operacion, A.resultado, A.fecha, 
						B.nombre usuario
				FROM operaciones A
				JOIN usuarios B on A.usuario_id = B.id_usuario
				ORDER BY id_operacion DESC
				LIMIT 1000";

		$dbres = $this->db->query($sql);

		$rows = $dbres->result_array();

		return $rows;
	}

	function seleccionarLogOper($busqueda) {
		//Queries al estilo CodeIgniter (el framework se encarga de armar la sentencia SQL)
		$this->db->select("o.id_operacion, o.num_a, o.num_b, o.operacion, o.resultado, o.fecha, 
							u.nombre usuario")
						->from("operaciones o")
						->join("usuarios u", "o.usuario_id = u.id_usuario")
						->like('o.operacion', $busqueda)
						->order_by('id_operacion', 'DESC')
						->limit(1000);

		$dbres = $this->db->get(); //tabla, limit

		$rows = $dbres->result_array();

		return $rows;
	}

	function validarNombreUsuario($nombreusu, $idanuncio = 0) {
		is_numeric($idanuncio) or exit("Number expected");

		$where = $idanuncio ? "AND Id_Anuncio <> {$idanuncio}" : "";

		$sql = "SELECT 	count(*) cnt
				FROM 	anuncio a
				WHERE	a.Usuario_estado = ?
						{$where};";

		$dbres = $this->db->query($sql, $nombreusu);

		$rows = $dbres->result_array();

		return $rows[0]["cnt"];
	}

	function autenticarUsuario($txtUsuario, $txtClave) {
		$limit_records = $this->config->item('limit_records');
		$rows = array();

		$txtClave = hash('sha512', $_POST['txtClave']);

		$sql = "SELECT 	a.Id_Anuncio, a.Usuario_estado
		FROM 	anuncio a
		WHERE	a.Usuario_estado = ? AND
				a.Clave_estado = ?
		LIMIT 	1";

		$dbres = $this->db->query($sql, array($txtUsuario, $txtClave));

		$rows = $dbres->result_array();

		return $rows;

	}

}
