<?php
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

		if ($this->input->post('continuar') == 'continuar') {

				$ayudante = array(
												'CUI_ayudante'  => $_POST['CUI_ayudante'],
												'nombre_ayudante' => $_POST['nombre_ayudante'],
												'apellido_ayudante' => $_POST['apellido_ayudante'],
												'fecha_nacimiento_ayudante' => $_POST['fecha_nacimiento_ayudante'],
												'aldea_id_aldea_ayudante' => $_POST['aldea_id_aldea_ayudante'],
												'domicilio_ayudante' => $_POST['domicilio_ayudante']
											 );
								$this->session->set_userdata($ayudante);

				 	redirect("/vehiculo/crearVehiculo");

		}
		$this->load->view('crear_ayudante', $data);
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
