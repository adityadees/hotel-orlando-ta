<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
class M_padmin extends CI_Model{


	function cekadminlogin($username,$password){
		$hasil=$this->db->query("SELECT * FROM user WHERE user_username='$username' AND user_password=md5('$password')");
		return $hasil;
	}

	function get_user($userid){
		$hsl=$this->db->query("SELECT * FROM user where user_nik='$userid'");
		return $hsl;
	}
	function register($ktp,$nama,$password,$email,$tel,$alamat){
		$hsl=$this->db->query("INSERT INTO user (user_ktp,user_nama,user_password,user_email,user_tel,user_alamat) VALUES ('$ktp','$nama','$password','$email','$tel','$alamat')");
		return $hsl;
	}
	function save_layanan($kategori_id,$layanan_nama,$layanan_harga,$layanan_satuan){
		$hsl=$this->db->query("insert into layanan(kategori_id,layanan_nama,layanan_harga,layanan_satuan) values ('$kategori_id','$layanan_nama','$layanan_harga','$layanan_satuan')");
		return $hsl;   
	}  
	function save_promo($tipe,$minhari,$diskon,$promo_start,$promo_end){
		$hsl=$this->db->query("insert into promo(tipe_kode,promo_min_hari,promo_diskon,promo_start,promo_end) values ('$tipe','$minhari','$diskon','$promo_start','$promo_end')");
		return $hsl;   
	}  
	function get_booking_per_month(){
		$hsl=$this->db->query("SELECT monthname(booking_awal) as bulan , COUNT(month(booking_awal)) as jumlah from booking where NOT (booking_status='proses') GROUP BY YEAR(booking_awal), MONTH(booking_awal) ");
		return $hsl;
	}
	function get_sum_permonth(){
		$hsl=$this->db->query("SELECT monthname(pembayaran_date) as bulan , sum(pembayaran_total) as jumlah from pembayaran where pembayaran_status='lunas' GROUP BY YEAR(pembayaran_date), MONTH(pembayaran_date)");
		return $hsl;
	}
	function save_pembayaran($booking_kode,$subtot,$metode){
		$hsl=$this->db->query("insert into pembayaran(booking_kode,pembayaran_total,pembayaran_metode) values ('$booking_kode','$subtot','$metode')");
		return $hsl;   
	}  
	function get_bukti($kode){
		$hsl=$this->db->query("SELECT * FROM bukti_transfer where booking_kode='$kode'");
		return $hsl;   
	}  
	function count_pembayaran(){
		$hsl=$this->db->query("SELECT count(*) as cpembayaran FROM pembayaran where pembayaran_status='menunggu'");
		return $hsl;   
	}  

	function count_checkin(){
		$hsl=$this->db->query("SELECT count(*) as ccheckin FROM booking where booking_status='checkin'");
		return $hsl;   
	}  

	function count_menunggucheck(){
		$hsl=$this->db->query("SELECT count(*) as cwait FROM booking where booking_status='proses'");
		return $hsl;   
	}  

	function get_all_kuisioner(){
		$hsl=$this->db->query("SELECT * FROM kuisioner");
		return $hsl;   
	}  
	function get_all_feedback(){
		$hsl=$this->db->query("SELECT kuisioner_pertanyaan,sum(case when feedback.feedback_nilai = 'Ya' then 1 else 0 end) ya,sum(case when feedback_nilai = 'Tidak' then 1 else 0 end) tidak from feedback inner join kuisioner on feedback.kuisioner_id=kuisioner.kuisioner_id  group by feedback.kuisioner_id");
		return $hsl;   
	}  

	function get_feedback_by_tgl($kode){
		$hsl=$this->db->query("SELECT * FROM feedback inner join kuisioner on feedback.kuisioner_id=kuisioner.kuisioner_id where feedback_id='$kode'");
		return $hsl;   
	}  

