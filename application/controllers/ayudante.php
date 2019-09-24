s<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class ayudante extends CI_Controller {
	function __construct(){
		parent::__construct();
		$this->load->helper('form');
		$this->load->library('session');
		$this->load->helper('url');
		$this->load->model('ayudante_model');
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
//Crear un nuevo ayudante-----------------------------------------------------
	public function crearAyudante() {
		$this->restringirAcceso();
		$data['base_url'] = $this->config->item('base_url');

//Datos de registro del ayudante
		$data['CUI_ayudante'] ="";
		$data['nombre_ayudante'] ="";
		$data['apellido_ayudante'] ="";
		$data['fecha_nacimiento_ayudante'] = "";
		$data['aldea_id_aldea'] = "";
		$data['domicilio_ayudante'] = "";
			$data['telefono_ayudante'] = "";

		if ($this->input->post('continuar') == 'continuar') {

				$ayudante = array(
												'CUI_ayudante'  => $_POST['CUI_ayudante'],
												'nombre_ayudante' => $_POST['nombre_ayudante'],
												'apellido_ayudante' => $_POST['apellido_ayudante'],
												'fecha_nacimiento_ayudante' => $_POST['fecha_nacimiento_ayudante'],
												'municipio_ayudante' => $_POST['municipio'],
												'telefono_ayudante' => $_POST['telefono_ayudante'],
												'domicilio_ayudante' => $_POST['domicilio_ayudante']
											 );
								$this->session->set_userdata($ayudante);

				 	redirect("/vehiculo/crearVehiculo");

		}
		if ($this->input->post('omitir') == 'omitir'){
			$id_municipio = 335;//id de valor null o No Aplica N/A para que no haya conflictos con la consulta
			$ayudante = array(
				'CUI_ayudante'  => NULL,
				'nombre_ayudante' => $_POST['nombre_ayudante'],
				'apellido_ayudante' => $_POST['apellido_ayudante'],
				'fecha_nacimiento_ayudante' => $_POST['fecha_nacimiento_ayudante'],
				'municipio_ayudante' => $id_municipio,
				'telefono_ayudante' => $_POST['telefono_ayudante'],
				'domicilio_ayudante' => $_POST['domicilio_ayudante']
										 );
							$this->session->set_userdata($ayudante);
			redirect("/vehiculo/crearVehiculo");
		}
		$this->load->view('crear_ayudante', $data);
	}

	public function validar(){
		$this->restringirAcceso();
		$data['base_url'] = $this->config->item('base_url');

		$verificar = "";
			//Busca a contratista en BD
		$verificar = $_POST['cui_ayudante'];
		$data['result'] = $this->ayudante_model->seleccionarCuiAyudante($verificar);
		//verifica si exite el contratista
		$retorno = count($data['result']);
		echo $retorno; //retorna el resultado de la busqueda

	}

	public function editar($id = 0) {
		$this->restringirAcceso();
		$data['base_url'] = $this->config->item('base_url');

		$data['ayudante'] = $this->ayudante_model->seleccionarAyudanteEditar($id);

		$data['CUI'] ="";
		$data['nombre'] ="";
		$data['apellido'] ="";
		$data['fecha_nacimiento'] = "";
		$data['municipio_id_municipio'] = "";
		$data['domicilio'] = "";
		$data['telefono'] = "";


		if (isset($_POST['actualizar'])) {
			$data['CUI'] = $_POST['CUI_ayudante'];
			$data['nombre'] = $_POST['nombre_ayudante'];
			$data['apellido'] = $_POST['apellido_ayudante'];
			$data['fecha_nacimiento'] = $_POST['fecha_nacimiento_ayudante'];
			$data['municipio_id_municipio'] = $_POST['municipio'];
			$data['telefono']= $_POST['telefono_ayudante'];
			$data['domicilio'] =  $_POST['domicilio_ayudante'];

			$data['id_persona'] = $_POST['id_persona'];
			$data['id_ayudante'] = $_POST['id_ayudante'];
			$data['id_consecion'] = $_POST['id_consecion'];

			$this->ayudante_model->actualizar_persona(
				$data['id_persona'],
				$data['nombre'],
				$data['apellido'],
				$data['fecha_nacimiento']
			);

			$this->ayudante_model->actualizar_ayudante(
				$data['id_ayudante'],
				$data['CUI'],
				$data['domicilio'],
				$data['telefono'],
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

		$this->load->view('editar_ayudante', $data);

		}
}
