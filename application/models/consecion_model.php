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


function seleccionarMunicipio() {
	$sql = "SELECT id_municipio, nombre_mun
			FROM 	municipio
			order by nombre_mun ASC
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

	function seleccionarDetalle($id) {
		$sql = "SELECT c.id_consecion id_consecion, c.numero numero,c.fecha_creacion creado,
/*ssda*/
										con.cui cui_contra,contra.nombre nombre_contratista,
                    contra.apellido	apellido_contra,contra.fecha_nacimiento
                    nacimiento_contra,con.telefono telefono_contra,con.domicilio domicilio_contra,
										cant_contra.nombre cantald_contra,mun_contra.nombre_mun mun_contra,

										p.numero_licencia licencia,pil.nombre nombre_piloto,
                    pil.apellido	apellido_piloto, pil.fecha_nacimiento
                    nacimiento_piloto,p.telefono telefono_piloto, p.domicilio domicilio_piloto,
										cant_pil.nombre cant_piloto,mun_contra.nombre_mun mun_contra, lice.tipo tipo_lice,

										a.cui cui_ayudante,ayu.nombre nombre_ayudante,
                    ayu.apellido	apellido_ayudante,ayu.fecha_nacimiento
                    nacimiento_ayudante,a.domicilio domicilio_ayudante,
										cant_ayu.nombre cantald_ayudante,mun_ayu.nombre_mun mun_ayudante,

										r.nombre ruta ,r.descripcion descripcion_ruta,

                    v.numero_placa placa, v.modelo modelo,t.tipo_vehiculo tipo, col.color color, col.descripción
                    descripcion_color, m.nombre marca

										FROM 	consecion c

											join contratista con on con.id_contratista = c.contratista_id_contratista
											join canton_aldea cant_contra on con.canton_aldea_id_canton_aldea = cant_contra.id_canton_aldea
											join municipio mun_contra on cant_contra.municipio_id_municipio = mun_contra.id_municipio
				            	join persona contra on contra.id_persona = con.persona_id_persona

											join piloto p on p.id_piloto = c.piloto_id_piloto
                    	join canton_aldea cant_pil on p.canton_aldea_id_canton_aldea = cant_pil.id_canton_aldea
											join municipio mun_pil on cant_pil.municipio_id_municipio = mun_pil.id_municipio
	       		 					join persona pil on pil.id_persona = p.persona_id_persona
											join tipo_licencia lice on lice.id_tipo = p.tipo_licencia_id_tipo

                    	join ayudante a on a.id_ayudante = p.ayudante_id_ayudante
	       		 					join persona ayu on ayu.id_persona = a.persona_id_persona
                    	join canton_aldea cant_ayu on a.canton_aldea_id_canton_aldea = cant_ayu.id_canton_aldea
											join municipio mun_ayu on cant_ayu.municipio_id_municipio = mun_ayu.id_municipio

											join ruta r on r.id_ruta = c.ruta_id_ruta
											join vehiculo v on v.id_vehiculo = c.vehiculo_id_vehiculo
											join tipo t on t.id_tipo = v.tipo_id_tipo
	                    join marca m on m.id_marca = v.marca_id_marca
	                    join color col on col.id_color = v.color_id_color

											where c.id_consecion = ?
											LIMIT 	1";

		$dbres = $this->db->query($sql, $id);

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

function crear_ayudante($cui, $domicilio_ayudante, $persona_id_persona, $aldea_id_aldea) {
$sql = "INSERT INTO ayudante(cui,domicilio,persona_id_persona,canton_aldea_id_canton_aldea)
		VALUES (?, ?, ?, ?)";

$valores = array($cui, $domicilio_ayudante, $persona_id_persona, $aldea_id_aldea);

$dbres = $this->db->query($sql, $valores);

return $dbres;
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

	function crear_vehiculo($modelo,$color_id_color, $noplaca,$tipo_id_tipo,$marca_id_marca) {
		$sql = "INSERT INTO vehiculo(modelo, color_id_color, numero_placa,tipo_id_tipo,
																	marca_id_marca)
				VALUES (?, ?, ?, ?, ?)";

		$valores = array($modelo,$color_id_color, $noplaca,$tipo_id_tipo,$marca_id_marca);

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
		function crear_consecion($numero,$descripcion, $id_contratista,$id_ruta,$id_vehiculo,$id_empleado, $id_piloto) {
			$sql = "INSERT INTO consecion(numero, descripcion, contratista_id_contratista, ruta_id_ruta,
																		vehiculo_id_vehiculo, empleado_id_empleado, piloto_id_piloto)
					VALUES (?, ?, ?, ?, ?, ?, ?)";

			$valores = array($numero,$descripcion, $id_contratista,$id_ruta,$id_vehiculo,$id_empleado, $id_piloto);

			$dbres = $this->db->query($sql, $valores);

			return $dbres;
		}

}
