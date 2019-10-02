<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class usuario extends CI_Controller {
	function __construct(){
		parent::__construct();
		$this->load->helper('form');
		$this->load->library('session');
		$this->load->helper('url');
		$this->load->model('usuario_model');
	}

	private function restringirAcceso() {
		if (!isset($this->session->USUARIO)) {
			redirect("/inicio");
		}
	}

	public function index()
	{
		$this->restringirAcceso();
	}

	public function crear() {
		$this->restringirAcceso();
		$data['base_url'] = $this->config->item('base_url');

		$data['nombre'] = "";
		$data['apellido'] = "";
		$data['usuario'] = "";
		$data['CUI'] = "";
		$data['cargo'] = "";
		$data['fecha_nacimiento'] = "";
		$data['rol'] = "";
		$data['email'] = "";
		$data['clave'] = "";
		$data['clave2'] = "";
		$data['mensaje'] = "";

		if (isset($_POST['guardar'])) {
			$data['nombre'] = str_replace(["<",">"], "", $_POST['nombre']);
			$data['apellido'] = str_replace(["<",">"], "", $_POST['apellido']);
			$data['usuario'] = str_replace(["<",">"], "", $_POST['usuario']);
			$data['CUI'] = str_replace(["<",">"], "", $_POST['CUI']);
			$data['fecha_nacimiento'] = str_replace(["<",">"], "", $_POST['fecha_nacimiento']);
			$data['cargo'] = str_replace(["<",">"], "", $_POST['cargo']);
			$data['rol'] = str_replace(["<",">"], "", $_POST['rol']);
			$data['email'] = str_replace(["<",">"], "", $_POST['email']);
			$data['clave'] = $_POST['clave'];
			$data['clave2'] = $_POST['clave2'];

			$arr = $this->usuario_model->validarUsuario($data['usuario'], $data['CUI']);

			if ($data['clave'] != $data['clave2']) {
				$data['mensaje'] = "Las claves no coinciden.";
			} else if (strlen($data['clave']) < 8) {
				$data['mensaje'] = "La clave debe tener al menos 8 caracteres.";
			} else if (count($arr) > 0) {
				$data['mensaje'] = "El usuario o cui ya existe!";
		} else {
				//Todos los datos son correctos, guardar en la BD.
				$this->usuario_model->crearPersona($data['nombre'], $data['apellido'], $data['fecha_nacimiento']);
				$id_persona = $this->usuario_model->seleccionar_id_persona();//busaca el id de la persona
				$this->usuario_model->crearEmpleado($data['CUI'], $data['rol'],$data['email'],$data['usuario'],	$data['cargo'], $data['clave'], $id_persona);

				redirect("/usuario/mostrar_insercion/${data['CUI']}");
			}
		}

		$this->load->view('crear_usuario', $data);
	}

	public function validar(){
		$this->restringirAcceso();
		$data['base_url'] = $this->config->item('base_url');

		$cuiVerificar = "";
			//Busca a contratista en BD
		$cuiVerificar = $_POST['cui_user'];
		$data['result'] = $this->usuario_model->seleccionarCuiUsuario($cuiVerificar);
		//verifica si exite el contratista
		$retorno = count($data['result']);
		echo $retorno; //retorna el resultado de la busqueda

}

	public function mostrar_insercion($cui) {
		$data['base_url'] = $this->config->item('base_url');
	//	$this->restringirAcceso();

		$data['arr'] = $this->usuario_model->mostrar_insercion($cui);
		$data['mensaje'] = "Datos ingresados exitosamente";

		$this->load->view('mostrar_insercion', $data);
	}

	public function activos() {
		$data['base_url'] = $this->config->item('base_url');
		$this->restringirAcceso();

		$data['arr'] = $this->usuario_model->mostrarUsuariosActivos();

		$this->load->view('usuarios_activos', $data);
	}

	public function editar($id = 0) {
		$this->restringirAcceso();
		$data['base_url'] = $this->config->item('base_url');

		$data['arr'] = $this->usuario_model->seleccionarEmpleadoEditar($id);//busca los datos a modificar

		$data['nombre'] ="";
		$data['apellido'] ="";
		$data['usuario'] ="";
		$data['CUI'] ="";
		$data['fecha_nacimiento'] = "";
		$data['cargo'] ="";
		$data['rol'] ="";
		$id_empleado = "";
		$id_persona = "";


		if (isset($_POST['actualizar'])) {
			$data['nombre'] = str_replace(["<",">"], "", $_POST['nombre']);
			$data['apellido'] = str_replace(["<",">"], "", $_POST['apellido']);
			$data['usuario'] = str_replace(["<",">"], "", $_POST['usuario']);
			$data['CUI'] = str_replace(["<",">"], "", $_POST['CUI']);
			$data['fecha_nacimiento'] = str_replace(["<",">"], "", $_POST['fecha_nacimiento']);
			$data['cargo'] = str_replace(["<",">"], "", $_POST['cargo']);
			$data['rol'] = str_replace(["<",">"], "", $_POST['rol']);
 			$id_empleado= $_POST['id_empleado'];
			$id_persona = $_POST['persona_id_persona'];


		//	$validar = $this->usuario_model->validarMismoUsuario($id_empleado);//valida si el nombre de usuario y cui son el mismo

				//Todos los datos son correctos, guardar en la BD.
				$this->usuario_model->actualizarEmpleado($id_empleado,$data['CUI'], $data['rol'], $data['usuario'],	$data['cargo']);
				$this->usuario_model->actualizarPersona($id_persona,$data['nombre'], $data['apellido'], $data['fecha_nacimiento']);

				redirect("/usuario/mostrar_insercion/${data['CUI']}");
		}

		$this->load->view('editar_empleado', $data);

		}

	public function baja($id = 0) {
		$this->restringirAcceso();

		$data['base_url'] = $this->config->item('base_url');
		$this->usuario_model->darBaja($id);

		redirect("/usuario/activos");
	}

	public function recuperar() {
		$data['base_url'] = $this->config->item('base_url');

		$this->load->view('recuperarPass', $data);
	}

	public function enviarEmail() {//funcion donde envia un email para la recuperacion de pasword
		$data['base_url'] = $this->config->item('base_url');

		$data['boton'] = "";
		$data['asunto'] = "PMT Recuperacion de contraseña";
		$data['texto_mail'] = "Solicitaste la recuperación de contraseña, Si no fuiste tú, has caso omiso a este correo. ";
		$data['texto_mail'].="Si fuiste tú el que solicitó el cambio de contraseña accede al siguiente link ";
		$data['headers'] = "MIME-Version: 1.0\r\n";//opcional acuedo de envio de emails
		$data['headers'].="Content-type: text/html; charset=utf8\r\n";
		$data['headers'].="From: PMT  Totonicapán \r\n ";
		$email = "";
		$no_cui = "";

		if (isset($_POST['Enviar'])) {
				$no_cui = str_replace(["<",">"], "", $_POST['CUI']);
				$email = str_replace(["<",">"], "", $_POST['email']);

				$id_empleado = $this->usuario_model->seleccionarUsuarioEmail($email, $no_cui);//verifica los datos en BD
				if (count($id_empleado) > 0) {
					$destinatario = str_replace(["<",">"], "",$email);
					$token = hash('sha256', $no_cui);
					$data['texto_mail'].= "<a href=".$data['base_url']."/usuario/RestorePass?user_id=".$id_empleado."&token=".$token.">Ingresa Aqui</a>";
					$exito = mail($destinatario,$data['asunto'],$data['texto_mail'],$data['headers']);
						$data['mensaje'] = '<div class="alert alert-success">se ha enviado un correo a "'.$email.'" para la recuperación de la contraseña</div>';
				}else {
					$data['mensaje'] = '<div class="alert alert-danger">Los datos que ingreso no exiten en la Base de Datos</div>';
				}
			}
			$this->load->view('recuperarPass', $data);
	}
//Funcion para cambiar contrseña
	public function RestorePass() {
		$data['base_url'] = $this->config->item('base_url');
		if (isset($_GET['user_id'])) {
			$data['id'] = $_GET['user_id'];
		}
		if (isset($_GET['token'])) {
			$data['token'] = $_GET['token'];
		}
		$data['mensaje'] = "";
		if (isset($_POST['Enviar'])) {
				$clave1 = str_replace(["<",">"], "", $_POST['clave1']);
				$clave2 = str_replace(["<",">"], "", $_POST['clave2']);
				$id = $_POST['id'];
				$token = $_POST['token'];

				$CUI = $this->usuario_model->seleccionarUsuario($id);//verifica los datos en BD
				$valorCUI = hash('sha256',$CUI);//genera el token para verificar

				if ($valorCUI == $token) {
					$this->usuario_model->actualizarPassword($clave1, $id);
					redirect('/usuario/login/');
				}else {
					$data['mensaje'] = "Acción no permitida";
				}
			}
		$this->load->view('cambiarContra', $data);
	}


	public function login() {
		$data['base_url'] = $this->config->item('base_url');

		if (isset($this->session->USUARIO)) {
			redirect('/inicio/'); // /controller/method
		}

		if ($this->input->post('login') == 'Login') {
			$usuario = $this->input->post('usuario');
			$clave = $this->input->post('clave');
			$id = $this->usuario_model->autenticarUsuario($usuario, $clave);
			if ($id > 0) {
				//Establecer variables de sesion
				$this->session->USUARIO = $usuario;
				$this->session->IDUSUARIO = $id[0]['id_empleado'];
				$this->session->ROL = $id[0]['rol'];
				redirect("/inicio/");
			} else {
				$data['mensaje'] = '<div class="alert alert-danger">Usuario o clave incorrectos</div>';
			}
		}

		$this->load->view('login', $data);
	}

	public function logout() {
		$this->session->sess_destroy(); // Destruir todas las variables de sesión
		redirect("/inicio");
	}

}
