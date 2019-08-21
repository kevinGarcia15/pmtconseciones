<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class vehiculo extends CI_Controller {
	function __construct(){
		parent::__construct();
		$this->load->helper('form');
		$this->load->library('session');
		$this->load->helper('url');
		$this->load->model('vehiculo_model');
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
//Crear un nuevo vehiculo-----------------------------------------------------
	public function crearVehiculo() {
		$this->restringirAcceso();
		$data['base_url'] = $this->config->item('base_url');

//Datos de registro del vehiculo
		$data['CUI_vehiculo'] ="";
		$data['nombre_vehiculo'] ="";
		$data['apellido_vehiculo'] ="";
		$data['fecha_nacimiento_vehiculo'] = "";
		$data['aldea_id_aldea'] = "";
		$data['domicilio_vehiculo'] = "";

		if ($this->input->post('continuar') == 'continuar') {

				$vehiculo = array(
												'CUI_vehiculo'  => $_POST['CUI_vehiculo'],
												'nombre_vehiculo' => $_POST['nombre_vehiculo'],
												'apellido_vehiculo' => $_POST['apellido_vehiculo'],
												'fecha_nacimiento_vehiculo' => $_POST['fecha_nacimiento_vehiculo'],
												'aldea_id_aldea_vehiculo' => $_POST['aldea_id_aldea_vehiculo'],
												'domicilio_vehiculo' => $_POST['domicilio_vehiculo']
											 );
								$this->session->set_userdata($vehiculo);

			//	 	redirect("/vehiculo/crearVheiculo");

		}
		if ($this->input->post('omitir') == 'omitir') {
				redirect("/vehiculo/crearVheiculo");
		}

		$this->load->view('crear_vehiculo', $data);
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
