<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class informes extends CI_Controller {
	function __construct(){
		parent::__construct();
		$this->load->helper('form');
		$this->load->library('session');
		$this->load->helper('url');
		$this->load->model('informes_model');
	}
	//------------------------------------------------------------------------------------

	private function restringirAcceso() {
		if (!isset($this->session->USUARIO)) {
			redirect("usuario/login");
		}
	}
	//------------------------------------------------------------------------------------

	public function index()
	{
		$this->restringirAcceso();
		$data['base_url'] = $this->config->item('base_url');
	}
	//------------------------------------------------------------------------------------

	public function mostrarNuevaConcesion($numero) {
		$this->restringirAcceso();
		$data['base_url'] = $this->config->item('base_url');

		$data['arr'] = $this->informes_model->mostrar($numero);
		$data['mensaje'] = "Datos ingresados exitosamente";
		$this->load->view('mostrar_nueva_concesion', $data);

		}
		//------------------------------------------------------------------------------------

	public function descargar($id){

		$data = [];
		$hoy = date("dmyhis");
		$consecion = 'pmt';
        //load the view and saved it into $html variable
    //    $html =
  //      "";
		$data['arr'] = $this->informes_model->Detalle($id);
		foreach ($data['arr'] as $key) {
			$numero = $key['numero'];
		}
	//$this->load->view('detalle', $data);
  $html = $this->load->view('descargar_consecion',$data,true);

 		//$html="asdf";
        //this the the PDF filename that user will get to download
        $pdfFilePath = "PMTconseción_".'numero_'.$numero.'_'.$hoy.".pdf";

        //load mPDF library
        $this->load->library('M_pdf');
        $mpdf = new mPDF('c', 'A4P');
 		$mpdf->WriteHTML($html);
		$mpdf->Output($pdfFilePath, "D");

	}
	//------------------------------------------------------------------------------------

	public function detalles($id = 0) {
		$this->restringirAcceso();
		$data['base_url'] = $this->config->item('base_url');
		$data['id_concesion'] = $id;
		$data['arr'] = $this->informes_model->Detalle($id);
		$this->load->view('detalle', $data);
}
//------------------------------------------------------------------------------------

public function listar($opcion = "numero") {
	$this->restringirAcceso();
	$data['base_url'] = $this->config->item('base_url');
	$data['categoria'] = $opcion;
	$data['arr'] = $this->informes_model->listar($opcion);
	$this->load->view('listar_consecion', $data);

	}
	//------------------------------------------------------------------------------------

	public function informes() {
		$this->restringirAcceso();
		$data['base_url'] = $this->config->item('base_url');

		$data['tipo'] = $this->informes_model->seleccionarTipo();
		$this->load->view('checkbox_informe', $data);
		}
//------------------------------------------------------------------------------------
	public function informe_categoria() {
		$this->restringirAcceso();
		$data['base_url'] = $this->config->item('base_url');
		$checkSeleccionados = count($_POST['valor']);
		if ($checkSeleccionados >= 7) {
			$data['mensaje']= "";
			$data['mensaje'] = "<div class=\"alert alert-danger\">ha excedido el número de opciones</div> ";
			redirect("informes/informes");
		}else{
			$SeleccionarValores = "";
			$data['SeleccionarValores'] = implode(',',$_POST['valor']);//metodo implode une la cadena con un caracter, como la COMA
			$data['tipo_vehiculo'] = $_POST['tipo_vehiculo'];
			$data['nombre_tabla'] = "";
			$data['nombre_tabla'] = $_POST['titulo'];
			$data['arr'] = $this->informes_model->informe_cat($data['SeleccionarValores'],$data['tipo_vehiculo'] );

			$this->load->view('informe_view_cat', $data);

		}
	}

	//------------------------------------------------------------------------------------

public function descargarCat(){
if (isset($_POST['descargar'])) {
	$data = [];
	$hoy = date("dmyhis");
	$consecion = 'pmt';

	$data['nombre_tabla'] = array();
	$select = $_POST['select'];
	$tipo_vehiculo = $_POST['tipo_vehiculo'];
	echo $select,$tipo_vehiculo;

/*
	$data['arr'] = $this->informes_model->informe_cat($select,$tipo_vehiculo);

	$html = $this->load->view('informe_view_cat', $data, true);
	$pdfFilePath = "PMTconseción_".'numero_'.$numero.'_'.$hoy.".pdf";
	$this->load->library('M_pdf');
	$mpdf = new mPDF('c', 'A4P');
	$mpdf->WriteHTML($html);
	$mpdf->Output($pdfFilePath, "D");
*/}
}
		//------------------------------------------------------------------------------------

	public function graficas() {
		$this->restringirAcceso();
		$data['base_url'] = $this->config->item('base_url');
		$this->load->view('graficas', $data);

		}
		//------------------------------------------------------------------------------------

	public function buscar()
	{
		$this->restringirAcceso();
		$data['base_url'] = $this->config->item('base_url');

		$data['busqueda'] = "";
		$data['criterio'] = "";

		if (isset($_POST['buscar'])) {
			$data['busqueda'] = $_POST['busqueda'];
			$data['criterio'] = $_POST['criterio']; // que tipo de busqueda quiere hacer

			if ($data['criterio'] == 'numero') {
				is_numeric($data['busqueda']) or exit("Ingrese un número");
				$data['signo'] = "=";
			}else {
				$data['busqueda'] = '"%'.$data['busqueda'].'%"';//preparar el texto para su consulta
				$data['signo'] = "like";
			}
			$data['arr'] = $this->informes_model->seleccionarBusqueda($data['busqueda'],$data['criterio'],$data['signo']);
		}
		$this->load->view('busqueda', $data);
	}
	//------------------------------------------------------------------------------------

	public function borrar($id) {
		$this->restringirAcceso();
		$data['base_url'] = $this->config->item('base_url');

	 	$result = $this->informes_model->seleccionarBorrar($id);
//funcion para borrar la concesión
		$this->informes_model->borrarConcesion(
			$result[0]['id_consecion'],
			$result[0]['id_piloto'],
			$result[0]['id_persona_pil'],
			$result[0]['id_ayudante'],
			$result[0]['id_persona_ayu'],
			$result[0]['id_vehiculo']
		);
		redirect("/informes/listar");
	}
}