	function save_bukti($booking_kode,$gambar){
		$hsl=$this->db->query("insert into bukti_transfer(booking_kode,bt_file) values ('$booking_kode','$gambar')");
		return $hsl;   
	}  
	function save_kuisioner($pertanyaan){
		$hsl=$this->db->query("insert into kuisioner(kuisioner_pertanyaan) values ('$pertanyaan')");
		return $hsl;   
	}  
	function save_feedback($gkd,$kuisioner_id,$jawaban,$email){
		$hsl=$this->db->query("insert into feedback(feedback_id,kuisioner_id,feedback_nilai,feedback_email) values ('$gkd','$kuisioner_id','$jawaban','$email')");
		return $hsl;   
	}  
	function get_all_booking(){
		$hsl=$this->db->query("SELECT * FROM booking inner join pembayaran on booking.booking_kode=pembayaran.booking_kode where pembayaran_status='menunggu'");
		return $hsl;
	}
	function get_all_customer(){
		$hsl=$this->db->query("SELECT * FROM customer inner join booking on customer.booking_kode=booking.booking_kode");
		return $hsl;
	}
	function get_all_checkin(){
		$hsl=$this->db->query("SELECT * FROM booking inner join pembayaran on booking.booking_kode=pembayaran.booking_kode inner join customer on booking.booking_kode=customer.booking_kode where booking.booking_status='proses' && pembayaran.pembayaran_status='lunas'");
		return $hsl;
	}
	function get_all_penginapan(){
		$hsl=$this->db->query("SELECT * FROM booking inner join pembayaran on booking.booking_kode=pembayaran.booking_kode inner join customer on booking.booking_kode=customer.booking_kode where pembayaran.pembayaran_status='lunas'");
		return $hsl;
	}
	function get_all_checkout(){
		$hsl=$this->db->query("SELECT * FROM booking inner join pembayaran on booking.booking_kode=pembayaran.booking_kode inner join customer on booking.booking_kode=customer.booking_kode where booking.booking_status='checkin' && pembayaran.pembayaran_status='lunas'");
		return $hsl;
	}

	function  get_all_layanan(){
		$hsl=$this->db->query("SELECT * from layanan inner join kategori_layanan on layanan.kategori_id=kategori_layanan.kategori_id");
		return $hsl;
	}
	function get_invoice($kode){
		$hsl=$this->db->query("SELECT * FROM booking join customer on booking.booking_kode=customer.booking_kode join kamar on booking.kamar_id=kamar.kamar_id inner join tipe on kamar.tipe_kode=tipe.tipe_kode where booking.booking_kode='$kode'");
		return $hsl;
	}

	function update_layanan($layanan_id,$kategori_id,$layanan_nama,$layanan_harga,$layanan_satuan){
		$hsl=$this->db->query("update layanan set kategori_id='$kategori_id',layanan_nama='$layanan_nama',layanan_harga='$layanan_harga',layanan_satuan='$layanan_satuan' where layanan_id='$layanan_id'");
		return $hsl;
	}
	function update_kuisioner($kode,$pertanyaan){
		$hsl=$this->db->query("update kuisioner set kuisioner_pertanyaan='$pertanyaan' where kuisioner_id='$kode'");
		return $hsl;
	}
	function update_promo($promo_id,$tipe,$promo_min_hari,$promo_diskon,$promo_start,$promo_end){
		$hsl=$this->db->query("update promo set promo_id='$promo_id',tipe_kode='$tipe',promo_min_hari='$promo_min_hari',promo_diskon='$promo_diskon',promo_end='$promo_end' where promo_id='$promo_id'");
		return $hsl;
	}

	function delete_layanan($kode){
		$hsl=$this->db->query("delete from layanan where layanan_id='$kode'");
		return $hsl;
	}

	function delete_kuisioner($kode){
		$hsl=$this->db->query("DELETE from kuisioner where kuisioner_id='$kode'");
		return $hsl;
	}

