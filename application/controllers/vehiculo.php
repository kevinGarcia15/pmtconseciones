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

		public function editar($id = 0) {
			$this->restringirAcceso();
			$data['base_url'] = $this->config->item('base_url');

			$data['vehiculo'] = $this->vehiculo_model->seleccionarVehiculoEditar($id);
			$data['color'] = $this->vehiculo_model->seleccionarColor();
			$data['tipoVehiculo'] = $this->vehiculo_model->seleccionarTipo();
			$data['marca'] = $this->vehiculo_model->seleccionarMarca();

			$data['placas_vehiculo'] ="";
			$data['modelo_vehiculo'] ="";
			$data['color_vehiculo'] ="";
			$data['tipo_vehiculo'] = "";
			$data['marca_vehiculo'] = "";
			$data['color_variante'] = "";
			$data['tarjeta_circulacion'] = "";


			if (isset($_POST['actualizar'])) {
 				$strPlaca = strtoupper($_POST['placas_vehiculo']);//convierte el alfabeto a mayuscula
				$data['placas_vehiculo'] = $_POST['inicial'].' '.$strPlaca;//concatena la inicial al numero de placa

				$data['tarjeta_circulacion'] = $_POST['tarjeta_circulacion'];
				$data['modelo_vehiculo'] = $_POST['modelo_vehiculo'];
				$data['color_variante'] = $_POST['color_variante'];
				$data['color_vehiculo'] = $_POST['color_id_color_vehiculo'];
				$data['tipo_vehiculo'] = $_POST['tipo_id_tipo_vehiculo'];
				$data['marca_vehiculo'] = $_POST['marca_id_marca_vehiculo'];

				$data['id_vehiculo'] = $_POST['id_vehiculo'];
				$data['id_consecion'] = $_POST['id_consecion'];

				$this->vehiculo_model->actualizar_vehiculo(
					$data['id_vehiculo'],
					$data['placas_vehiculo'],
					$data['tarjeta_circulacion'],
					$data['modelo_vehiculo'],
					$data['color_vehiculo'],
					$data['color_variante'],
					$data['tipo_vehiculo'],
					$data['marca_vehiculo']
				);

	///			sleep(5);
	//			header("Location: /pmtconseciones/informes/detalles/${data['id_consecion']}");
				redirect("/informes/detalles/${data['id_consecion']}");

			}
			if (isset($_POST['cancelar'])) {
					$data['id_consecion'] = $_POST['id_consecion'];
				redirect("/informes/detalles/${data['id_consecion']}");
			}

			$this->load->view('editar_vehiculo', $data);

			}

}
