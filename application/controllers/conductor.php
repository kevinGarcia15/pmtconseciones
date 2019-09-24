<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class conductor extends CI_Controller {
	function __construct(){
		parent::__construct();
		$this->load->helper('form');
		$this->load->library('session');
		$this->load->helper('url');
		$this->load->model('conductor_model');
	}

	private function restringirAcceso() {
		if (!isset($this->session->USUARIO)) {
			redirect("/inicio");
		}
	}

	public function index()
	{
		$this->restringirAcceso();
		$data['base_url'] = $this->config->item('base_url');
	}
//Crear un nuevo piloto----------------------------------------------------
	public function crearConductor() {
		$this->restringirAcceso();
		$data['base_url'] = $this->config->item('base_url');

//Datos de registro del conductor
		$data['numero_licencia'] ="";
		$data['nombre'] ="";
		$data['apellido'] ="";
		$data['fecha_nacimiento'] = "";
		$data['domicilio'] = "";
		$data['telefono'] ="";
		$data['tipo_licencia'] ="";
		$data['municipio_id_municipio'] = "";
		$data['ayudante_id_ayudante'] = "";

		$data['licencia'] = $this->conductor_model->seleccionarLicencia();//mustra los tipos de licencias en la BD

		if ($this->input->post('continuar') == 'continuar') {

				$conductor = array(
												'numero_licencia'  => $_POST['numero_licencia'],
												'nombre_conductor' => $_POST['nombre_conductor'],
												'apellido_conductor' => $_POST['apellido_conductor'],
												'fecha_nacimiento_conductor' => $_POST['fecha_nacimiento_conductor'],
												'telefono_conductor' => $_POST['telefono_conductor'],
												'municipio_conductor' => $_POST['municipio_conductor'],
												'tipo_licencia_id_tipo' => $_POST['tipo_licencia'],
												'domicilio_conductor' => $_POST['domicilio_conductor']
											 );
								$this->session->set_userdata($conductor);
			 	redirect("/ayudante/crearAyudante");
		}

		$this->load->view('crear_conductor', $data);
	}

	public function validar(){
		$this->restringirAcceso();
		$data['base_url'] = $this->config->item('base_url');

		$verificar = "";
			//Busca a contratista en BD
		$verificar = $_POST['licencia_conductor'];
		$data['result'] = $this->conductor_model->seleccionarLicenciaConductor($verificar);
		//verifica si exite el contratista
		$retorno = count($data['result']);
		echo $retorno; //retorna el resultado de la busqueda

}

	public function editar($CUI = 0) {
		$this->restringirAcceso();
		$data['base_url'] = $this->config->item('base_url');

		$data['arr'] = $this->conductor_model->seleccionarPilotoEditar($CUI);
		$data['licencia'] = $this->conductor_model->seleccionarLicencia();//mustra los tipos de licencias en la BD

		$data['numero_licencia'] ="";
		$data['nombre'] ="";
		$data['apellido'] ="";
		$data['fecha_nacimiento'] = "";
		$data['domicilio'] = "";
		$data['telefono'] ="";
		$data['tipo_licencia'] ="";
		$data['municipio_id_municipio'] = "";
		$data['id_conductor']= "";


		if (isset($_POST['actualizar'])) {
			$data['numero_licencia'] = $_POST['numero_licencia'];
			$data['nombre'] = $_POST['nombre_conductor'];
			$data['apellido'] = $_POST['apellido_conductor'];
			$data['fecha_nacimiento'] = $_POST['fecha_nacimiento_conductor'];
			$data['domicilio'] = $_POST['domicilio_conductor'];
			$data['telefono']= $_POST['telefono_conductor'];
			$data['tipo_licencia'] =  $_POST['tipo_licencia'];
			$data['municipio_id_municipio'] =  $_POST['municipio'];

			$data['id_persona'] = $_POST['id_persona'];
			$data['id_conductor'] = $_POST['id_piloto'];
			$data['id_consecion'] = $_POST['id_consecion'];

			$this->conductor_model->actualizar_persona(
				$data['id_persona'],
				$data['nombre'],
				$data['apellido'],
				$data['fecha_nacimiento']
			);

			$this->conductor_model->actualizar_conductor(
				$data['id_conductor'],
				$data['numero_licencia'],
				$data['domicilio'],
				$data['telefono'],
				$data['tipo_licencia'],
				$data['municipio_id_municipio']
			);

///			sleep(5);
//			header("Location: /pmtconseciones/informes/detalles/${data['id_consecion']}");
			redirect("/informes/detalles/${data['id_consecion']}");

		}
		if (isset($_POST['cancelar'])) {
				$data['id_consecion'] = $_POST['id_consecion'];
			redirect("/informes/detalles/${data['id_consecion']}");
		}

		$this->load->view('editar_piloto', $data);

		}
}