	function save_fasilitas($fasilitas_nama){
		$hsl=$this->db->query("insert into fasilitas(fasilitas_nama) values ('$fasilitas_nama')");
		return $hsl;   
	}  
	function get_kamar_tersedia(){
		$hsl=$this->db->query("SELECT count(kamar.tipe_kode) as jumtersedia,tipe.tipe_kode,tipe_gambar,tipe_nama,tipe_deskripsi,tipe_harga from tipe inner join kamar on tipe.tipe_kode = kamar.tipe_kode where kamar.kamar_status='tersedia' GROUP by kamar.tipe_kode");
		return $hsl;
	}

	function get_kamar_by_tipe($tipeid){
		$hsl=$this->db->query("SELECT * FROM kamar where tipe_kode='$tipeid'");
		return $hsl;
	}
	function  get_all_fasilitas(){
		$hsl=$this->db->query("SELECT * from fasilitas");
		return $hsl;
	}
	function  get_max_booking(){
		$hsl=$this->db->query("SELECT count(*) as maxidbook from booking");
		return $hsl;
	}
	function update_status_kamar($kamar,$status){
		$hsl=$this->db->query("UPDATE kamar set kamar_status='$status' where kamar_id='$kamar'");
	}
	function update_status_booking($booking_kode,$booking_status){
		$hsl=$this->db->query("UPDATE booking set booking_status='$booking_status' where booking_kode='$booking_kode'");
	}
	function update_status_pembayaran($booking_kode,$status){
		$hsl=$this->db->query("UPDATE pembayaran set pembayaran_status='$status',pembayaran_date=NOW() where booking_kode='$booking_kode'");
	}
	function save_booking($booking_kode,$dateawal,$dateakhir,$kamar,$deskripsi){
		$hsl=$this->db->query("INSERT INTO booking (booking_kode,kamar_id,booking_awal,booking_akhir,booking_deskripsi,booking_status,booking_tanggal) VALUES ('$booking_kode','$kamar','$dateawal','$dateakhir','$deskripsi','proses',NOW())");
		return $hsl;
	}
	function save_customer($booking_kode,$nama,$email,$tel,$tgl_lahir,$kota,$alamat){
		$hsl=$this->db->query("INSERT INTO customer (booking_kode,customer_nama,customer_email,customer_tel,customer_tgl_lahir,customer_kota,customer_alamat) VALUES ('$booking_kode','$nama','$email','$tel','$tgl_lahir','$kota','$alamat')");
		return $hsl;
	}
	function update_fasilitas($fasilitas_id,$fasilitas_nama){
		$hsl=$this->db->query("update fasilitas set fasilitas_nama='$fasilitas_nama' where fasilitas_id='$fasilitas_id'");
		return $hsl;
	}

	function delete_fasilitas($kode){
		$hsl=$this->db->query("delete from fasilitas where fasilitas_id='$kode'");
		return $hsl;
	}

	function save_kategori($kategori_nama,$kategori_ket,$gambar){
		$hsl=$this->db->query("insert into kategori_layanan(kategori_nama,kategori_ket,kategori_gambar) values ('$kategori_nama','$kategori_ket','$gambar')");
		return $hsl;   
	}  
	function save_slide($slide_judul,$slide_ket,$gambar){
		$hsl=$this->db->query("insert into slide(slide_judul,slide_ket,slide_gambar) values ('$slide_judul','$slide_ket','$gambar')");
		return $hsl;   
	}  

	function  get_all_kategori_layanan(){
		$hsl=$this->db->query("SELECT * from kategori_layanan");
		return $hsl;
	}

	function update_kategori($kategori_id,$kategori_nama,$kategori_ket,$gambar){
		$hsl=$this->db->query("update kategori_layanan set kategori_nama='$kategori_nama',kategori_ket='$kategori_ket',kategori_gambar='$gambar' where kategori_id='$kategori_id'");
		return $hsl;
	}

