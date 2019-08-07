<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class consecion_model extends CI_Model{

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

	function seleccionarBusqueda($busqueda) {
		$sql = "SELECT c.id_corredor, c.Nombre, i.numero_atleta as Numero
				FROM 	corredor c
				join inscripcion i on c.id_corredor = i.corredor_id_corredor
				where i.numero_atleta = ?
				LIMIT 	1";

		$dbres = $this->db->query($sql, $busqueda);

		$rows = $dbres->result_array();

		return $rows;
	}

	function seleccionarDetalle($id) {
		$sql = "SELECT c.id_corredor id_corredor, c.Nombre nombre, i.numero_atleta numero, TIMESTAMPDIFF(YEAR,Fecha_nacimiento,CURDATE()) AS edad
						,m.nombre_municipio municipio, d.nombre_depto departamento, p.nombre_pais pais, c.Email email, c.Rama rama, c.Telefono telefono
						,f.Nombre familiar, f.Telefono telefono_familiar
				FROM 	corredor c
				join inscripcion i on c.id_corredor= i.corredor_id_corredor
				join municipio m on id_municipio = municipio_id_municipio
				join departamento d on id_departamento = departamento_id_departamento
				join pais p on id_pais = pais_id_pais
				join familiar f on c.id_corredor = f.Corredor_id_corredor
				where id_corredor = ?
				LIMIT 	1";

		$dbres = $this->db->query($sql, $id);

		$rows = $dbres->result_array();

		return $rows;
	}

	function seleccionarCuiContratista($CUI) {
		$sql = "SELECT 	c.cui,c.telefono, c.domicilio, p.nombre, p.apellido, p.fecha_nacimiento
						FROM 	contratista c
						join persona p on p.id_persona = c.persona_id_persona
						WHERE 	c.cui = ?
						LIMIT 1 ;";

		$dbres = $this->db->query($sql, array($CUI));

		$rows = $dbres->result_array();
		return $rows;
	}

	function seleccionar_id_corredor($CUI) {

		$sql = "SELECT 	id_corredor
						FROM 	corredor
						WHERE 	CUI = ?
						";

		$dbres = $this->db->query($sql, array($CUI));

		$rows = $dbres->result_array();

		return $rows[0]['id_corredor'];

	}
		function crear_familiar($id_corredor, $nombre_familiar, $telefono_familiar) {
			$sql = "INSERT INTO familiar(Nombre, Telefono, Corredor_id_corredor)
					VALUES (?, ?, ?)";

			$valores = array($nombre_familiar, $telefono_familiar,$id_corredor);

			$dbres = $this->db->query($sql, $valores);

			return $dbres;
		}

		function crear_inscripcion($id_corredor, $numero) {
			$sql = "INSERT INTO inscripcion(numero_atleta, fecha_participacion, corredor_id_corredor)
					VALUES (?, ?, ?)";

			$año = date ("Y");
			$valores = array($numero, $año, $id_corredor);

			$dbres = $this->db->query($sql, $valores);

			return $dbres;
		}

	function crear_corredor($nombre, $fecha_nacimiento, $CUI ,$email, $telefono,
													$rama, $usuario_id_usuario, $municipio_id_municipio) {
		$sql = "INSERT INTO corredor(Nombre, Fecha_nacimiento, CUI, Email,Telefono,
												Rama,Usuario_id_usuario,municipio_id_municipio)
				VALUES (?, ?, ?, ?, ?, ?, ?, ?)";

		$valores = array($nombre, $fecha_nacimiento, $CUI ,$email, $telefono,
											$rama, $usuario_id_usuario, $municipio_id_municipio);

		$dbres = $this->db->query($sql, $valores);

		return $dbres;
	}

	function seleccionarCorredorEditar($id){
		$sql = "SELECT c.id_corredor id_corredor, c.CUI cui, c.Nombre nombre, i.numero_atleta numero, c.Fecha_nacimiento nacimiento
						,c.Email email, c.Telefono telefono
						,f.Nombre familiar, f.Telefono telefono_familiar
				FROM 	corredor c
				join inscripcion i on c.id_corredor= i.corredor_id_corredor
				join familiar f on id_corredor = f.Corredor_id_corredor
				where id_corredor = ? and fecha_participacion = ?
				LIMIT 	1";
		$año = date("Y");
		$dbres = $this->db->query($sql,array($id,$año));

		$rows = $dbres->result_array();

		return $rows;
	}

	function actualizar_corredor($id, $nombre, $fecha_nacimiento, $CUI ,$email, $telefono,
													$rama, $municipio_id_municipio) {
		$sql = "UPDATE corredor
						SET Nombre = '$nombre', Fecha_nacimiento = '$fecha_nacimiento', CUI= '$CUI', Email= '$email', Telefono = '$telefono',
						Rama = '$rama', municipio_id_municipio = '$municipio_id_municipio' WHERE id_corredor = '$id' ";


		$dbres = $this->db->query($sql);

		return $dbres;
	}

	function actualizar_familiar($id, $nombre, $telefono) {
		$sql = "UPDATE familiar
						SET Nombre = '$nombre',Telefono = '$telefono'
						WHERE Corredor_id_corredor = '$id'";

		$dbres = $this->db->query($sql);

		return $dbres;
	}

	function actualizar_inscripcion($id, $numero) {
		$año = date('Y');
		$sql = "UPDATE inscripcion
						SET numero_atleta = '$numero'
						WHERE Corredor_id_corredor = '$id' and fecha_participacion = '$año'";

		$dbres = $this->db->query($sql);

		return $dbres;
	}



}
