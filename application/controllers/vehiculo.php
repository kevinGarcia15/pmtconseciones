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

		$data['color'] = $this->vehiculo_model->seleccionarColor();
		$data['tipo'] = $this->vehiculo_model->seleccionarTipo();
		$data['marca'] = $this->vehiculo_model->seleccionarMarca();

//Datos de registro del vehiculo
		$data['placas_vehiculo'] ="";
		$data['modelo_vehiculo'] ="";
		$data['color_id_color_vehiculo'] ="";
		$data['tipo_id_tipo_vehiculo'] = "";
		$data['marca_id_marca_vehiculo'] = "";

		if ($this->input->post('continuar') == 'continuar') {
				$strPlaca = strtoupper($_POST['placas_vehiculo']);//convierte el alfabeto a mayuscula
				$data['placas_vehiculo'] = $_POST['inicial'].' '.$strPlaca;//concatena la inicial al numero de placa

				$vehiculo = array(
												'placas_vehiculo'  => $data['placas_vehiculo'],
												'modelo_vehiculo' => $_POST['modelo_vehiculo'],
												'tarjeta_circulacion'=> $_POST['tarjeta_circulacion'],
												'color_id_color_vehiculo' => $_POST['color_id_color_vehiculo'],
												'color_variante' => $_POST['color_variante'],
												'tipo_id_tipo_vehiculo' => $_POST['tipo_id_tipo_vehiculo'],
												'marca_id_marca_vehiculo' => $_POST['marca_id_marca_vehiculo']
											 );
								$this->session->set_userdata($vehiculo);

		 	redirect("/consecion/crear");

		}
		$this->load->view('crear_vehiculo', $data);
	}


		public function crearColor() {
			$this->restringirAcceso();
			$data['base_url'] = $this->config->item('base_url');

			$data['color'] ="";

			if (isset($_POST['guardar'])) {
				$data['color'] = str_replace(["<",">"], "", $_POST['color']);

			$this->vehiculo_model->crear_color($data['color']);//ingresa datos en la tabla ruta
			redirect("/vehiculo/crearVehiculo");
			}
		}

}
