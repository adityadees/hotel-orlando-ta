<?php 
if (!defined('BASEPATH')) exit('No direct script access allowed');

class Laporan extends CI_Controller {
	//===========================================================*
    // Contoh Membuat Laporan PDF dengan Libray TCPDF, By:		 *
    //               I Nyoman Sweta								 *
    //               http://www.komang.my.id/					 *
    //               info@komang.my.id							 *
    //===========================================================*
	public function __construct()
	{	
		parent::__construct();
		$this->load->library('Pdf');

	}
	public function contoh()
	{
		$this->load->library('pdf');
		$this->pdf->setPaper('A4', 'potrait');
		$this->pdf->filename = "laporan-petanikode.pdf";
		$this->pdf->load_view('mypdf');
		$this->pdf->render();
	}
	public function cetak_produk()
	{
		$data['produk'] = $this->produk_model->get_produk();
		$this->load->view('cetak_produk', $data);
	}	
}