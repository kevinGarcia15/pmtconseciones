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
       // //generate the PDF from the given html
       //  $this->m_pdf->pdf->WriteHTML($html);

       //  //download it.
       //  $this->m_pdf->pdf->Output($pdfFilePath, "D");
	}

}
