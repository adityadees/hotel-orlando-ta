<?php 
class Frontend extends CI_Controller{
	public function __construct(){
		parent::__construct();
		$this->load->model('m_padmin');
		$this->load->library('Pdf');
		$this->load->helper('menu_helper');
	}
	public function index(){
		$x['tipe']=$this->m_padmin->get_all_tipe_limit4();
		$x['kategori']=$this->m_padmin->get_all_kategori_layanan();
		$x['slide']=$this->m_padmin->get_all_slide();
		$x['promo']=$this->m_padmin->get_all_promo();
		$this->load->view('header');
		$this->load->view('index',$x);
		$this->load->view('footer');
	}
	public function booking(){
		$x['tersedia']=$this->m_padmin->get_kamar_tersedia();
		$x['mbooking']=$this->m_padmin->get_max_booking();
		$this->load->view('header');
		$this->load->view('booking',$x);
		$this->load->view('footer');
	}
	public function Room(){
		$x['data']=$this->m_padmin->get_all_tipe();
		$this->load->view('header');
		$this->load->view('room',$x);
		$this->load->view('footer');
	}
	public function about(){
		$this->load->view('header');
		$this->load->view('about');
		$this->load->view('footer');
	}
	public function contact(){
		$this->load->view('header');
		$this->load->view('contact');
		$this->load->view('footer');
	}

	public function feedback(){
		$x['data']=$this->m_padmin->get_all_kuisioner();
		$this->load->view('header');
		$this->load->view('feedback',$x);
		$this->load->view('footer');
	}

	public function pembayaran(){
		$this->load->view('header');
		$this->load->view('pembayaran');
		$this->load->view('footer');
	}

	public function room_detail(){
		$kode=$this->uri->segment(3);
		$x['data']=$this->m_padmin->get_detail_tipe_by_kode($kode);
		$x['gambar']=$this->m_padmin->get_detail_gambar_by_kode($kode);
		$x['fasilitas']=$this->m_padmin->get_all_fasilitas();
		$this->load->view('header');
		$this->load->view('room_detail',$x);
		$this->load->view('footer');
	}

	public function invoice()
	{
		$kode=$this->uri->segment(3);
		$x['invoice']=$this->m_padmin->get_invoice($kode);
		$this->load->library('pdf');
		$this->pdf->setPaper('A4', 'potrait');
		$this->pdf->filename = "laporan-petanikode.pdf";
		$this->pdf->load_view('mypdf',$x);
		$this->pdf->render();
		$this->pdf->stream();
	}
	public function thankyou()
	{
		$this->load->view('header');
		$this->load->view('thankyou');
		$this->load->view('footer');
	}




	function save_feedback(){
		$email=$this->input->post('email');
		$gkd=$this->input->post('gkd');
		$i=1;
		while(isset($_POST['jawaban'.$i]))
		{
			$kuisioner_id=$this->input->post('kuisioner_id'.$i);
			$jawaban=$this->input->post('jawaban'.$i);
			$this->m_padmin->save_feedback($gkd,$kuisioner_id,$jawaban,$email);
			$i++;
		}
		redirect('Feedback');
	}



	function save_pembayaran(){
		$config['upload_path'] = './assets/images/';
		$config['allowed_types'] = 'gif|jpg|png|jpeg|bmp';
		$config['encrypt_name'] = TRUE;

		$this->upload->initialize($config);
		if(!empty($_FILES['filefoto']['name']))
		{
			if ($this->upload->do_upload('filefoto'))
			{
				$gbr = $this->upload->data();

				$config['image_library']='gd2';
				$config['source_image']='./assets/images/'.$gbr['file_name'];
				$config['create_thumb']= FALSE;
				$config['maintain_ratio']= FALSE;
				$config['quality']= '60%';
				$config['width']= 840;
				$config['height']= 450;
				$config['new_image']= './assets/images/'.$gbr['file_name'];
				$this->load->library('image_lib', $config);
				$this->image_lib->resize();

				$gambar=$gbr['file_name'];
				$booking_kode=$this->input->post('booking_kode');
				$this->m_padmin->save_bukti($booking_kode,$gambar);
				redirect('Pembayaran');
			}else{
				echo $this->session->set_flashdata('msg','warning');
				redirect('Pembayaran');
			}

		}else{
			redirect('Pembayaran');
		}

	}

	function save_booking(){
		$booking_kode=$this->input->post('booking_kode');
		$datebook=$this->input->post('datebook');
		$gdate=explode("-",$datebook);
		$date1=$gdate[0];
		$date2=$gdate[1];
		$dateawal = date("Y-m-d", strtotime($date1));
		$dateakhir = date("Y-m-d", strtotime($date2));
		$kamar=$this->input->post('kamar');
		$nama=$this->input->post('nama');
		$email=$this->input->post('email');
		$tglc=$this->input->post('tgl_lahir');
		$tgl_lahir = date("Y-m-d", strtotime($tglc));
		$tel=$this->input->post('tel');
		$kota=$this->input->post('kota');
		$alamat=$this->input->post('alamat');
		$deskripsi=$this->input->post('deskripsi');
		$status='booking';
		$harga=$this->input->post('harga');
		$diskon=$this->input->post('diskon');
		$minhari=$this->input->post('minhari');
		$metode=$this->input->post('metode_pembayaran');
		$datetime1 = new DateTime($dateawal);
		$datetime2 = new DateTime($dateakhir);
		$difference = $datetime1->diff($datetime2);
		$pstart=$this->input->post('pstart');
		$pend=$this->input->post('pend');
		$date=date('Y-m-d');
		if($date>=$pstart || $date<=$pend){
			if($difference->days>=$minhari){
				$total=(($difference->days*$harga)*($diskon)/(100)); 
				$subtot=$harga-$total;
			}
			else {
				$subtot=$difference->days*$harga;
			}
		}
		else {
			$subtot=$difference->days*$harga;
		}
		$bok=$this->m_padmin->save_booking($booking_kode,$dateawal,$dateakhir,$kamar,$deskripsi);
		if($bok){

			$this->m_padmin->save_customer($booking_kode,$nama,$email,$tel,$tgl_lahir,$kota,$alamat);
			$this->m_padmin->update_status_kamar($kamar,$status);
			$this->m_padmin->save_pembayaran($booking_kode,$subtot,$metode);
			redirect('Booking/thankyou/'.$booking_kode);

		}
		else {
			echo $this->session->set_flashdata('msg','error');
			redirect('Booking');
		}
	}
}