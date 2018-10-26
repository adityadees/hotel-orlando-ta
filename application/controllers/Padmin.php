<?php
class Padmin extends CI_Controller{
	function __construct(){
		parent::__construct();
		if(!isset($_SESSION['logged_in'])){
			$url=base_url('loginadmin');
			redirect($url);
		};
		$this->load->model('m_padmin');
	}
	public function index(){
		$x['pembayaran']=$this->m_padmin->count_pembayaran();
		$x['checkin']=$this->m_padmin->count_checkin();
		$x['gbooking']=$this->m_padmin->get_booking_per_month();
		$x['twaitcheck']=$this->m_padmin->count_menunggucheck();
		$x['sumonth']=$this->m_padmin->get_sum_permonth();
		$this->load->view('admin/header');
		$this->load->view('admin/topbar');
		$this->load->view('admin/sidebar');
		$this->load->view('admin/index',$x);
		$this->load->view('admin/footer');
	}

	public function promo(){	
		$x['data']=$this->m_padmin->get_all_promo();
		$x['tipe']=$this->m_padmin->get_all_tipe();
		$this->load->view('admin/header');
		$this->load->view('admin/topbar');
		$this->load->view('admin/sidebar');
		$this->load->view('admin/promo/promo',$x);
		$this->load->view('admin/footer');
	}

	public function kuisioner(){	
		$x['data']=$this->m_padmin->get_all_kuisioner();
		$this->load->view('admin/header');
		$this->load->view('admin/topbar');
		$this->load->view('admin/sidebar');
		$this->load->view('admin/feedback/kuisioner',$x);
		$this->load->view('admin/footer');
	}
	public function feedback(){	
		$x['data']=$this->m_padmin->get_all_feedback();
		$this->load->view('admin/header');
		$this->load->view('admin/topbar');
		$this->load->view('admin/sidebar');
		$this->load->view('admin/feedback/feedback',$x);
		$this->load->view('admin/footer');
	}
	public function checkinout(){	
		$x['checkin']=$this->m_padmin->get_all_checkin();
		$x['checkout']=$this->m_padmin->get_all_checkout();
		$x['data']=$this->m_padmin->get_all_penginapan();
		$this->load->view('admin/header');
		$this->load->view('admin/topbar');
		$this->load->view('admin/sidebar');
		$this->load->view('admin/penginapan/checkinout',$x);
		$this->load->view('admin/footer');
	}
	public function booking(){	
		$x['booking']=$this->m_padmin->get_all_booking();
		$this->load->view('admin/header');
		$this->load->view('admin/topbar');
		$this->load->view('admin/sidebar');
		$this->load->view('admin/penginapan/booking',$x);
		$this->load->view('admin/footer');
	}
	public function customer(){	
		$x['customer']=$this->m_padmin->get_all_customer();
		$this->load->view('admin/header');
		$this->load->view('admin/topbar');
		$this->load->view('admin/sidebar');
		$this->load->view('admin/penginapan/customer',$x);
		$this->load->view('admin/footer');
	}
	
	public function kamar(){	
		$x['tipe']=$this->m_padmin->get_all_tipe();
		$x['data']=$this->m_padmin->get_all_kamar();
		$this->load->view('admin/header');
		$this->load->view('admin/topbar');
		$this->load->view('admin/sidebar');
		$this->load->view('admin/kamar/kamar',$x);
		$this->load->view('admin/footer');
	}
	
	public function tipe(){	
		$x['data']=$this->m_padmin->get_all_tipe();
		$x['fasilitas']=$this->m_padmin->get_all_fasilitas();
		$x['maxtipe']=$this->m_padmin->get_max_id_tipe();
		$this->load->view('admin/header');
		$this->load->view('admin/topbar');
		$this->load->view('admin/sidebar');
		$this->load->view('admin/kamar/tipe',$x);
		$this->load->view('admin/footer');
	}
	public function fasilitas(){	
		$x['data']=$this->m_padmin->get_all_fasilitas();
		$this->load->view('admin/header');
		$this->load->view('admin/topbar');
		$this->load->view('admin/sidebar');
		$this->load->view('admin/kamar/fasilitas',$x);
		$this->load->view('admin/footer');
	}