	function update_kategori_wo_img($kategori_id,$kategori_nama,$kategori_ket){
		$hsl=$this->db->query("update kategori_layanan set kategori_nama='$kategori_nama',kategori_ket='$kategori_ket' where kategori_id='$kategori_id'");
		return $hsl;
	}


	function delete_kategori($kode){
		$hsl=$this->db->query("delete from kategori_layanan where kategori_id='$kode'");
		return $hsl;
	}

	function update_slide($slide_id,$slide_judul,$slide_ket,$gambar){
		$hsl=$this->db->query("update slide set slide_judul='$slide_judul',slide_ket='$slide_ket',slide_gambar='$gambar' where slide_id='$slide_id'");
		return $hsl;
	}

	function update_slide_wo_img($slide_id,$slide_judul,$slide_ket){
		$hsl=$this->db->query("update slide set slide_judul='$slide_judul',slide_ket='$slide_ket' where slide_id='$slide_id'");
		return $hsl;
	}


	function delete_slide($kode){
		$hsl=$this->db->query("delete from slide where slide_id='$kode'");
		return $hsl;
	}
	function save_user($user_nik,$user_nama,$user_username,$user_password,$user_email,$user_tel,$user_role,$user_alamat,$gambar){
		$hsl=$this->db->query("INSERT INTO user(user_nik,user_nama,user_username,user_password,user_email,user_tel,user_alamat,user_foto,user_role) VALUES ('$user_nik','$user_nama','$user_username',md5('$user_password'),'$user_email','$user_tel','$user_alamat','$gambar','$user_role')");
		return $hsl;   
	}  

	function  get_all_user(){
		$hsl=$this->db->query("SELECT * from user");
		return $hsl;
	}

	function update_user($user_nik,$user_nama,$user_username,$user_email,$user_tel,$user_role,$user_alamat,$gambar){
		$hsl=$this->db->query("update user set user_nama='$user_nama',user_username='$user_username',user_email='$user_email',user_tel='$user_tel',user_role='$user_role',user_alamat='$user_alamat',user_foto='$gambar' where user_nik='$user_nik'");
		return $hsl;
	}

	function update_user_wo_img($user_nik,$user_nama,$user_username,$user_email,$user_tel,$user_role,$user_alamat){
		$hsl=$this->db->query("update user set user_nama='$user_nama',user_username='$user_username',user_email='$user_email',user_tel='$user_tel',user_role='$user_role',user_alamat='$user_alamat' where user_nik='$user_nik'");
		return $hsl;
	}

	function delete_user($kode){
		$hsl=$this->db->query("delete from user where user_nik='$kode'");
		return $hsl;
	}

	function  get_all_kamar(){
		$hsl=$this->db->query("SELECT * from kamar");
		return $hsl;
	}
	
	function update_kamar($kamar_id,$tipe_kode){
		$hsl=$this->db->query("UPDATE kamar SET tipe_kode='$tipe_kode'where kamar_id='$kamar_id'");
		return $hsl;
	}


	function save_kamar($kamar_id,$tipe_kode){
		$hsl=$this->db->query("insert into kamar(kamar_id,tipe_kode) values ('$kamar_id','$tipe_kode')");
		return $hsl;   
	}  
	
	function delete_kamar($kode){
		$hsl=$this->db->query("delete from kamar where kamar_id='$kode'");
		return $hsl;
	}


	function save_tipe($tipe_kode,$tipe_nama,$tipe_harga,$tipe_deskripsi,$tipe_fasilitas,$gambar){
		$hsl=$this->db->query("insert into tipe(tipe_kode,tipe_nama,tipe_harga,tipe_deskripsi,tipe_fasilitas,tipe_gambar) values ('$tipe_kode','$tipe_nama','$tipe_harga','$tipe_deskripsi','$tipe_fasilitas','$gambar')");
		return $hsl;   
	}  


