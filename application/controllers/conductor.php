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
		$data['aldea_id_aldea_piloto'] = "";
		$data['ayudante_id_ayudante'] = "";

		$data['licencia'] = $this->conductor_model->seleccionarLicencia();//mustra los tipos de licencias en la BD

		if ($this->input->post('continuar') == 'continuar') {

				$conductor = array(
												'numero_licencia'  => $_POST['numero_licencia'],
												'nombre_conductor' => $_POST['nombre_conductor'],
												'apellido_conductor' => $_POST['apellido_conductor'],
												'fecha_nacimiento_conductor' => $_POST['fecha_nacimiento_conductor'],
												'telefono_conductor' => $_POST['telefono_conductor'],
												'aldea_id_aldea_conductor' => $_POST['aldea_id_aldea_conductor'],
												'tipo_licencia_id_tipo' => $_POST['tipo_licencia'],
												'domicilio_conductor' => $_POST['domicilio_conductor']
											 );
								$this->session->set_userdata($conductor);
//				$this->consecion_model->crear_persona($data['nombre_contratista'], $data['apellido_contratista'], $data['fecha_nacimiento_contratista']);
	//			$id_persona = $this->consecion_model->seleccionar_id_persona();

//				$this->consecion_model->crear_contratista($data['telefono_contratista'],$data['CUI_contratista'],
//				$data['domicilio_contratista'], $id_persona, $data['aldea_id_aldea']);
//				$id_contratista = $this->consecion_model->seleccionar_id_contratista();
			 	redirect("/ayudante/crearAyudante");
		}

		$this->load->view('crear_conductor', $data);
	}


	public function municipio()
	{
		$this->restringirAcceso();
		$data['base_url'] = $this->config->item('base_url');

		$data['municipio'] =  $this->consecion_model->seleccionarMunicipio(); //Selelcciona el pais para el select option
		echo '<option value="0">Seleccionar</option>';
		foreach ($data['municipio'] as $key) {
		echo '<option value="'.$key['id_municipio'].'">'.$key['nombre_mun'].'</option>'."\n";
		}
	}

	public function aldea()
	{
		$this->restringirAcceso();
		$data['base_url'] = $this->config->item('base_url');

		$id_municipio = $_POST['municipio'];//recibe el id del municipio
		$data['aldea'] =  $this->consecion_model->seleccionarAldea($id_municipio); //Selelcciona el departamentp para el select option
		echo '<option value="0">Seleccionar</option>';

		foreach ($data['aldea'] as $key) {
		echo '<option value="'.$key['id_canton_aldea'].'">'.$key['nombre'].'</option>'."\n";
		}
	}

}
