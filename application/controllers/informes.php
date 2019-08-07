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

	private function restringirAcceso() {
		if (!isset($this->session->USUARIO)) {
			redirect("usuario/login");
		}
	}

	public function index()
	{
		$this->restringirAcceso();
		$data['base_url'] = $this->config->item('base_url');
	}

	public function descargar(){

		$data = [];

		$hoy = date("dmyhis");
		$texto = 'Texto de prueba';
        //load the view and saved it into $html variable
    //    $html =
  //      "";
	$rama = $_GET['rama'];
	if ($rama == "Todos") {
		$data['arr'] = $this->informes_model->seleccionarCorredor();
	}else {
		$data['arr'] = $this->informes_model->seleccionarCorredorCategoria($rama);
	}
	$this->load->view('view_informes', $data);
  $html = $this->load->view('descargar_informes_corredores',$date,true);

 		//$html="asdf";
        //this the the PDF filename that user will get to download
        $pdfFilePath = "Mmaraton_atanasioTzul_".'caregoria_'.$rama.'_'.$hoy.".pdf";

        //load mPDF library
        $this->load->library('M_pdf');
        $mpdf = new mPDF('c', 'A4P');
 		$mpdf->WriteHTML($html);
		$mpdf->Output($pdfFilePath, "D");
       // //generate the PDF from the given html
       //  $this->m_pdf->pdf->WriteHTML($html);

       //  //download it.
       //  $this->m_pdf->pdf->Output($pdfFilePath, "D");
	}

	public function Nomina() {
		$this->restringirAcceso();
		$data['base_url'] = $this->config->item('base_url');

		$data['arr'] = $this->informes_model->seleccionarCorredor();
	//	$data['Numero'] = $this->informes_model->seleccionarNoCorredores();

		$this->load->view('view_informes', $data);

	}

	public function categoria() {
		$this->restringirAcceso();
		$data['base_url'] = $this->config->item('base_url');

		$data['categoria'] = "";

			if (isset($_POST['BtnCategoria'])) {
				$data['categoria'] = $_POST['selectCategoria'];
				if ($data['categoria'] == "Todos") {
						$data['arr'] = $this->informes_model->seleccionarCorredor();
				}else {
					$data['arr'] = $this->informes_model->seleccionarCorredorCategoria($data['categoria']);
				}
			}

		$this->load->view('view_informes', $data);

	}

public function Email() {
		$this->restringirAcceso();
		$data['base_url'] = $this->config->item('base_url');

		$data['asunto'] = "";
		$data['texto_mail'] = "";
		$data['headers'] = "MIME-Version: 1.0\r\n";//opcional acuedo de envio de emails
		$data['headers'].="Content-type: text/html; charset=utf8\r\n";
		$data['headers'].="From: Media Maraton Atanacio Tzul \r\n ";
		$enviados = 0;
		$noEnviados = 0;
		$data["confirmacion"] = "";

		if (isset($_POST['enviar'])) {
			$data['asunto'] = $_POST['asunto'];
			$data['texto_mail'] = $_POST['mensaje'];

			$data['arr'] = $this->informes_model->seleccionarCorredor();
			foreach ($data['arr'] as $a ) {
				$destinatario = str_replace(["<",">"], "", $a['Email']);
				//echo $a['Email'],$data['asunto'],$data['texto_mail'],$data['headers'], "otro parrafo ";
				if ($destinatario == "") {
					$noEnviados = $noEnviados + 1;
					continue;
				}
				$exito = mail($destinatario,$data['asunto'],$data['texto_mail'],$data['headers']);

				if ($exito) {
					$enviados = $enviados + 1;
				}
			}
			$data["confirmacion"] = '<div class="alert alert-success">
  														<strong>Mensajes exitosos: '.$enviados.'<br>Mensajes no enviados '.$noEnviados.' </strong>
													</div>';
			}

		$this->load->view('sendEmail', $data);
	}

	public function graficas() {
		$this->restringirAcceso();
		$data['base_url'] = $this->config->item('base_url');

		$data['arr'] = $this->informes_model->seleccionarCorredorRama();

		$this->load->view('graficas', $data);
	}


}
