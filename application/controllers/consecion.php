<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class consecion extends CI_Controller {
	function __construct(){
		parent::__construct();
		$this->load->helper('form');
		$this->load->library('session');
		$this->load->helper('url');
		$this->load->model('consecion_model');
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

	public function crear() {
		$this->restringirAcceso();

		$data['base_url'] = $this->config->item('base_url');
//Datos de registro del contratista
		$data['CUI_contratista'] ="";
		$data['nombre_contratista'] ="";
		$data['apellido_contratista'] ="";
		$data['fecha_nacimiento_contratista'] = "";
		$data['telefono_contratista'] ="";
		$data['aldea_id_aldea'] = "";
		$data['domicilio_contratista'] = "";
		$data['usuario_id_usuario'] = $this->session->IDUSUARIO;

//Datos de registro del piloto
		$data['numero_licencia'] ="";
		$data['nombre_piloto'] ="";
		$data['apellido_piloto'] ="";
		$data['fecha_nacimiento_piloto'] = "";
		$data['telefono_piloto'] ="";
		$data['aldea_id_aldea_piloto'] = "";
		$data['domicilio_piloto'] = "";


		if (isset($_POST['guardar'])) {
			$data['nombre'] = str_replace(["<",">"], "", $_POST['nombre']);
			$data['fecha_nacimiento'] = $_POST['fecha_nacimiento'];
			$data['CUI'] = str_replace(["<",">"], "", $_POST['CUI']);
			$data['email'] = str_replace(["<",">"], "", $_POST['email']);
			$data['telefono'] = str_replace(["<",">"], "", $_POST['telefono']);
			$data['numero'] = $_POST['numero'];
			$data['rama'] = str_replace(["<",">"], "", $_POST['rama']);
			$data['nombre_familiar'] = str_replace(["<",">"], "", $_POST['nombre_familiar']);
			$data['telefono_familiar'] = str_replace(["<",">"], "", $_POST['telefono_familiar']);
			$data['municipio_id_municipio'] = $_POST['municipio'];

			$validacion = $this->corredor_model->seleccionarCorredor($data['CUI'], $data['numero']);

				if ($validacion == 0 and $data['municipio_id_municipio'] != 0) {
					$this->corredor_model->crear_corredor($data['nombre'], $data['fecha_nacimiento'], $data['CUI']
		 			,$data['email'],$data['telefono'], $data['rama'],$data['usuario_id_usuario']
					,$data['municipio_id_municipio']);//ingresa datos en la tabla correror

					$id_corredor = $this->corredor_model->seleccionar_id_corredor($data['CUI']);
					$this->corredor_model->crear_familiar($id_corredor,	$data['nombre_familiar'], $data['telefono_familiar']);//ingresar datos en la tabla familia
					$this->corredor_model->crear_inscripcion($id_corredor,	$data['numero']);//ingresar datos del numero y el año de competicion
					$data['mensaje'] = "<div class=\"alert alert-success\" role=\"alert\">
  															Datos guardados exitosamente
															</div>";
				//exite un CUI o Numero duplicado
				}elseif ($validacion == 1 ) {
					$data['mensaje'] = "<div class=\"alert alert-danger\" role=\"alert\">
  															No se pudo guardar el registro, CUI o numero de atleta duplicados
															</div>";
				}elseif ($data['municipio_id_municipio'] == 0) {
						$data['mensaje'] = "<div class=\"alert alert-danger\" role=\"alert\">
																	Debe seleccionar un país de origen, un departamento y un municipio
																</div>";
						}

		}
		$this->load->view('crear_consecion', $data);
	}

	public function crearRuta() {
		$this->restringirAcceso();
		$data['base_url'] = $this->config->item('base_url');

		$data['ruta'] ="";
		$data['descripcion'] ="";

		if (isset($_POST['guardar'])) {
			$data['ruta'] = str_replace(["<",">"], "", $_POST['ruta']);
			$data['descripcion'] = str_replace(["<",">"], "", $_POST['descripcion']);
			echo $data['descripcion'];

		$this->consecion_model->crear_ruta($data['ruta'], $data['descripcion']);//ingresa datos en la tabla ruta
			$data['mensaje'] = "<div class=\"alert alert-success\" role=\"alert\">
  															Datos guardados exitosamente
															</div>";
		}
		$this->load->view('crear_ruta', $data);
	}

	public function buscar()
	{
		//$this->restringirAcceso();
		$data['base_url'] = $this->config->item('base_url');


		$busqueda = $this->input->post('busqueda');
		if ($busqueda) {
			$data['arr'] = $this->corredor_model->seleccionarBusqueda($busqueda);
		}

		$this->load->view('Busqueda', $data);
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


	public function detalles($id = 0) {
		$this->restringirAcceso();
		$data['base_url'] = $this->config->item('base_url');

		$data['arr'] = $this->corredor_model->seleccionarDetalle($id);
		$this->load->view('detalle', $data);

		}

		public function editar($id = 0) {
			$this->restringirAcceso();
			$data['base_url'] = $this->config->item('base_url');

			$data['arr'] = $this->corredor_model->seleccionarCorredorEditar($id);

			$data['nombre'] ="";
			$data['fecha_nacimiento'] = "";
			$data['CUI'] ="";
			$data['email'] ="";
			$data['telefono'] ="";
			$data['numero'] ="";
			$data['rama'] ="";
			$data['nombre_familiar'] ="";
			$data['telefono_familiar'] ="";
			$data['municipio_id_municipio'] = "";
			$id_corredor = "";



			if (isset($_POST['actualizar'])) {
				$data['nombre'] = str_replace(["<",">"], "", $_POST['nombre']);
				$data['fecha_nacimiento'] = $_POST['fecha_nacimiento'];
				$data['CUI'] = str_replace(["<",">"], "", $_POST['CUI']);
				$data['email'] = str_replace(["<",">"], "", $_POST['email']);
				$data['telefono'] = str_replace(["<",">"], "", $_POST['telefono']);
				$data['numero'] = $_POST['numero'];
				$data['rama'] = str_replace(["<",">"], "", $_POST['rama']);
				$data['nombre_familiar'] = str_replace(["<",">"], "", $_POST['nombre_familiar']);
				$data['telefono_familiar'] = str_replace(["<",">"], "", $_POST['telefono_familiar']);
				$data['municipio_id_municipio'] = $_POST['municipio'];
				$data['id_corredor'] = $_POST['id_atleta'];

				if ($data['municipio_id_municipio'] == 0) {
					$data['mensaje'] = "<div class=\"alert alert-danger\" role=\"alert\">
  															Debe seleccionar un pais de origen, un departamento y un municipio
															</div>";
				}else {
					$this->corredor_model->actualizar_corredor($data['id_corredor'], $data['nombre'], $data['fecha_nacimiento'], $data['CUI']
					,$data['email'],$data['telefono'], $data['rama'],$data['municipio_id_municipio']);//ingresa datos en la tabla correror
					$this->corredor_model->actualizar_familiar($data['id_corredor'],	$data['nombre_familiar'], $data['telefono_familiar']);//ingresar datos en la tabla familia
					$this->corredor_model->actualizar_inscripcion($data['id_corredor'], $data['numero']);//ingresar datos del numero y el año de competicion
				redirect("/informes/Nomina");
				}
			}

			$this->load->view('editar_corredor', $data);

			}
}
