<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class informes_model extends CI_Model{

	//Constructor
	function __construct(){
		parent::__construct();
		$this->load->database();
	}

	function Detalle($id) {
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

	function seleccionarCorredorCategoria($categotia){
		$sql = "SELECT c.id_corredor as id_corredor, i.numero_atleta as numero, i.fecha_participacion as fecha_participacion, Nombre,Rama, TIMESTAMPDIFF(YEAR,Fecha_nacimiento,CURDATE()) AS edad,
						Email, p.nombre_pais pais
						FROM 	corredor c
						JOIN inscripcion i on i.corredor_id_corredor = c.id_corredor
    				JOIN municipio m on c.municipio_id_municipio = m.id_municipio
						JOIN departamento d on m.departamento_id_departamento = d.id_departamento
    				JOIN pais p on d.pais_id_pais = p.id_pais
						WHERE Rama = ? and fecha_participacion = ?
						ORDER BY numero ASC
						LIMIT 	3000";

			$año = date ("Y");
			$dbres = $this->db->query($sql, array($categotia, $año));

			$rows = $dbres->result_array();

			return $rows;
	}
	function seleccionarCorredorRama(){
		$sql = "SELECT Rama
						FROM 	corredor
						LIMIT 	5000";

			$dbres = $this->db->query($sql);

			$rows = $dbres->result_array();

			return $rows;
	}

	function seleccionarNoCorredores() {
			$sql = "CALL no_atletas";

			$dbres = $this->db->query($sql);

			$rows = $dbres->result_array();

			return $rows;
		}




}