	public function tipe_gallery(){	
		$x['data']=$this->m_padmin->get_all_tipe_gallery();
		$this->load->view('admin/header');
		$this->load->view('admin/topbar');
		$this->load->view('admin/sidebar');
		$this->load->view('admin/kamar/tipe_gallery',$x);
		$this->load->view('admin/footer');
	}


	public function detail_tipe(){
		$kode=$this->uri->segment(3);
		$x['data']=$this->m_padmin->get_detail_tipe_by_kode($kode);
		$x['gambar']=$this->m_padmin->get_detail_gambar_by_kode($kode);
		$x['fasilitas']=$this->m_padmin->get_all_fasilitas();
		$this->load->view('admin/header');
		$this->load->view('admin/topbar');
		$this->load->view('admin/sidebar');
		$this->load->view('admin/kamar/tipe_detail',$x);
		$this->load->view('admin/footer');
	}  


	public function layanan(){	
		$x['data']=$this->m_padmin->get_all_layanan();
		$x['kategori']=$this->m_padmin->get_all_kategori_layanan();
		$this->load->view('admin/header');
		$this->load->view('admin/topbar');
		$this->load->view('admin/sidebar');
		$this->load->view('admin/layanan/layanan',$x);
		$this->load->view('admin/footer');
	}
	public function kategori(){	
		$x['data']=$this->m_padmin->get_all_kategori_layanan();
		$this->load->view('admin/header');
		$this->load->view('admin/topbar');
		$this->load->view('admin/sidebar');
		$this->load->view('admin/layanan/kategori',$x);
		$this->load->view('admin/footer');
	}
	public function user(){	
		$x['data']=$this->m_padmin->get_all_user();
		$this->load->view('admin/header');
		$this->load->view('admin/topbar');
		$this->load->view('admin/sidebar');
		$this->load->view('admin/modul/user',$x);
		$this->load->view('admin/footer');
	}
	public function slide(){	
		$x['data']=$this->m_padmin->get_all_slide();
		$this->load->view('admin/header');
		$this->load->view('admin/topbar');
		$this->load->view('admin/sidebar');
		$this->load->view('admin/slide/slide',$x);
		$this->load->view('admin/footer');
	}
	public function config(){	
		$this->load->view('admin/header');
		$this->load->view('admin/topbar');
		$this->load->view('admin/sidebar');
		$this->load->view('admin/modul/config');
		$this->load->view('admin/footer');
	}
	public function laporan(){	
		$this->load->view('admin/header');
		$this->load->view('admin/topbar');
		$this->load->view('admin/sidebar');
		$this->load->view('admin/laporan/laporan',$x);
		$this->load->view('admin/footer');
	}