	function  get_all_tipe(){
		$hsl=$this->db->query("SELECT * from tipe");
		return $hsl;
	}
	function  get_all_promo(){
		$hsl=$this->db->query("SELECT * from promo inner join tipe on promo.tipe_kode=tipe.tipe_kode");
		return $hsl;
	}
	function  get_promo_by_kode($kode){
		$hsl=$this->db->query("SELECT * from promo where tipe_kode='$kode'");
		return $hsl;
	}
	function  get_all_tipe_limit4(){
		$hsl=$this->db->query("SELECT * from tipe limit 4");
		return $hsl;
	}
	function get_detail_tipe_by_kode($kode){
		$hsl=$this->db->query("SELECT * from tipe where tipe_kode='$kode'");
		return $hsl;
	}
	function get_detail_gambar_by_kode($kode){
		$hsl=$this->db->query("SELECT * from gambar where tipe_kode='$kode'");
		return $hsl;
	}

	function  get_max_id_tipe(){
		$hsl=$this->db->query("SELECT count(*) as maxidtipe from tipe");
		return $hsl;
	}

	function update_tipe($tipe_kode,$tipe_nama,$tipe_harga,$tipe_deskripsi,$tipe_fasilitas,$gambar){
		$hsl=$this->db->query("UPDATE tipe SET tipe_nama='$tipe_nama',tipe_harga='$tipe_harga',tipe_deskripsi='$tipe_deskripsi',tipe_fasilitas='$tipe_fasilitas',tipe_gambar='$gambar' where tipe_kode='$tipe_kode'");
		return $hsl;
	}

	function update_tipe_wo_img($tipe_kode,$tipe_nama,$tipe_harga,$tipe_deskripsi,$tipe_fasilitas){
		$hsl=$this->db->query("UPDATE tipe SET tipe_nama='$tipe_nama',tipe_harga='$tipe_harga',tipe_deskripsi='$tipe_deskripsi',tipe_fasilitas='$tipe_fasilitas' where tipe_kode='$tipe_kode'");
		return $hsl;
	}

	function delete_tipe($kode){
		$hsl=$this->db->query("delete from tipe where tipe_kode='$kode'");
		return $hsl;
	}

	function delete_promo($kode){
		$hsl=$this->db->query("delete from promo where promo_id='$kode'");
		return $hsl;
	}

	
	function  get_all_tipe_gallery(){
		$hsl=$this->db->query("SELECT * from tipe");
		return $hsl;
	}

	
	function  get_all_slide(){
		$hsl=$this->db->query("SELECT * from slide");
		return $hsl;
	}

	function update_tipe_image($gambar_id,$gambar_judul,$gambar){
		$hsl=$this->db->query("UPDATE gambar SET gambar_judul='$gambar_judul',gambar_file='$gambar' where gambar_id='$gambar_id'");
		return $hsl;
	}
	function update_tipe_image_wo_img($gambar_id,$gambar_judul){
		$hsl=$this->db->query("UPDATE gambar SET gambar_judul='$gambar_judul' where gambar_id='$gambar_id'");
		return $hsl;
	}

	function delete_tipe_gallery($kode){
		$hsl=$this->db->query("delete from tipe where tipe_kode='$kode'");
		return $hsl;
	}

	function upload_tipe_image($tipe_kode,$gambar_judul,$gambar_file){
		$data = array(
			'tipe_kode'	=> $tipe_kode,
			'gambar_judul' => $gambar_judul,
			'gambar_file' => $gambar_file, 
		);
		$result=$this->db->insert('gambar',$data);
		return $result;
	}
	function delete_tipe_image($kode){
		$hsl=$this->db->query("delete from gambar where gambar_id='$kode'");
		return $hsl;
	}

	function teswork($ddtr,$room){
		$hsl=$this->db->query("INSERT INTO config (config_judul,config_desc) values ('$room','$ddtr')");
		return $hsl;
	}
}