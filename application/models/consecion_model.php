<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class consecion_model extends CI_Model{

	//Constructor
	function __construct(){
		parent::__construct();
		$this->load->database();
	}

function seleccionarRuta() {
	$sql = "SELECT id_ruta, nombre
			FROM 	ruta
			order by nombre ASC
			LIMIT 	100";

	$dbres = $this->db->query($sql);

	$rows = $dbres->result_array();

	return $rows;
}


function crear_ruta($ruta, $descripcion) {
	$sql = "INSERT INTO ruta(nombre,descripcion)
			VALUES (?, ?)";

	$valores = array($ruta,$descripcion);

	$dbres = $this->db->query($sql, $valores);

	return $dbres;
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


function seleccionarMunicipio($id) {
	if (isset($id)) {
		$sql = "SELECT id_municipio, nombre_mun
				FROM 	municipio
				where departamento_id_departamento = ?
				order by nombre_mun ASC
				LIMIT 	500";

		$dbres = $this->db->query($sql, $id);
	}else {
		$sql = "SELECT id_municipio, nombre_mun
				FROM 	municipio
				where id_municipio = 2
				order by nombre_mun ASC
				LIMIT 	500";

		$dbres = $this->db->query($sql);
	}


	$rows = $dbres->result_array();

	return $rows;
}

function seleccionarDepartamento() {
	$sql = "SELECT id_departamento, nombre_depto
			FROM 	departamento
			order by nombre_depto ASC
			LIMIT 	500";

	$dbres = $this->db->query($sql);

	$rows = $dbres->result_array();

	return $rows;
}

	function listar() {
		$sql = "SELECT c.id_consecion id_consecion, c.numero numero, contra.nombre nombre_contratista, pil.nombre nombre_piloto, r.nombre ruta, t.tipo_vehiculo tipo
				FROM 	consecion c
				join contratista con on con.id_contratista = c.contratista_id_contratista
				join piloto p on p.id_piloto = c.piloto_id_piloto
				join ruta r on r.id_ruta = c.ruta_id_ruta
				join vehiculo v on v.id_vehiculo = c.vehiculo_id_vehiculo
				join tipo t on t.id_tipo = v.tipo_id_tipo
				join persona contra on contra.id_persona = con.persona_id_persona
        join persona pil on pil.id_persona = p.persona_id_persona
				LIMIT 	1000";

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



function crear_contratista($telefono_contratista, $telefono2_contratista,$cui, $domicilio_contratista, $persona_id_persona, $aldea_id_aldea) {
	$sql = "INSERT INTO contratista(telefono,telefono2,cui,domicilio,persona_id_persona,canton_aldea_id_canton_aldea)
			VALUES (?, ?, ?, ?, ?, ?)";

	$valores = array($telefono_contratista,$telefono2_contratista,$cui, $domicilio_contratista, $persona_id_persona, $aldea_id_aldea);

	$dbres = $this->db->query($sql, $valores);

	return $dbres;
}

	function seleccionarCuiContratista($CUI) {
		$sql = "SELECT 	c.id_contratista,c.cui,c.telefono, c.domicilio, p.nombre, p.apellido, p.fecha_nacimiento
						FROM 	contratista c
						join persona p on p.id_persona = c.persona_id_persona
						WHERE 	c.cui = ?
						LIMIT 1 ;";

		$dbres = $this->db->query($sql, array($CUI));

		$rows = $dbres->result_array();
		return $rows;
	}

	function seleccionar_id_ayudante() {
			$sql = "SELECT MAX(id_ayudante) as id_ayudante FROM ayudante
							LIMIT 	1";

			$dbres = $this->db->query($sql);

			$rows = $dbres->result_array();

			return $rows[0]['id_ayudante'];
		}

function crear_ayudante($cui, $domicilio_ayudante, $persona_id_persona,$telefono_ayudante, $municipio_ayudante) {
$sql = "INSERT INTO ayudante(cui,domicilio,persona_id_persona,telefono,municipio_id_municipio)
		VALUES (?, ?, ?, ?, ?)";

$valores = array($cui, $domicilio_ayudante, $persona_id_persona, $telefono_ayudante, $municipio_ayudante);

$dbres = $this->db->query($sql, $valores);

return $dbres;
}

function crear_conductor($licencia,$domicilio, $telefono,$id_persona,$id_tipo_licencia,$municipio_conductor,$id_ayudante) {
	$sql = "INSERT INTO piloto(numero_licencia, domicilio, telefono,persona_id_persona,
																tipo_licencia_id_tipo, municipio_id_municipio,
																ayudante_id_ayudante)
			VALUES (?, ?, ?, ?, ?, ?, ?)";

	$valores = array($licencia,$domicilio, $telefono,$id_persona,$id_tipo_licencia,$municipio_conductor,$id_ayudante);

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

	function crear_vehiculo($modelo,$tarjeta_circulacion,$color_id_color,$color_variante, $noplaca,$tipo_id_tipo,$marca_id_marca) {
		$sql = "INSERT INTO vehiculo(modelo,tarjeta_circulacion, color_id_color, color_variante ,numero_placa,tipo_id_tipo,
																	marca_id_marca)
				VALUES (?, ?, ?, ?, ?, ?, ?)";

		$valores = array($modelo,$tarjeta_circulacion,$color_id_color,$color_variante, $noplaca,$tipo_id_tipo,$marca_id_marca);

		$dbres = $this->db->query($sql, $valores);

		return $dbres;
	}
	function seleccionar_id_vehiculo() {
			$sql = "SELECT MAX(id_vehiculo) as id_vehiculo FROM vehiculo
							LIMIT 	1";

			$dbres = $this->db->query($sql);

			$rows = $dbres->result_array();

			return $rows[0]['id_vehiculo'];
		}
		function crear_consecion($numero,$tarifa,$horario_inicio, $horario_fin,$descripcion, $id_contratista,$id_ruta,$id_vehiculo,$id_empleado, $id_piloto) {
			$sql = "INSERT INTO consecion(numero, tarifa, hora_inicio, hora_fin, descripcion, contratista_id_contratista, ruta_id_ruta,
																		vehiculo_id_vehiculo, empleado_id_empleado, piloto_id_piloto)
					VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?)";

			$valores = array($numero,$tarifa,$horario_inicio, $horario_fin, $descripcion, $id_contratista,$id_ruta,$id_vehiculo,$id_empleado, $id_piloto);

			$dbres = $this->db->query($sql, $valores);

			return $dbres;
		}

		function seleccionarConsecionEditar($id){
			$sql = "SELECT  id_consecion,numero, tarifa, hora_inicio,hora_fin, descripcion, ruta_id_ruta
					FROM 	consecion
					where id_consecion = ?
					LIMIT 	1";
			$dbres = $this->db->query($sql,array($id));

			$rows = $dbres->result_array();

			return $rows;
		}

		function actualizar_consecion($id_concesion,$numero, $tarifa, $horario_inicio,	$horario_fin, $descripcion, $id_ruta) {
		$sql = "UPDATE consecion
						SET numero = '$numero', tarifa = '$tarifa', hora_inicio = '$horario_inicio', hora_fin= '$horario_fin ', descripcion= '$descripcion'
						, ruta_id_ruta = '$id_ruta'
						WHERE id_consecion = '$id_concesion' ";

		$dbres = $this->db->query($sql);
		return $dbres;
	}
}
