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
//Crear un nuevo vontratista-----------------------------------------------------
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
												'aldea_id_aldea_contratista' => $_POST['aldea'],
												'domicilio_contratista' => $_POST['domicilio_contratista']
											 );
								$this->session->set_userdata($contratista);

	/*			$this->contratista_model->crear_persona($data['nombre_contratista'], $data['apellido_contratista'], $data['fecha_nacimiento_contratista']);
				$id_persona = $this->contratista_model->seleccionar_id_persona();

				$this->contratista_model->crear_contratista($data['telefono_contratista'],$data['CUI_contratista'],
				$data['domicilio_contratista'], $id_persona, $data['aldea_id_aldea']);
				$id_contratista = $this->contratista_model->seleccionar_id_contratista();*/
				 	redirect("/conductor/crearConductor");
			}
		}

		$this->load->view('crear_contratista', $data);
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
