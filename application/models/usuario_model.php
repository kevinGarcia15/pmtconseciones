<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class usuario_model extends CI_Model{

	//Constructor
	function __construct(){
		parent::__construct();
		$this->load->database();
	}

	function crearPersona($nombre, $apellido, $fecha_nacimiento) {
		$sql = "INSERT INTO persona(nombre,apellido, fecha_nacimiento)
				VALUES (?, ?, ?)";

		$valores = array($nombre,$apellido,$fecha_nacimiento);

		$dbres = $this->db->query($sql, $valores);

		return $dbres;
	}
//busca el ultimo dato ingresado para tomar su id
	function seleccionar_id_persona() {
		$sql = "SELECT MAX(id_persona) as id_persona FROM persona
						LIMIT 	1";

		$dbres = $this->db->query($sql);

		$rows = $dbres->result_array();

		return $rows[0]['id_persona'];
	}

	function crearEmpleado($CUI, $rol, $usuario, $cargo, $clave, $persona_id_persona) {
		$sql = "INSERT INTO empleado(CUI, cargo, estado, rol, persona_id_persona, usuario,  hash_clave, salt)
				VALUES (?, ?, ?, ?, ?, ?, ?, ?)";

		$salt = rand(0,999999); //calcular un número aleatorio
		$hash_clave = hash('sha256', $clave.$salt); //calcular el hash de clave + salt
		$estado = "A";

		$valores = array($CUI,$cargo, $estado,$rol,$persona_id_persona, $usuario, $hash_clave, $salt);

		$dbres = $this->db->query($sql, $valores);

		return $dbres;
	}

function validarUsuario($Usuario, $cui) {
	$sql = "SELECT usuario, CUI
			FROM 	empleado
			WHERE 	usuario = ? or CUI = ?
			LIMIT 	1;";

	$dbres = $this->db->query($sql, array($Usuario, $cui));
	$rows = $dbres->result_array();

	return $rows;
	}

	function mostrar_insercion($cui){
		$sql = "SELECT e.id_empleado as id_empleado, e.cui as cui, e.cargo as cargo, e.rol as rol, e.usuario as usuario, p.nombre as nombre, p.apellido as apellido, p.fecha_nacimiento as nacimiento
						FROM 	empleado e
						JOIN persona p on e.persona_id_persona = p.id_persona
						WHERE cui = ?
						LIMIT 	1";

			$dbres = $this->db->query($sql, array($cui));

			$rows = $dbres->result_array();

			return $rows;
	}


	function mostrarUsuariosActivos(){
		$sql = "SELECT e.id_empleado as id_empleado, e.cui as cui, e.cargo as cargo, e.rol as rol, e.usuario as usuario, p.nombre as nombre, p.apellido as apellido, p.fecha_nacimiento as nacimiento
						FROM 	empleado e
						JOIN persona p on e.persona_id_persona = p.id_persona
						WHERE e.estado = 'A'
						ORDER BY nombre ASC
						LIMIT 	1000";

			$dbres = $this->db->query($sql);

			$rows = $dbres->result_array();

			return $rows;
	}

	function seleccionarEmpleadoEditar($id){
		$sql = "SELECT e.id_empleado id_empleado, e.cui cui, e.cargo cargo, e.rol rol, e.usuario usuario, e.persona_id_persona persona_id_persona, p.nombre nombre, p.apellido apellido, p.fecha_nacimiento nacimiento
				FROM 	empleado e
				join persona p on p.id_persona = e.persona_id_persona
				where id_empleado = ?
				LIMIT 	1";
		$dbres = $this->db->query($sql,array($id));

		$rows = $dbres->result_array();

		return $rows;
	}

	function actualizarEmpleado($id_empleado,$CUI, $rol, $usuario,	$cargo) {
			$sql = "UPDATE empleado
							SET cui = '$CUI', cargo = '$cargo', rol = '$rol', usuario= '$usuario'
							WHERE id_empleado = '$id_empleado' ";

			$dbres = $this->db->query($sql);
			return $dbres;
		}


	function actualizarPersona($id_persona,$nombre, $apellido, $fecha_nacimiento) {
		$sql = "UPDATE persona
		SET nombre = '$nombre', apellido = '$apellido', fecha_nacimiento = '$fecha_nacimiento'
		WHERE id_persona = '$id_persona' ";

		$dbres = $this->db->query($sql);
		return $dbres;
	}

	function darBaja($id_empleado) {
		is_numeric($id_empleado) or exit("Number expected!");

		$sql = "UPDATE 	empleado
				SET 	estado = ?
				WHERE 	id_empleado = ?
				LIMIT 	1;";

		$valores = array('B', $id_empleado);

		$dbres = $this->db->query($sql, $valores);

		return $dbres;
	}

	function autenticarUsuario($txtUsuario, $txtClave) {
		$sql = "SELECT 	id_empleado, usuario, hash_clave, salt, rol
				FROM 	empleado
				WHERE 	usuario = ? AND estado = 'A'
				LIMIT 	1;";

		$dbres = $this->db->query($sql, array($txtUsuario));
		$rows = $dbres->result_array();

		if (count($rows) < 1) // El usuario no existe o no está activo
			return 0;

		$id = $rows[0]['id_empleado'];
		$salt = $rows[0]['salt'];
		$hashClave = hash('sha256', $txtClave.$salt); // Calcular sha512 de clave + salt

		$sql = "SELECT 	id_empleado, usuario, hash_clave, salt, rol
		FROM 	empleado
		WHERE 	id_empleado = ? AND hash_clave = ?
		LIMIT 	1;";

		$dbres = $this->db->query($sql, array($id, $hashClave));
		$rows = $dbres->result_array();

		if (count($rows) > 0) {
			return $rows; // El usuario existe y cumple con la clave
		}

		return 0; // El usuario existe pero no cumple la clave
	}

	function seleccionarCuiUsuario($CUI) {
		$sql = "SELECT 	cui
						FROM 	empleado
						WHERE 	cui = ?
						LIMIT 1 ;";

		$dbres = $this->db->query($sql, array($CUI));

		$rows = $dbres->result_array();
		return $rows;
	}
}
