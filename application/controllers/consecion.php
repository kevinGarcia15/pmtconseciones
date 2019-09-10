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

		$data['ruta'] = $this->consecion_model->seleccionarRuta();//selecciona la ruta

		$data['numero_consecion'] = "";
		$data['descripcion'] = "";
		$data['tarifa'] = "";
		$data['horario_inicio'] = "";
		$data['horario_fin'] = "";
		$id_contratista_existe = "";
//ingresa todos los datos a la base de datos
		if (isset($_POST['finalizar'])) {
					$data['numero_consecion']  = $_POST['numero_consecion'];
					$data['tarifa'] = $_POST['tarifa'];
					$data['horario_inicio'] = $_POST['horario_inicio'];
					$data['horario_fin'] = $_POST['horario_fin'];
					$data['descripcion'] = $_POST['descripcion'];
					$data['ruta_id_ruta'] = $_POST['ruta_id_ruta'];
					$id_usuario =	$this->session->IDUSUARIO;
				/*crear contratista*/
				if ( null== $this->session->userdata('id_contratista_existe')) {//verifica si existe yá un contratista

				$this->crearPersona(
					$this->session->userdata('nombre_contratista'),
					$this->session->userdata('apellido_contratista'),
					$this->session->userdata('fecha_nacimiento_contratista')
				);
			$id_persona = $this->consecion_model->seleccionar_id_persona();

			$this->consecion_model->crear_contratista(
				$this->session->userdata('telefono_contratista'),
				$this->session->userdata('telefono2_contratista'),
				$this->session->userdata('CUI_contratista'),
				$this->session->userdata('domicilio_contratista'),
				$id_persona,
				$this->session->userdata('aldea_id_aldea_contratista')
			);
			$id_contratista = $this->consecion_model->seleccionar_id_contratista();
		}else {
			$id_contratista = $this->session->userdata('id_contratista_existe');
		}
		/*crear ayudante*/
		$this->crearPersona(
			$this->session->userdata('nombre_ayudante'),
			$this->session->userdata('apellido_ayudante'),
			$this->session->userdata('fecha_nacimiento_ayudante')
		);
		$id_persona = $this->consecion_model->seleccionar_id_persona();

		$this->consecion_model->crear_ayudante(
			$this->session->userdata('CUI_ayudante'),
			$this->session->userdata('domicilio_ayudante'),
			$id_persona,
			$this->session->userdata('telefono_ayudante'),
			$this->session->userdata('municipio_ayudante')
		);
		$id_ayudante = $this->consecion_model->seleccionar_id_ayudante();
		/*crear piloto*/
		$this->crearPersona(
			$this->session->userdata('nombre_conductor'),
			$this->session->userdata('apellido_conductor'),
			$this->session->userdata('fecha_nacimiento_conductor')
		);
		$id_persona = $this->consecion_model->seleccionar_id_persona();

		$this->consecion_model->crear_conductor(
			$this->session->userdata('numero_licencia'),
			$this->session->userdata('domicilio_conductor'),
			$this->session->userdata('telefono_conductor'),
			$id_persona,
			$this->session->userdata('tipo_licencia_id_tipo'),
			$this->session->userdata('municipio_conductor'),
			$id_ayudante
		);
		$id_conductor = $this->consecion_model->seleccionar_id_conductor();

		/*crear vehiculo*/
		$this->consecion_model->crear_vehiculo(
			$this->session->userdata('modelo_vehiculo'),
			$this->session->userdata('tarjeta_circulacion'),
			$this->session->userdata('color_id_color_vehiculo'),
			$this->session->userdata('color_variante'),
			$this->session->userdata('placas_vehiculo'),
			$this->session->userdata('tipo_id_tipo_vehiculo'),
			$this->session->userdata('marca_id_marca_vehiculo')
		);
		$id_vehiculo = $this->consecion_model->seleccionar_id_vehiculo();
		/*crear consecion*/
		$this->consecion_model->crear_consecion(
			$data['numero_consecion'],
			$data['tarifa'],
			$data['horario_inicio'],
			$data['horario_fin'],
			$data['descripcion'],
			$id_contratista,
			$data['ruta_id_ruta'],
			$id_vehiculo,
			$id_usuario,
			$id_conductor
		);
		//borra todos los datos de la variable de sesion
		$borrar = array(	'CUI_contratista',
												'nombre_contratista',
												'apellido_contratista',
												'fecha_nacimiento_contratista',
												'telefono_contratista',
												'telefono2_contratista',
												'aldea_id_aldea_contratista',
												'domicilio_contratista',
												'numero_licencia',
												'nombre_conductor',
												'apellido_conductor',
												'fecha_nacimiento_conductor',
												'telefono_conductor',
												'municipio_conductor',
												'tipo_licencia_id_tipo',
												'domicilio_conductor',
												'CUI_ayudante',
												'nombre_ayudante',
												'apellido_ayudante',
												'fecha_nacimiento_ayudante',
												'municipio_ayudante',
												'telefono_ayudante',
												'domicilio_ayudante',
												'placas_vehiculo',
												'modelo_vehiculo',
												'color_id_color_vehiculo',
												'tipo_id_tipo_vehiculo',
												'marca_id_marca_vehiculo',
												'id_contratista_existe'
											);
		$this->session->unset_userdata($borrar);//borra las variables de sesion
	redirect("/informes/mostrarNuevaConcesion/${data['numero_consecion']}");

	}
		$this->load->view('crear_consecion', $data);
	}

//funcion donde se crea a las personas
	private function crearPersona($nombre,$apellido, $fecha_nacimiento){
			$this->consecion_model->crear_persona(
				$nombre, $apellido,$fecha_nacimiento
			);
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
		redirect("/consecion/crear");
		}
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

	public function departamento()
	{
		$this->restringirAcceso();
		$data['base_url'] = $this->config->item('base_url');

		$data['departamento'] =  $this->consecion_model->seleccionarDepartamento(); //Selelcciona el pais para el select option
		echo '<option value="0">Seleccionar</option>';
		foreach ($data['departamento'] as $key) {
		echo '<option value="'.$key['id_departamento'].'">'.$key['nombre_depto'].'</option>'."\n";
		}
	}

	public function municipio()
	{
		$this->restringirAcceso();
		$data['base_url'] = $this->config->item('base_url');

		$id_depto = $_POST['departamento'];
		$data['municipio'] =  $this->consecion_model->seleccionarMunicipio($id_depto); //Selelcciona el pais para el select option
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

	public function listar() {
		$this->restringirAcceso();
		$data['base_url'] = $this->config->item('base_url');

		$data['arr'] = $this->consecion_model->listar();
		$this->load->view('listar_consecion', $data);

		}

		public function detalles($id = 0) {
			$this->restringirAcceso();
			$data['base_url'] = $this->config->item('base_url');

			$data['arr'] = $this->consecion_model->seleccionarDetalle($id);
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
