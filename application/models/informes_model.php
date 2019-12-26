<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class informes_model extends CI_Model{

	//Constructor
	function __construct(){
		parent::__construct();
		$this->load->database();
	}

	function Detalle($id) {
		$sql = "SELECT c.id_consecion id_consecion, c.numero numero,c.fecha_creacion creado,c.tarifa tarifa, c.parqueo parqueo,
									 c.hora_inicio h_inicio,c.hora_fin h_fin,c.descripcion descripcion,
/*ssda*/
										con.cui cui_contra,contra.nombre nombre_contratista,
                    contra.apellido	apellido_contra,contra.fecha_nacimiento
                    nacimiento_contra,con.telefono telefono_contra,con.telefono2 telefono2_contra,con.domicilio domicilio_contra,
										cant_contra.nombre cantald_contra,mun_contra.nombre_mun mun_contra,

										p.numero_licencia licencia,pil.nombre nombre_piloto,
                    pil.apellido	apellido_piloto, pil.fecha_nacimiento
                    nacimiento_piloto,p.telefono telefono_piloto, p.domicilio domicilio_piloto,
										mun_pil.nombre_mun mun_pil, depto_pil.nombre_depto depto_pil , lice.tipo tipo_lice,

										a.cui cui_ayudante,ayu.nombre nombre_ayudante,
                    ayu.apellido	apellido_ayudante,ayu.fecha_nacimiento
                    nacimiento_ayudante,a.telefono telefono_ayudante,a.domicilio domicilio_ayudante,
										mun_ayu.nombre_mun mun_ayudante,depto_ayu.nombre_depto depto_ayudante,

										r.nombre ruta ,r.descripcion descripcion_ruta,

                    v.numero_placa placa, v.tarjeta_circulacion tarjeta_circulacion, v.modelo modelo,
										t.tipo_vehiculo tipo, col.color color, v.color_variante color_variante, m.nombre marca

										FROM 	consecion c

											join contratista con on con.id_contratista = c.contratista_id_contratista
											join canton_aldea cant_contra on con.canton_aldea_id_canton_aldea = cant_contra.id_canton_aldea
											join municipio mun_contra on cant_contra.municipio_id_municipio = mun_contra.id_municipio
				            	join persona contra on contra.id_persona = con.persona_id_persona

											join piloto p on p.id_piloto = c.piloto_id_piloto
											join municipio mun_pil on p.municipio_id_municipio = mun_pil.id_municipio
											join departamento depto_pil on mun_pil.departamento_id_departamento = depto_pil.id_departamento
	       		 					join persona pil on pil.id_persona = p.persona_id_persona
											join tipo_licencia lice on lice.id_tipo = p.tipo_licencia_id_tipo

                    	join ayudante a on a.id_ayudante = p.ayudante_id_ayudante
	       		 					join persona ayu on ayu.id_persona = a.persona_id_persona
											join municipio mun_ayu on a.municipio_id_municipio = mun_ayu.id_municipio
											join departamento depto_ayu on mun_ayu.departamento_id_departamento = depto_ayu.id_departamento

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

	function informe_cat($valores,$tipo_vehiculo) {
		$sql = "SELECT $valores
										FROM 	consecion c

											join contratista con on con.id_contratista = c.contratista_id_contratista
											join canton_aldea cant_contra on con.canton_aldea_id_canton_aldea = cant_contra.id_canton_aldea
											join municipio mun_contra on cant_contra.municipio_id_municipio = mun_contra.id_municipio
				            	join persona contra on contra.id_persona = con.persona_id_persona

											join piloto p on p.id_piloto = c.piloto_id_piloto
											join municipio mun_pil on p.municipio_id_municipio = mun_pil.id_municipio
											join departamento depto_pil on mun_pil.departamento_id_departamento = depto_pil.id_departamento
	       		 					join persona pil on pil.id_persona = p.persona_id_persona
											join tipo_licencia lice on lice.id_tipo = p.tipo_licencia_id_tipo

											join ruta r on r.id_ruta = c.ruta_id_ruta
											join vehiculo v on v.id_vehiculo = c.vehiculo_id_vehiculo
											join tipo t on t.id_tipo = v.tipo_id_tipo
	                    join marca m on m.id_marca = v.marca_id_marca
	                    join color col on col.id_color = v.color_id_color

											where t.tipo_vehiculo = '$tipo_vehiculo'

											LIMIT 	100";

		$dbres = $this->db->query($sql);

		$rows = $dbres->result_array();

		return $rows;
	}


	function mostrar($numero) {
		$sql = "SELECT c.id_consecion id_consecion, c.numero numero, contra.nombre nombre_contratista, pil.nombre nombre_piloto, r.nombre ruta, t.tipo_vehiculo tipo
				FROM 	consecion c
				join contratista con on con.id_contratista = c.contratista_id_contratista
				join piloto p on p.id_piloto = c.piloto_id_piloto
				join ruta r on r.id_ruta = c.ruta_id_ruta
				join vehiculo v on v.id_vehiculo = c.vehiculo_id_vehiculo
				join tipo t on t.id_tipo = v.tipo_id_tipo
				join persona contra on contra.id_persona = con.persona_id_persona
        join persona pil on pil.id_persona = p.persona_id_persona
				Where numero = ?
				LIMIT 	1";

		$dbres = $this->db->query($sql, $numero);

		$rows = $dbres->result_array();

		return $rows;
	}

	function listar($categoria) {
		$sql = "SELECT c.id_consecion id_consecion, c.numero numero, contra.nombre nombre_contratista,
										pil.nombre nombre_piloto, r.nombre ruta, t.tipo_vehiculo tipo, v.numero_placa
				FROM 	consecion c
				join contratista con on con.id_contratista = c.contratista_id_contratista
				join piloto p on p.id_piloto = c.piloto_id_piloto
				join ruta r on r.id_ruta = c.ruta_id_ruta
				join vehiculo v on v.id_vehiculo = c.vehiculo_id_vehiculo
				join tipo t on t.id_tipo = v.tipo_id_tipo
				join persona contra on contra.id_persona = con.persona_id_persona
				join persona pil on pil.id_persona = p.persona_id_persona
				order by $categoria ASC
				LIMIT 	1000";

		$dbres = $this->db->query($sql);

		$rows = $dbres->result_array();

		return $rows;
	}

	function seleccionarBusqueda($busqueda, $criterio, $signo) {
		$sql = "SELECT c.id_consecion id_consecion, c.numero numero, contra.nombre nombre_contratista,
										pil.nombre nombre_piloto, r.nombre ruta, t.tipo_vehiculo tipo, v.numero_placa
				FROM 	consecion c
				join contratista con on con.id_contratista = c.contratista_id_contratista
				join piloto p on p.id_piloto = c.piloto_id_piloto
				join ruta r on r.id_ruta = c.ruta_id_ruta
				join vehiculo v on v.id_vehiculo = c.vehiculo_id_vehiculo
				join tipo t on t.id_tipo = v.tipo_id_tipo
				join persona contra on contra.id_persona = con.persona_id_persona
				join persona pil on pil.id_persona = p.persona_id_persona
				where $criterio $signo $busqueda
				LIMIT 	10";

		$dbres = $this->db->query($sql);

		$rows = $dbres->result_array();

		return $rows;
	}
//se selecciona la concesion para borrar
	function seleccionarBorrar($id) {
		$sql = "SELECT c.id_consecion id_consecion, p.id_piloto id_piloto, p.persona_id_persona id_persona_pil, a.id_ayudante id_ayudante,
						a.persona_id_persona id_persona_ayu,c.vehiculo_id_vehiculo id_vehiculo

				FROM 	consecion c
				join piloto p on p.id_piloto = c.piloto_id_piloto
				join ayudante a on a.id_ayudante = p.ayudante_id_ayudante
				where c.id_consecion = ?
				LIMIT 	1";

		$dbres = $this->db->query($sql, $id);

		$rows = $dbres->result_array();

		return $rows;
	}

	function borrarConcesion($id_consecion, $id_piloto, $id_persona_pil, $id_ayudante, $id_persona_ayu, $id_vehiculo) {
		$sql1 = "DELETE FROM consecion
						WHERE id_consecion = $id_consecion";
		$dbres = $this->db->query($sql1);

		$sql2 = "DELETE FROM piloto
						WHERE id_piloto = $id_piloto";
		$dbres = $this->db->query($sql2);

		$sql3 = "DELETE FROM persona
						WHERE id_persona = $id_persona_pil";
		$dbres = $this->db->query($sql3);

		$sql4 = "DELETE FROM ayudante
						WHERE id_ayudante = $id_ayudante";
		$dbres = $this->db->query($sql4);

		$sql5 = "DELETE FROM persona
						WHERE id_persona = $id_persona_ayu";
		$dbres = $this->db->query($sql5);

		$sql6 = "DELETE FROM vehiculo
						WHERE id_vehiculo = $id_vehiculo";

		$dbres = $this->db->query($sql6);

		return $dbres;
	}

	function seleccionarTipo() {
		$sql = "SELECT id_tipo, tipo_vehiculo
				FROM 	tipo
				order by tipo_vehiculo ASC
				LIMIT 	20";

		$dbres = $this->db->query($sql);

		$rows = $dbres->result_array();

		return $rows;
	}
}