	function save_kategori(){
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
				$kategori_nama=strip_tags($this->input->post('kategori_nama'));
				$kategori_ket=$this->input->post('kategori_ket');
				$this->m_padmin->save_kategori($kategori_nama,$kategori_ket,$gambar);
				echo $this->session->set_flashdata('msg','success');
				redirect('kategori');
			}else{
				echo $this->session->set_flashdata('msg','warning');
				redirect('kategori');
			}

		}else{
			redirect('kategori');
		}

	}

	function save_slide(){
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
				$config['width']= 1620;
				$config['height']= 650;
				$config['new_image']= './assets/images/'.$gbr['file_name'];
				$this->load->library('image_lib', $config);
				$this->image_lib->resize();

				$gambar=$gbr['file_name'];
				$slide_judul=strip_tags($this->input->post('slide_judul'));
				$slide_ket=$this->input->post('slide_ket');
				$this->m_padmin->save_slide($slide_judul,$slide_ket,$gambar);
				echo $this->session->set_flashdata('msg','success');
				redirect('slide');
			}else{
				echo $this->session->set_flashdata('msg','warning');
				redirect('slide');
			}

		}else{
			redirect('slide');
		}

	}



	function update_kategori(){
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
				$kategori_id=$this->input->post('kode');
				$kategori_nama=strip_tags($this->input->post('kategori_nama'));
				$kategori_ket=$this->input->post('kategori_ket');
				$this->m_padmin->update_kategori($kategori_id,$kategori_nama,$kategori_ket,$gambar);
				echo $this->session->set_flashdata('msg','success');
				redirect('kategori');
			}else{
				echo $this->session->set_flashdata('msg','warning');
				redirect('kategori');
			}

		}else{
			$kategori_id=$this->input->post('kode');
			$kategori_nama=$this->input->post('kategori_nama');
			$kategori_ket=$this->input->post('kategori_ket');
			$this->m_padmin->update_kategori_wo_img($kategori_id,$kategori_nama,$kategori_ket);
			redirect('kategori');
		}

	}

	function update_slide(){
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
				$config['width']= 1620;
				$config['height']= 650;
				$config['new_image']= './assets/images/'.$gbr['file_name'];
				$this->load->library('image_lib', $config);
				$this->image_lib->resize();

				$gambar=$gbr['file_name'];
				$slide_id=$this->input->post('kode');
				$slide_judul=strip_tags($this->input->post('slide_judul'));
				$slide_ket=$this->input->post('slide_ket');
				$this->m_padmin->update_slide($slide_id,$slide_judul,$slide_ket,$gambar);
				echo $this->session->set_flashdata('msg','success');
				redirect('slide');
			}else{
				echo $this->session->set_flashdata('msg','warning');
				redirect('slide');
			}

		}else{
			$slide_id=$this->input->post('kode');
			$slide_judul=strip_tags($this->input->post('slide_judul'));
			$slide_ket=$this->input->post('slide_ket');
			$this->m_padmin->update_slide_wo_img($slide_id,$slide_judul,$slide_ket);
			redirect('slide');
		}

	}

	function delete_kategori(){
		$kode=$this->input->post('kode');
		$this->m_padmin->delete_kategori($kode);
		echo $this->session->set_flashdata('msg','success-hapus');
		redirect('kategori');
	}
	function delete_slide(){
		$kode=$this->input->post('kode');
		$this->m_padmin->delete_slide($kode);
		echo $this->session->set_flashdata('msg','success-hapus');
		redirect('slide');
	}

	function delete_promo(){
		$kode=$this->input->post('kode');
		$this->m_padmin->delete_kategori($kode);
		echo $this->session->set_flashdata('msg','success-hapus');
		redirect('promo');
	}

	function save_user(){
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
				$user_nik=$this->input->post('user_nik');
				$user_nama=$this->input->post('user_nama');
				$user_username=$this->input->post('user_username');
				$user_password=$this->input->post('user_password');
				$user_repassword=$this->input->post('user_repassword');
				$user_email=$this->input->post('user_email');
				$user_tel=$this->input->post('user_tel');
				$user_role=$this->input->post('user_role');
				$user_alamat=$this->input->post('user_alamat');

				if($user_password==$user_repassword){
					$this->m_padmin->save_user($user_nik,$user_nama,$user_username,$user_password,$user_email,$user_tel,$user_role,$user_alamat,$gambar);
					echo $this->session->set_flashdata('msg','success');
					redirect('user');
				}
				else {
					echo $this->session->set_flashdata('msg','warning');
					redirect('user');	
				}
			}else{
				echo $this->session->set_flashdata('msg','warning');
				redirect('user');
			}

		}else{
			redirect('user');
		}

	}



	function update_user(){
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
				$user_nik=$this->input->post('user_nik');
				$user_nama=$this->input->post('user_nama');
				$user_username=$this->input->post('user_username');
				$user_email=$this->input->post('user_email');
				$user_tel=$this->input->post('user_tel');
				$user_role=$this->input->post('user_role');
				$user_alamat=$this->input->post('user_alamat');

				$this->m_padmin->update_user($user_nik,$user_nama,$user_username,$user_email,$user_tel,$user_role,$user_alamat,$gambar);
				echo $this->session->set_flashdata('msg','success');
				redirect('user');
			}else{
				echo $this->session->set_flashdata('msg','warning');
				redirect('user');
			}

		}else{
			$user_nik=$this->input->post('user_nik');
			$user_nama=$this->input->post('user_nama');
			$user_username=$this->input->post('user_username');
			$user_email=$this->input->post('user_email');
			$user_tel=$this->input->post('user_tel');
			$user_role=$this->input->post('user_role');
			$user_alamat=$this->input->post('user_alamat');
			$this->m_padmin->update_user_wo_img($user_nik,$user_nama,$user_username,$user_email,$user_tel,$user_role,$user_alamat);
			redirect('user');
		}

	}

	function delete_user(){
		$kode=$this->input->post('kode');
		$this->m_padmin->delete_user($kode);
		echo $this->session->set_flashdata('msg','success-hapus');
		redirect('user');
	}
	function konfirmasi_checkin(){
		$booking_kode=$this->input->post('booking_kode');
		$booking_status='checkin';
		$kamar=$this->input->post('kamar_id');
		$status='dipakai';
		$this->m_padmin->update_status_booking($booking_kode,$booking_status);
		$this->m_padmin->update_status_kamar($kamar,$status);
		echo $this->session->set_flashdata('msg','success-hapus');
		redirect('check');
	}
	function konfirmasi_checkout(){
		$booking_kode=$this->input->post('booking_kode');
		$booking_status='checkout';
		$kamar=$this->input->post('kamar_id');
		$status='tersedia';
		$this->m_padmin->update_status_booking($booking_kode,$booking_status);
		$this->m_padmin->update_status_kamar($kamar,$status);
		echo $this->session->set_flashdata('msg','success-hapus');
		redirect('check');
	}

	function save_fasilitas(){
		$fasilitas_nama=strip_tags($this->input->post('fasilitas_nama'));
		$this->m_padmin->save_fasilitas($fasilitas_nama);
		echo $this->session->set_flashdata('msg','success');
		redirect('fasilitas');
	}
	function save_kuisioner(){
		$pertanyaan=$this->input->post('pertanyaan');
		$this->m_padmin->save_kuisioner($pertanyaan);
		echo $this->session->set_flashdata('msg','success');
		redirect('kuisioner');
	}
	function save_promo(){
		$tipe=$this->input->post('tipe');
		$minhari=$this->input->post('minhari');
		$diskon=$this->input->post('diskon');
		$promo_start=$this->input->post('promo_start');
		$promo_end=$this->input->post('promo_end');
		$this->m_padmin->save_promo($tipe,$minhari,$diskon,$promo_start,$promo_end);
		echo $this->session->set_flashdata('msg','success');
		redirect('promo');
	}

	function update_fasilitas(){
		$fasilitas_id=$this->input->post('kode');
		$fasilitas_nama=strip_tags($this->input->post('fasilitas_nama'));
		$this->m_padmin->update_fasilitas($fasilitas_id,$fasilitas_nama);
		echo $this->session->set_flashdata('msg','info');
		redirect('fasilitas');

	}


	function update_kuisioner(){
		$kode=$this->input->post('kode');
		$pertanyaan=$this->input->post('pertanyaan');
		$this->m_padmin->update_kuisioner($kode,$pertanyaan);
		echo $this->session->set_flashdata('msg','info');
		redirect('kuisioner');

	}

	function update_status_pembayaran(){
		$status='lunas';
		$booking_kode=$this->input->post('booking_kode');
		$this->m_padmin->update_status_pembayaran($booking_kode,$status);
		echo $this->session->set_flashdata('msg','info');
		redirect('booking');

	}
	function update_promo(){
		$promo_id=$this->input->post('kode');
		$tipe=$this->input->post('tipe');
		$promo_min_hari=$this->input->post('promo_min_hari');
		$promo_diskon=$this->input->post('promo_diskon');
		$promo_start=$this->input->post('promo_start');
		$promo_end=$this->input->post('promo_end');
		$this->m_padmin->update_promo($promo_id,$tipe,$promo_min_hari,$promo_diskon,$promo_start,$promo_end);
		echo $this->session->set_flashdata('msg','info');
		redirect('promo');

	}

	function delete_fasilitas(){
		$kode=$this->input->post('kode');
		$this->m_padmin->delete_fasilitas($kode);
		echo $this->session->set_flashdata('msg','success-hapus');
		redirect('fasilitas');
	}
	function delete_kuisioner(){
		$kode=$this->input->post('kode');
		$this->m_padmin->delete_kuisioner($kode);
		echo $this->session->set_flashdata('msg','success-hapus');
		redirect('kuisioner');
	}
	function save_kamar(){
		$kamar_id=$this->input->post('kamar_id');
		$tipe_kode=strip_tags($this->input->post('tipe_kode'));
		$cc=$this->m_padmin->save_kamar($kamar_id,$tipe_kode);
		echo $this->session->set_flashdata('msg','success');
		redirect('kamar');

	}

	function update_kamar(){
		$kamar_id=$this->input->post('kamar_id');
		$tipe_kode=$this->input->post('tipe_kode');
		$this->m_padmin->update_kamar($kamar_id,$tipe_kode);
		echo $this->session->set_flashdata('msg','info');
		redirect('kamar');
	}

	function delete_kamar(){
		$kode=$this->input->post('kode');
		$this->m_padmin->delete_kamar($kode);
		echo $this->session->set_flashdata('msg','success-hapus');
		redirect('kamar');
	}

	function save_layanan(){
		$kategori_id=$this->input->post('kategori_id');
		$layanan_nama=$this->input->post('layanan_nama');
		$layanan_harga=$this->input->post('layanan_harga');
		$layanan_satuan=$this->input->post('layanan_satuan');
		$cc=$this->m_padmin->save_layanan($kategori_id,$layanan_nama,$layanan_harga,$layanan_satuan);
		echo $this->session->set_flashdata('msg','success');
		redirect('layanan');

	}

	function update_layanan(){
		$layanan_id=$this->input->post('layanan_id');
		$kategori_id=strip_tags($this->input->post('kategori_id'));
		$layanan_nama=$this->input->post('layanan_nama');
		$layanan_harga=$this->input->post('layanan_harga');
		$layanan_satuan=$this->input->post('layanan_satuan');
		$this->m_padmin->update_layanan($layanan_id,$kategori_id,$layanan_nama,$layanan_harga,$layanan_satuan);
		echo $this->session->set_flashdata('msg','info');
		redirect('layanan');
	}

	function delete_layanan(){
		$kode=$this->input->post('kode');
		$this->m_padmin->delete_layanan($kode);
		echo $this->session->set_flashdata('msg','success-hapus');
		redirect('layanan');
	}



	function save_tipe(){
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
				$tipe_kode=$this->input->post('tipe_kode');
				$tipe_nama=strip_tags($this->input->post('tipe_nama'));
				$tipe_harga=$this->input->post('tipe_harga');
				$tipe_deskripsi=$this->input->post('tipe_deskripsi');
				$fasilitas=$this->input->post('fasilitas');
				$tipe_fasilitas=implode(',',$fasilitas);
				$cc=$this->m_padmin->save_tipe($tipe_kode,$tipe_nama,$tipe_harga,$tipe_deskripsi,$tipe_fasilitas,$gambar);
				echo $this->session->set_flashdata('msg','success');
				redirect('tipe');
			}else{
				echo $this->session->set_flashdata('msg','warning');
				redirect('tipe');
			}

		}else{
			redirect('tipe');
		}

	}

	function update_tipe(){
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
				$tipe_kode=$this->input->post('tipe_kode');
				$tipe_nama=$this->input->post('tipe_nama');
				$tipe_harga=$this->input->post('tipe_harga');
				$tipe_deskripsi=$this->input->post('tipe_deskripsi');
				$fasilitas=$this->input->post('fasilitas');
				$tipe_fasilitas=implode(',',$fasilitas);
				$this->m_padmin->update_tipe($tipe_kode,$tipe_nama,$tipe_harga,$tipe_deskripsi,$tipe_fasilitas,$gambar);
				echo $this->session->set_flashdata('msg','info');
				redirect('tipe');
			}else{
				echo $this->session->set_flashdata('msg','warning');
				redirect('tipe');
			}

		}else{
			$tipe_kode=$this->input->post('tipe_kode');
			$tipe_nama=$this->input->post('tipe_nama');
			$tipe_harga=$this->input->post('tipe_harga');
			$tipe_deskripsi=$this->input->post('tipe_deskripsi');
			$fasilitas=$this->input->post('fasilitas');
			$tipe_fasilitas=implode(',',$fasilitas);
			$this->m_padmin->update_tipe_wo_img($tipe_kode,$tipe_nama,$tipe_harga,$tipe_deskripsi,$tipe_fasilitas);
			echo $this->session->set_flashdata('msg','success');
			redirect('tipe');
		}

	}



	


	function delete_tipe(){
		$kode=$this->input->post('kode');
		$this->m_padmin->delete_tipe($kode);
		echo $this->session->set_flashdata('msg','success-hapus');
		redirect('tipe');
	}





	function upload_tipe_image(){
		$config['upload_path'] = './assets/images/';
		$config['allowed_types'] = 'gif|jpg|png|jpeg|bmp'; 
		$config['encrypt_name'] = TRUE;

		$this->upload->initialize($config);
		if(!empty($_FILES['filefoto']['name'])){

			if ($this->upload->do_upload('filefoto')){

				$data   = $this->upload->data();
				$gambar_file  = $data['file_name']; 
				$tipe_kode	= $this->input->post('tipe_kode');
				$gambar_judul	= $this->input->post('gambar_judul');
				$this->m_padmin->upload_tipe_image($tipe_kode,$gambar_judul,$gambar_file);
				echo $this->session->set_flashdata('msg','info');
				redirect('tipe/detail-tipe/'.$tipe_kode);

			}else{
				echo $this->session->set_flashdata('msg','warning');
				redirect('tipe/detail-tipe/'.$tipe_kode);
			}

		}else{
			echo $this->session->set_flashdata('msg','warning');
			redirect('tipe/detail-tipe/'.$tipe_kode);
		}

	}



	function update_tipe_image(){

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
				$tipe_kode=$this->input->post('tipe_kode');
				$gambar_id=$this->input->post('kode');
				$gambar_judul=$this->input->post('gambar_judul');
				$this->m_padmin->update_tipe_image($gambar_id,$gambar_judul,$gambar);
				echo $this->session->set_flashdata('msg','info');
				redirect('tipe/detail-tipe/'.$tipe_kode);

			}else{
				echo $this->session->set_flashdata('msg','warning');
				redirect('tipe/detail-tipe/'.$tipe_kode);
			}

		}else{
			$tipe_kode=$this->input->post('tipe_kode');
			$gambar_id=$this->input->post('kode');
			$gambar_judul=$this->input->post('gambar_judul');
			$this->m_padmin->update_tipe_image_wo_img($gambar_id,$gambar_judul);
			echo $this->session->set_flashdata('msg','info');
			redirect('tipe/detail-tipe/'.$tipe_kode);
		} 

	}


	function delete_tipe_image(){
		$kode=$this->input->post('kode');
		$tipe_kode=$this->input->post('tipe_kode');
		$this->m_padmin->delete_tipe_image($kode);
		echo $this->session->set_flashdata('msg','info');
		redirect('tipe/detail-tipe/'.$tipe_kode);
	}

	function teswork(){
		$ddtr=$this->input->post('ddtr');
		$room=$this->input->post('room');
		$this->m_padmin->teswork($ddtr,$room);

	}
}