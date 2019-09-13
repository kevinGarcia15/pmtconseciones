<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class contratista extends CI_Controller {
	function __construct(){
		parent::__construct();
		$this->load->helper('form');
		$this->load->library('session');
		$this->load->helper('url');
		$this->load->model('contratista_model');
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
//Crear un nuevo contratista-----------------------------------------------------
	public function crearContratista() {
		$this->restringirAcceso();
		$data['base_url'] = $this->config->item('base_url');

	$data['flag'] = 0;//variable bandera que nos indica si hay datos del contratistaa
	$data['CUI_contratista'] = "";
	$data['activar'] = "";//utilizado para activar o desactivar los inputs
		//Busca a contratista en BD
		if (isset($_GET['cui'])) {
	$data['CUI'] ="";
	$data['CUI'] = $_GET['cui'];
	$data['result'] = $this->contratista_model->seleccionarCuiContratista($data['CUI']);
	//verifica si exite el contratista
	$retorno = count($data['result']);
	if ($retorno > 0) {
		$data['flag'] = 1;
		$data['activar'] = 'disabled';
	}else {
		$data['flag'] = 0;
		$data['CUI_contratista'] = $data['CUI'];
		$data['activar'] = '';
	}
}

//Datos de registro del contratista
		$data['nombre_contratista'] ="";
		$data['apellido_contratista'] ="";
		$data['fecha_nacimiento_contratista'] = "";
		$data['telefono_contratista'] ="";
		$data['telefono2_contratista']="";
		$data['aldea_id_aldea'] = "";
		$data['domicilio_contratista'] = "";


		if ($this->input->post('continuar') == 'continuar') {
			if ($_POST['flag'] == 1) {
				//usa una variable de session para guardar el id del contratista
				$contratistaid = array(
												'id_contratista_existe'  => $_POST['id_contratista'] );
				$this->session->set_userdata($contratistaid);
				redirect("/conductor/crearConductor");

			}else {
				$contratista = array(
												'CUI_contratista'  => $_POST['CUI_contratista'],
												'nombre_contratista' => $_POST['nombre_contratista'],
												'apellido_contratista' => $_POST['apellido_contratista'],
												'fecha_nacimiento_contratista' => $_POST['fecha_nacimiento_contratista'],
												'telefono_contratista' => $_POST['telefono_contratista'],
												'telefono2_contratista' => $_POST['telefono2_contratista'],
												'aldea_id_aldea_contratista' => $_POST['aldea'],
												'domicilio_contratista' => $_POST['domicilio_contratista']
											 );
								$this->session->set_userdata($contratista);
				 	redirect("/conductor/crearConductor");
			}
		}

		$this->load->view('crear_contratista', $data);
	}


	public function editar($CUI = 0) {
		$this->restringirAcceso();
		$data['base_url'] = $this->config->item('base_url');

		$data['arr'] = $this->contratista_model->seleccionarContratistaEditar($CUI);
		$data['municipio'] =  $this->contratista_model->seleccionarMunicipioContratista(); //Selelcciona el pais para el select option
		$data['aldea'] =  $this->contratista_model->seleccionarAldeaContratista(); //Selelcciona el departamentp para el select option

		$data['CUI_contratista'] ="";
		$data['nombre_contratista'] ="";
		$data['apellido_contratista'] ="";
		$data['fecha_nacimiento_contratista'] = "";
		$data['telefono_contratista'] ="";
		$data['telefono2_contratista']="";
		$data['aldea_id_aldea'] = "";
		$data['domicilio_contratista'] = "";
		$data['id_persona'] = "";
		$data['id_contratista'] = "";
		$data['id_consecion'] = "";

		if (isset($_POST['actualizar'])) {
			$data['CUI_contratista'] = $_POST['CUI_contratista'];
			$data['nombre_contratista'] = $_POST['nombre_contratista'];
			$data['apellido_contratista'] = $_POST['apellido_contratista'];
			$data['fecha_nacimiento_contratista'] = $_POST['fecha_nacimiento_contratista'];
			$data['telefono_contratista'] = $_POST['telefono_contratista'];
			$data['telefono2_contratista']= $_POST['telefono2_contratista'];
			$data['aldea_id_aldea'] =  $_POST['aldea'];
			$data['domicilio_contratista'] =  $_POST['domicilio_contratista'];

			$data['id_persona'] = $_POST['id_persona'];
			$data['id_contratista'] = $_POST['id_contratista'];
			$data['id_consecion'] = $_POST['id_consecion'];

			$this->contratista_model->actualizar_persona(
				$data['id_persona'],
				$data['nombre_contratista'],
				$data['apellido_contratista'],
				$data['fecha_nacimiento_contratista']
			);

			$this->contratista_model->actualizar_contratista(
				$data['id_contratista'],
				$data['CUI_contratista'],
				$data['telefono_contratista'],
				$data['telefono2_contratista'],
				$data['domicilio_contratista'],
				$data['aldea_id_aldea']
			);

///			sleep(5);
//			header("Location: /pmtconseciones/informes/detalles/${data['id_consecion']}");
			redirect("/informes/detalles/${data['id_consecion']}");

		}
		if (isset($_POST['cancelar'])) {
				$data['id_consecion'] = $_POST['id_consecion'];
			redirect("/informes/detalles/${data['id_consecion']}");
		}

		$this->load->view('editar_contratista', $data);

		}

}
